<?php

namespace App\Http\Controllers\Pqrs;

use App\Model\Config\Module;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class InstallController extends Controller
{
    /**
     * Install Module service
     *
     * @param \App\Model\Config\Module $module
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function install(Module $module)
    {
        Artisan::call('migrate', array('--force' => true, '--path' => './database/migrations/pqrs'));

        DB::table('pq_config')->insert([
            'id' => 1,
            'terms' => 'Configure sus términos',
            'limit_date' => 30
        ]);

        $module->state_id = 1;
        $module->save();

        return redirect()->route('module.index')->withStatus(__('Modulo instalado.'));
    }

    /**
     * Install Module service
     *
     * @param \App\Model\Config\Module $module
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Module $module)
    {
        $version = '2.0.2';

        if ($version == $module->version){
            return redirect()->route('module.index')->withStatus(__('No hay actualización disponible.'));
        }

        Artisan::call('migrate', array('--force' => true, '--path' => 'database/migrations/pqrs',));

        /*
         * Inserte nuevos datos y agréguelos en install
         *
         *
         */

        $module->version = $version;
        $module->save();

        return redirect()->route('module.index')->withStatus(__('Modulo actualizado.'));

    }

    /**
     * Uninstall Module service
     *
     * @param \App\Model\Config\Module $module
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function uninstall(Module $module)
    {


    }






}
