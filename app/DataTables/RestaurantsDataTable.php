<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RestaurantsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->rawColumns([
                'logo',
            ])
            ->setRowClass('align-baseline clickable-row')
            ->setRowAttr([
                "onclick" => "rowSelected(this)",
                "style" => "cursor: pointer;",
            ])
            ->setRowId(function ($record) {
                return $record->id;
            })
            
            ->editColumn('logo', function ($record) {
                return '<img src="' . Storage::url($record->logo) . '" style="max-height: 60px; max-width: 60px;">';
            })
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('restaurants-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            // ->dom('Bfrtip')
            ->dom('<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>')
            ->orderBy(1)
            ->parameters([
                'responsive' => true,
                'autoWidth' => false,
                'lengthMenu' => [[25, 50, 100], ['25', '50', '100']],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('logo')->title(trans(''))
            ->orderable(false)
            ->exportable(false)
            ->printable(false)
            ->searchable(false),
            Column::make('name')->title(trans('app.restaurant_name')),
            Column::make('motto')->title(trans('app.restaurant_motto')),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Restaurants_' . date('YmdHis');
    }
}
