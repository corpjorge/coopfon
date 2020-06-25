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
        Artisan::call('migrate', array('--path' => 'database/migrations/pqrs',));

        DB::table('pq_states')->insert([
            'id' => 1,
            'name' => 'Cerrado',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('pq_states')->insert([
            'id' => 2,
            'name' => 'En proceso',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('pq_types')->insert([
            'id' => 1,
            'name' => 'Petición',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('pq_types')->insert([
            'id' => 2,
            'name' => 'Queja',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('pq_types')->insert([
            'id' => 3,
            'name' => 'Queja',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('pq_types')->insert([
            'id' => 4,
            'name' => 'Reclamo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('pq_types')->insert([
            'id' => 5,
            'name' => 'Felicitación',
            'created_at' => now(),
            'updated_at' => now()
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
        $version = '2.0.1';

        if ($version == $module->version){
            return redirect()->route('module.index')->withStatus(__('No hay actualización disponible.'));
        }

        Artisan::call('migrate', array('--path' => 'database/migrations/pqrs',));

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
