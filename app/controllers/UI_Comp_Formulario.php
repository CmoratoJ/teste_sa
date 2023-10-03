<?php

namespace App\controllers;

use App\services\UI_Comp_Formulario_Service;

class UI_Comp_Formulario
{
    private $validateScript;
    private $service;
    public function __construct($validateScript = false) {
        $this->service = new UI_Comp_Formulario_Service();
        $this->validateScript = $validateScript;
    }

    public function renderer($param = false) {
        $html = $this->service->rendererHtml($param, $this->validateScript);
        return $html;
    }

    public function validate()
    {
        return $this->service->validate($_POST);
    }
}