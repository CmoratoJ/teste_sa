<?php

namespace App\services;

class UI_Comp_Formulario_Service
{
    public function rendererHtml ($param, $validateScript) {
        $data = "";
        $text = "";
        $textArea = "";

        if ($param) {
            $data = $param['data'];
            $text = $param['texto'];
            $textArea = $param['texto_grande'];
        }

        $html  = '<form id"validateScript" method="POST" >';
        $html .= "<div class='row'><label>Data: </label><input type='text' id='date' onkeyup='maskDate(this)' maxlength='10' name='data' value='" . $data . "'/></div>";
        $html .= "<div class='row'><label>Texto: </label><input type='text' id='text' name='texto' value='" . $text . "' maxlength='144'/></div>";
        $html .= "<div class='row'><label>Checkbox? </label><input type='checkbox' id='checkbox' name='checkbox' checked></div>";
        $html .= "<div class='row'><label>Texto grande: </label><textarea id='textarea' name='texto_grande' rows='8' cols='40' maxlength='255'>" . $textArea . "</textarea></div>";
        $html .= "<input id='validateScript' type='hidden' value='".$validateScript."' />";
        $html .= '<div class="row"><label></label><input type="submit" value="Submit"></div></form>';

        return $html;
    }

    public function validate($fields) {
        $dataRegex = '/^\d{2}-\d{2}-\d{4}$/';
        $textoRegex = '/^[a-z\s]{1,144}$/';
        $textoGrandeRegex = '/^[A-Z0-9\s]{1,255}$/';

        foreach ($fields as $fieldName => $fieldValue) {
            switch ($fieldName) {
                case 'data':
                    if (!preg_match($dataRegex, $fieldValue)) {
                        return false;
                    }
                    break;
                case 'texto':
                    if (!preg_match($textoRegex, $fieldValue)) {
                        return false;
                    }
                    break;
                case 'texto_grande':
                    if (!preg_match($textoGrandeRegex, $fieldValue)) {
                        return false;
                    }
                    break;
                default:
                    break;
            }
        }

        return true;
    }
}