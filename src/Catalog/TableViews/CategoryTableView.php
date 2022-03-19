<?php

namespace Modules\Catalog\TableViews;

use Illuminate\Support\Str;
use Modules\Catalog\Repositories\CategoryRepository;
use Modules\Dashboard\Services\TableView\TableView;

class CategoryTableView extends TableView
{
    /**
     * @var string
     */
    protected $name = 'Category table';

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            'id' => 'ID',
            'name' => [
                'label' => 'Name',
                'transformer' => function($row) {
                    return Str::limit($row->description, 30);
                }
            ],
            'description' => [
                'label' => 'Description',
                'transformer' => function($row) {
                    return Str::limit($row->description, 30);
                }
            ],
            'updated_at' => [
                'label' => 'Updated',
                'transformer' => function($row) {
                    return $row->updated_at->format('d/m/Y h:i:s');
                }
            ],
            'created_at' => [
                'label' => 'Created',
                'transformer' => function($row) {
                    return $row->created_at->format('d/m/Y h:i:s');
                }
            ]
        ];
    }

    /**
     * @return string[][]
     */
    public function actions(): array
    {
        return [
            'edit' => [
                'route' => 'categories.edit'
            ],
            'delete' => [
                'route' => 'categories.destroy',
                'message' => 'Do you really want to remove category? What you\'ve done cannot be undone.'
            ]
        ];
    }

    public function rows()
    {
        return app(CategoryRepository::class)->paginate();
    }
}
