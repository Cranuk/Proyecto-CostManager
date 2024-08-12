<?php 
namespace App\Helpers;

use Carbon\Carbon;
use NumberFormatter;
use Illuminate\Support\Facades\DB;

class MyHelpers
{
    // TODO: aquí estarán los métodos que se usarán en toda la web, revisar igual si funciona como corresponde

    // NOTE: función para las fechas
    public static function formatDate($date){
        $fecha = Carbon::parse($date)->format('d/m/Y');
        return $fecha;
    }

    // NOTE: función para monedas
    public static function formatCurrency($amount){
        $formatter = new NumberFormatter('es_AR', NumberFormatter::CURRENCY);
        $formatted = $formatter->formatCurrency($amount, 'ARS');
        return $formatted;
    }

    // NOTE: funciones para balance
    public static function getBalanceNegative(){
        $month = Carbon::now()->month;
        $amountNegative = DB::table('expenses')
                        ->whereMonth('created_at','=',$month)
                        ->sum('amount');
        return $amountNegative;
    }

    public static function getBalancePositive(){
        $month = Carbon::now()->month;
        $amountPositive = DB::table('revenues')
                        ->whereMonth('created_at','=',$month)
                        ->sum('amount');
        return $amountPositive;
    }

    public static function getBalance(){
        $balanceNegative = self::getBalanceNegative();
        $balancePositive = self::getBalancePositive();
        $balanceTotal = $balancePositive - $balanceNegative;
        return [
            'balanceNegative' => $balanceNegative,
            'balancePositive' => $balancePositive,
            'balanceTotal' => $balanceTotal
        ];
    }
}
