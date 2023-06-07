<?php

namespace App\View\Components;

use Illuminate\View\Component;

class programs extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $model;
    public $posts;
    public function __construct($model, $posts)
    {
        $this->model = $model;
        $this->model = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.programs');
    }
}
