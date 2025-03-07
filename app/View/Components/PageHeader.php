<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageHeader extends Component
{
    public $title;
    public $background;
    public $breadcrumbs;

    public function __construct($title, $background, $breadcrumbs = [])
    {
        $this->title = $title;
        $this->background = $background;
        $this->breadcrumbs = $breadcrumbs;
    }

    public function render()
    {
        return view('components.page-header');
    }
}
