<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    public function date(){
        $currentYear = Carbon::now()->year; // Año actual
        $startYear = $currentYear - 5; // NOTE: iniciar desde 20 años atrás
        $endYear = $currentYear + 5; // NOTE: hasta 5 años adelante
        
        $years = range($startYear, $endYear); // NOTE: Generamos los anios entre esos rangos
        
        // NOTE: Obtener nombres de meses en formato numérico
        $months = [];
        for ($i = 1; $i <= 12; $i++) {
            $months[$i] = Carbon::create()->month($i)->format('F'); // NOTE: 'F' devuelve el nombre completo del mes
        }
        
        return response()->json([
            'years' => $years,
            'months' => $months,
        ]);
    }

    public function filter(Request $request){
        $data = $request -> input('table');
        $month = $request -> input('month');
        $year = $request -> input('year');

        $table = DB::table($data)
                    ->whereMonth('created_at','=',$month)
                    ->whereYear('created_at', '=', $year)
                    ->get();

        $count = DB::table($data)
                    ->whereMonth('created_at','=',$month)
                    ->whereYear('created_at', '=', $year)
                    ->count();

        $categories = DB::table('categories')->get(); // NOTE: Nos traemos datos de la tabla categorias

        $page = $data.'.index';

        return view($page,[
            'table' => $table,
            'count' => $count,
            'categories' => $categories
        ]);
    }
}
