<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
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
            ->editColumn('gender', function ($data) {
                $genderMapping = [
                    1 => 'Pria',
                    2 => 'Wanita',
                ];
                // Check if the gender value is in the mapping, otherwise display it as-is
                return $genderMapping[$data->gender] ?? $data->gender;
            })
            ->addColumn('action', function ($data) {
                return $this->getActionColumn($data);
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('users-table')
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
            Column::make('fullname')
                ->title('Nama Lengkap'),
            Column::make('email'),
            Column::make('username'),
            Column::make('adress')
                ->title('Alamat'),
            Column::make('phoneNumber')
                ->title('Nomor Telepon'),
            Column::make('birthdate')
                ->title('Tanggal Lahir'),
            Column::make('agama'),
            Column::make('gender')
                ->title('Jenis Kelamin'),
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
        return 'Users_' . date('YmdHis');
    }

    // Make an action button
    protected function getActionColumn($data): string {
        $showUrl = route('userView', $data->id);
        return "<a class='waves-effect btn btn-success' data-value='$data->id'href='$showUrl'><a class = 'material-icons'>Update</a>";
    }
}
