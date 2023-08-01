<?php

namespace App\DataTables;

use App\Models\Criteria;
use App\Models\Status;
use App\Models\Type;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CriteriaDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addIndexColumn()
        ->addColumn('status', function ($row) {
            $status = Status::findOrFail($row->status);
            return $status->nama;
        })
        ->rawColumns(['status'])
        ->addColumn('type_formatted', function ($row) {
            $type = Type::findOrFail($row->tipe);
            return $type->nama;
        })
        ->rawColumns(['type_formatted'])
        ->addColumn('action', function ($row) {
            return view('criteria.datatable.action', compact('row'))->render();
        })
        ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Criteria $model): QueryBuilder
    {
        return $model->newQuery()
        // ->orderBy('criterias.bobot', 'desc')
        ->with('type');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('criteria-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    
                    ->addColumnDef([
                        'responsivePriority' => 1,
                        'targets' => 1,
                    ])
                    ->orderBy(4, 'desc')
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title('No')
                // ->width(5)
                ->searchable(false)
                ->orderable(false)
                ->addClass("text-sm font-weight-normal")
                ->addClass('text-center'),
            Column::make('nama')
                ->addClass("text-sm font-weight-normal")
                ->title('Nama'),
            Column::make('status')
                ->addClass("text-sm font-weight-normal")
                ->title('Status'),
            Column::make('type_formatted')
                ->addClass("text-sm font-weight-normal")
                ->title('Tipe'),
            Column::make('bobot')
                ->addClass("text-sm font-weight-normal text-center")
                ->title('Bobot'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                // ->width(30)
                ->addClass("text-sm font-weight-normal")
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Criteria_' . date('YmdHis');
    }
}
