<?php


namespace App;

use DateTime;

class Helper
{

    public static function validarData($data, $format = 'Y-m-d', $formatoRetorno = false)
    {
        $dataTemp = DateTime::createFromFormat($format, $data);
        $dataValida = $dataTemp && $dataTemp->format($format) === $data;
        if ($dataValida && $formatoRetorno) {
            return $dataTemp->format($formatoRetorno);
        }
        return $dataValida;
    }

    public static function incrementarDateTime($dataHora, $quantidade=-4, $tipo ="hours") {
        return date("Y-m-d H:i:s", strtotime($quantidade.' '.$tipo, strtotime($dataHora)));
    }

    public static function objectToArray($object)
    {
        $array = json_decode(json_encode($object), true);
        return $array;
    }

    public static function todosCamposVaziosArray($array) {
        foreach($array as $value) {
            if(!empty($value)) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param $data1 date('Y-m-d')
     * @param $data2 date('Y-m-d')
     * @param string $formato
     * @return false|float|int
     *
     * retorna diferença de datas de acordo com formato
     * sendo o padrão retorno por segundos, caso não seja informada
     * uma opção valida de formato [dias,horas,minutos]
     */
    public static function diferencaDatas($data1, $data2, $formato = "segundos") {
        // formato padrão em segundos
        $diff = strtotime($data1) - strtotime($data2);
        if($formato == "dias") {
            $diff = $diff/86400;
        } else if($formato == "horas") {
            $diff = $diff/3600;
        } else if($formato == "minutos") {
            $diff = $diff/60;
        }
        return intval($diff);
    }

    public static function convertePorcentagemMedia($valor) {
        if (is_string($valor) && str_contains($valor,"%")) {
            return floatval($valor)/100;
        } else if (is_string($valor)) {
            return floatval($valor);
        }
        return $valor;
    }

    public static function valueIfExist($objeto, $posicao) {
        if (isset($objeto->$posicao)) {
            return $objeto->$posicao;
        }
        return null;
    }

    public static function apiRequest() {
        $uri = str_replace(url('/'),"",url()->current());
        if (auth()->guard("web")->check()) {
            return false;
        } else if (request()->wantsJson() || str_starts_with($uri,"/api")) {
            return  true;
        }
        return false;
    }

    public static function cronRequest() {
        return \request()->server->get("SCRIPT_NAME") == "/var/www/artisan";
    }

    public static function getHeaders() {
        return $headers = [
            'Access-Control-Allow-Methods' => 'POST,GET,OPTIONS,PUT,DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
        ];
    }

    public static function converterParaData($valor,$tipoValor = "segundos"){
        if ($tipoValor == "segundos") {
            return date('Y-m-d H:i:s', $valor);
        }
        return false;
    }

    public static function adicionarMascara($mascara = "(##)####-####", $str=""){
        $str = str_replace([" ","-","(",")"], "", $str);
        for ($i = 0; $i < strlen($str); $i++) {
            $mascara[strpos($mascara, "#")] = $str[$i];
        }
        return $mascara;
    }
}
