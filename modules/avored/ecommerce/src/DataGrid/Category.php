<?php

namespace AvoRed\Ecommerce\DataGrid;

use AvoRed\Framework\DataGrid\Facade as DataGrid;

class Category
{
    public $dataGrid;

    public function __construct($model)
    {
        $dataGrid = DataGrid::make('admin_category_controller');

        $dataGrid->model($model)
                  ->column('name', ['label' => '类别', 'sortable' => true])
                  ->column('slug', ['label' => '类别代号','sortable' => true])
                  ->linkColumn('edit', [], function ($model) {
                      return "<a href='".route('admin.category.edit', $model->id)."' >编辑</a>";
                  })
                  ->linkColumn('destroy', [], function ($model) {
                      return "<form id='admin-category-destroy-".$model->id."'
                                      method='POST'
                                      action='".route('admin.category.destroy', $model->id)."'>
                                  <input name='_method' type='hidden' value='DELETE' />
                                  ".csrf_field()."
                                  <a href='#'
                                      onclick=\"jQuery('#admin-category-destroy-$model->id').submit()\"
                                      >删除</a>
                              </form>";
                  });

        $this->dataGrid = $dataGrid;
    }
}
