<?php

namespace App\Http\View\Composers;

use App\Model\Config\Module;
use Illuminate\View\View;

class ModuleComposer
{
    /**
     * The modulo Model implementation.
     *
     * @var Module
     */
    protected $modules;

    /**
     * Create a new profile composer.
     *
     * @param  Module  $modules
     * @return void
     */
    public function __construct(Module $modules)
    {
        // Dependencies automatically resolved by service container...
        $this->modules = $modules->where('state_id',1)->orderBy('order')->get();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('menuModules', $this->modules);
    }
}
