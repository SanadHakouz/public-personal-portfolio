<?php

namespace App\View\Components;

use App\Models\TechnologyCategory;
use Illuminate\View\Component;
use Illuminate\View\View;

class Technologies extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        $categories = TechnologyCategory::with(['technologies'])
            ->orderBy('display_order')
            ->get();

        return view('components.technologies', [
            'categories' => $categories,
        ]);
    }
}
