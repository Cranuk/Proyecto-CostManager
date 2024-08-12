<?php

namespace App\Http\Controllers;

use App\Helpers\MyHelpers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RevenueController extends Controller
{
    public function index(){
        $month = Carbon::now()->month;
        $revenues = DB::table('revenues')
                    ->whereMonth('created_at','=',$month)
                    ->get();
        $count = DB::table('revenues')
                    ->whereMonth('created_at','=',$month)
                    ->count();
        $categories = DB::table('categories')->get(); // NOTE: Nos traemos datos de la tabla categorias
        return view('revenues.index',[
            'table' => $revenues,
            'count' => $count,
            'categories' => $categories
        ]);
    }

    public function create(){
        $categories = DB::table('categories')->get(); // NOTE: Nos traemos datos de la tabla categorias
        return view('revenues.create',[
            'categories' => $categories // NOTE: estos datos son para cargar el select de categorias
        ]);
    }

    public function delete($id){
        try {
            DB::table('revenues')->where('id', '=', $id)
                                ->delete();
            return redirect()->route('revenue')
                            ->with('status', 'Se elimino correctamente');
        } catch (\Exception $e) {
            return redirect()->route('revenue')
                            ->with('error', 'Hubo un problema con la operación: ' . $e->getMessage());
        }
    }

    public function edit($id){
        $categories = DB::table('categories')->get(); // NOTE: Nos traemos datos de la tabla categorias
        $edit = DB::table('revenues')->where('id','=',$id)
                                    ->first(); // NOTE: buscamos los datos
        return view('revenues.create',[
            'edit' => $edit,
            'categories' => $categories
        ]); // NOTE: enviamos los datos a donde los seteamos
    }

    public function update(Request $request){
        try {
            $id = $request -> input('id');
            $category = $request -> input('category');
            $description = $request -> input('description');
            $amount = $request -> input('amount');
            DB::table('revenues')->where('id','=',$id)
                                ->update([
                                    'category_id' => $category, 
                                    'description' => $description,
                                    'amount' => $amount
                                ]);
            return redirect()->route('revenue')
                            ->with('status', 'Operación realizada con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('revenue')
                            ->with('error', 'Hubo un problema con la operación: ' . $e->getMessage());
        }
    }

    public function save(Request $request){
        try {
            $description = $request -> input('description');
            $amount = $request -> input('amount');
            $category = $request -> input('category');
            DB::table('revenues')->insert([
                                    'category_id' => $category,
                                    'description' => $description,
                                    'amount' => $amount
                                ]);
            return redirect()->route('revenue')
                            ->with('status', 'Operación realizada con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('revenue')
                            ->with('error', 'Hubo un problema con la operación: ' . $e->getMessage());
        }
    }
}
