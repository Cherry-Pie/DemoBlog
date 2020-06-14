<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Actions\ShowPostAction;
use App\Models\Post;
use Yaro\Jarboe\Table\Fields\Checkbox;
use Yaro\Jarboe\Table\Fields\Datetime;
use Yaro\Jarboe\Table\Fields\Image;
use Yaro\Jarboe\Table\Fields\Select;
use Yaro\Jarboe\Table\Fields\Tags;
use Yaro\Jarboe\Table\Fields\Text;
use Yaro\Jarboe\Table\Fields\Wysiwyg;
use Yaro\Jarboe\Table\Filters\CheckboxFilter;
use Yaro\Jarboe\Table\Filters\TextFilter;
use Yaro\Jarboe\Table\Toolbar\ShowHideColumnsTool;

class PostsController extends AbstractTableController
{
    protected function init()
    {
        $this->setModel(Post::class);
        $this->sortable('sort_weight');

        $this->addFields([
            Text::make('title')->translatable()->inline()->filter(TextFilter::make())->col(6),
            Select::make('category_id', 'Category')->type(Select::SELECT_2)->relation('category', 'title')->col(6),
            Image::make('preview_image')->crop()->disk('public'),
            Datetime::make('published_at')->orderable()->default(now())->col(6),
            Checkbox::make('is_published')->filter(CheckboxFilter::make())->orderable()->col(6),
            Wysiwyg::make('content')->translatable(),
            Tags::make('tags')->relation('tags', 'title'),
        ]);

        $this->addAction(ShowPostAction::make(), 'before', 'edit');

        $this->addTool(new ShowHideColumnsTool());
    }
}
