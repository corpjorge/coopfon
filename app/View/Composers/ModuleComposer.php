<?php

namespace App\Http\View\Composers;

use App\Repositories\ModuleRepository;
use Illuminate\View\View;

class ProfileComposer
{
    /**
     * The user repository implementation.
     *
     * @var ModuleRepository
     */
    protected $modules;

    /**
     * Create a new profile composer.
     *
     * @param  ModuleRepository  $modules
     * @return void
     */
    public function __construct(ModuleRepository $modules)
    {
        // Dependencies automatically resolved by service container...
        $this->modules = $modules;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('count', $this->modules->count());
    }
}
