<?php

namespace App\Http\Controllers\Service;

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
        Artisan::call('migrate', array('--path' => 'database/migrations/service',));

        $module->state_id = 1;
        $module->save();

        DB::table('s_states')->insert([
            'id' => 1,
            'name' => 'En proceso',
            'style' => 'primary',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('s_states')->insert([
            'id' => 2,
            'name' => 'Aprobado',
            'style' => 'success',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('s_states')->insert([
            'id' => 3,
            'name' => 'Negado',
            'style' => 'danger',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('s_states')->insert([
            'id' => 4,
            'name' => 'Documentos faltantes',
            'style' => 'warning',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('s_types')->insert([
            'id' => 1,
            'name' => 'Abierto',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('s_types')->insert([
            'id' => 2,
            'name' => 'Cerrado',
            'created_at' => now(),
            'updated_at' => now()
        ]);

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
        $version = '1.0.1';

        if ($version == $module->version){
            return redirect()->route('module.index')->withStatus(__('No hay actualización disponible.'));
        }

        $module->version = $version;
        $module->save();

        Artisan::call('migrate', array('--path' => 'database/migrations/service',));

        /*
         * Inserte nuevos datos y agréguelos en install
         *
         *
         */



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
