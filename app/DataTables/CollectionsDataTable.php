<?php

namespace App\DataTables;

use App\Models\Collection;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CollectionsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->editColumn('jenisKoleksi', function ($data) {
                $displayKoleksi = [
                    1 => 'Buku',
                    2 => 'Majalah',
                    3 => 'Cakram Digital',
                ];
                // Check if the jenisKoleksi value is in the mapping, otherwise display it as-is
                return $displayKoleksi[$data->jenisKoleksi] ?? $data->jenisKoleksi;
            })
            ->addColumn('action', function ($data) {
                return $this->getActionColumn($data);
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Collection $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('collections-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('namaKoleksi'),
            Column::make('jenisKoleksi'),
            Column::make('createdAt')
                ->title('Waktu Dibuat'),
            Column::make('jumlahKoleksi'),
            Column::make('namaPengarang'),
            Column::make('tahunTerbit'),
            Column::computed('action')
                ->title('Update Data')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
                ->orderable(false)
                ->searchable(false)
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Collections_' . date('YmdHis');
    }

    protected function getActionColumn($data): string {
        $showUrl = route('koleksiView', $data->id);
        return "<a class='waves-effect btn btn-success' data-value='$data->id'href='$showUrl'><a class = 'material-icons'>Update</a>";
    }
}
