<?php

namespace App\Http\Controllers\Admin;

use Yaro\Jarboe\Http\Controllers\AbstractTableController as BaseAbstractTableController;

abstract class AbstractTableController extends BaseAbstractTableController
{
    protected function beforeInit()
    {
        $this->locales([
            'en',
            'es',
        ]);

        $this->paginate([
            10,
            20,
            50,
        ]);
    }
}
