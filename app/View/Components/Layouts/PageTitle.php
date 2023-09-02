<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PageTitle extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $text = null)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $title = $title = trans(config('app.name', 'Saayaraat')) . ' | ' . $this->text;
        return view('components.layouts.page-title', [
            'title' => $title
        ]);
    }
}
