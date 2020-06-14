<?php

namespace App\Admin\Actions;

use Yaro\Jarboe\Table\Actions\AbstractAction;

class ShowPostAction extends AbstractAction
{
    public function render($model = null)
    {
        return view('admin.actions.show_post', compact('model'));
    }
}
