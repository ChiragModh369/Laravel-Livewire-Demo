<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))->addIndexColumn()->setRowId('id');
    }

    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        $pagination = config('datatables.pagination');
        
        return $this->builder()
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('add'),
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload'),
            ])
            ->parameters([
                // DataTables v2 layout (replaces dom)
                'layout' => [
                    'topStart'    => ['pageLength', 'buttons'], // left
                    'topEnd'      => ['search'],                // right
                    'bottomStart' => ['info'],                  // left
                    'bottomEnd'   => ['paging'],                // right
                ],
                // Tidy up the search UI
                'language' => [
                    'search'            => '',                       // hide "Search:" label text
                    'searchPlaceholder' => 'Search users…',
                ],
                'lengthMenu' => [$pagination, formatLengthMenuLabels($pagination)],
                'pageLength' => $pagination[0], // first option as default

            ]);
    }

    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')   // 👈 serial number column
                ->title('S/N')
                ->searchable(false)
                ->orderable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::make('name'),
            Column::make('email'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
