<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Yaro\Jarboe\Table\Fields\ColorPicker;
use Yaro\Jarboe\Table\Fields\Text;

class CategoriesController extends AbstractTableController
{
    protected function init()
    {
        $this->setModel(Category::class);

        $this->addFields([
            Text::make('title')->translatable(),
            ColorPicker::make('color_hex', 'Color')->width(1),
        ]);
    }
}
