<?php

namespace App\DateFormatter;

class ConvertMonthToName
{
    public static function convertMonth(array $meses) {
        $nombresMeses = array();
        foreach ($meses as $mes) {
//            $nombreMes = date('F', mktime(0, 0, 0, $mes, 1));
            switch ($mes){
                case 1:
                    $nombresMeses[] = 'Enero';
                    break;
                case 2:
                    $nombresMeses[] = 'Febrero';
                    break;
                case 3:
                    $nombresMeses[] = 'Marzo';
                    break;
                case 4:
                    $nombresMeses[] = 'Abril';
                    break;
                case 5:
                    $nombresMeses[] = 'Mayo';
                    break;
                case 6:
                    $nombresMeses[] = 'Junio';
                    break;
                case 7:
                    $nombresMeses[] = 'Julio';
                    break;
                case 8:
                    $nombresMeses[] = 'Agosto';
                    break;
                case 9:
                    $nombresMeses[] = 'Septiembre';
                    break;
                case 10:
                    $nombresMeses[] = 'Octubre';
                    break;
                case 11:
                    $nombresMeses[] = 'Noviembre';
                    break;
                case 12:
                    $nombresMeses[] = 'Diciembre';
                    break;
            }
        }
        return $nombresMeses;
    }
}
