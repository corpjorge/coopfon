<?php

namespace App;

class Coopfon
{
    /**
     * Get the available
     *
     * @param $attributes
     * @param $types
     * @return array
     */
    public function available($attributes, $types): array
    {
        $installed = array();
        $available = array();

        foreach ($attributes as $attribute){
            array_push($installed, $attribute->path);
        }

        switch ($types) {
            case "modules":
                $types = $this->modules();
                break;
            case "integrators":
                $types = $this->integrators();
                break;
            case "externalSystems":
                $types = $this->externalSystems();
                break;
            case "authenticators":
                $types = $this->authenticators();
                break;
        }

        foreach ($types as $type){
            array_push($available, $type['path']);
        }

        return $available = array_diff($available, $installed);
    }

    /**
     * Get the modules
     *
     * @return void
     */
    public function modules(): array
    {
        return [
            [
            'name' => 'PQRS',
            'path' => 'pqrs',
            'version' => '2.0.2',
            'action' => 1,
            ],
            [
            'name' => 'Boletacoop',
            'path' => 'ticket',
            'version' => '3.0.0',
            'action' => 0,
            ],
            [
            'name' => 'Votaciones',
            'path' => 'vote',
            'version' => '2.0.0',
            'action' => 0,
            ],
            [
            'name' => 'Publicaciones',
            'path' => 'publish',
            'version' => '2.0.0',
            'action' => 0,
            ],

            // add new modules
        ];

    }

    /**
     * Get the integrator
     *
     * @return void
     */
    public function integrators(): array
    {
        return[
            [
                'name' => 'Boletacoop',
                'path' => 'ticket',
                'version' => '3.0.0',
                'action' => 0,
            ],

            // add new integrator
        ];
    }

    /**
     * Get the external system
     *
     * @return void
     */
    public function externalSystems(): array
    {
        return[
            [
                'name' => 'Financial Software Web',
                'path' => 'financial',
                'description' => 'Sistema financiero',
                'parameters' => '{ "ip": "190.145.4.62", "protocolo" : "http", "puerto" : "80", "entidad": "FONSODI", "dominio": "fonsodi.com.co", "dominioProtocolo": "https"}',
                'version' => '2.0.1',
                'action' => 1,
            ],

            // add new external system
        ];
    }

    /**
     * Get the authenticators
     *
     * @return void
     */
    public function authenticators(): array
    {
        return[
            [
                'name' => 'Documento',
                'path' => 'document',
                'description' => 'Ingresar con documento',
                'icon' => 'fa fa-credit-card',
                'parameters' => null,
                'version' => '2.0.0',
                'action' => '1',
            ],
            [
                'name' => 'Facebook',
                'path' => 'facebook',
                'description' => 'Ingresar con Facebook',
                'icon' => 'fa fa-facebook-square',
                'parameters' => null,
                'version' => '2.0.0',
                'action' => '1',
            ],
            [
                'name' => 'Google',
                'path' => 'google',
                'description' => 'Ingresar con Gmail',
                'icon' => 'fa fa-google',
                'parameters' => null,
                'version' => '2.0.0',
                'action' => '1',
            ],
            [
                'name' => 'Azure',
                'path' => 'azure',
                'description' => 'Ingresar con SSO',
                'icon' => 'fa fa-windows',
                'parameters' => null,
                'version' => '2.0.0',
                'action' => '1',
            ],
            [
                'name' => 'Financial',
                'path' => 'financial',
                'description' => 'Ingresar con Financial',
                'icon' => 'fa fa-key',
                'parameters' => '{ "ip": "190.145.4.62", "protocolo" : "http", "puerto" : "80", "entidad": "FONSODI"}',
                'version' => '2.0.0',
                'action' => '1',
            ],

            // add new authenticators
        ];
    }


}
