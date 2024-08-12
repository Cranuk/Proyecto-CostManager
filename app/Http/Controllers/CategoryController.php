<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    // NOTE: funciones para categorias
    public function index(){
        $categories = DB::table('categories')->get();
        $count = DB::table('categories')->count();
        return view('categories.index',[
            'categories' => $categories,
            'count' => $count
        ]);
    }

    public function create(){
        return view('categories.create');
    }

    public function delete($id){
        try {
            DB::table('categories')->where('id', '=', $id)
                                ->delete();
            return redirect()->route('category')
                            ->with('status', 'Se elimino correctamente');
        } catch (\Exception $e) {
            return redirect()->route('category')
                            ->with('error', 'Hubo un problema con la operación: ' . $e->getMessage());
        }
    }

    public function edit($id){
        $edit = DB::table('categories')->where('id','=',$id)
                                    ->first(); // NOTE: buscamos los datos
        return view('categories.create',[
            'edit' => $edit
        ]); // NOTE: enviamos los datos a donde los seteamos
    }

    public function update(Request $request){
        try {
            $id = $request -> input('id');
            $name = $request -> input('name');
            $description = $request -> input('description');
            $typeCategory = $request -> input('typeCategory');
            $update = Carbon::now()->format('Y-m-d');
            DB::table('categories')->where('id','=',$id)
                                ->update([
                                    'name' => $name,
                                    'description' => $description,
                                    'typeCategory' => $typeCategory,
                                    'updated_at' => $update
                                ]);
            return redirect()->route('category')
                            ->with('status', 'Operación realizada con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('category')
                            ->with('error', 'Hubo un problema con la operación: ' . $e->getMessage());
        }
    }

    public function save(Request $request){
        try {
            $name = $request -> input('name');
            $description = $request -> input('description');
            $typeCategory = $request -> input('typeCategory');
            DB::table('categories')
                                ->insert([
                                    'name' => $name,
                                    'description' => $description,
                                    'typeCategory' => $typeCategory
                                ]);
            return redirect()->route('category')
                            ->with('status', 'Operación realizada con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('category')
                            ->with('error', 'Hubo un problema con la operación: ' . $e->getMessage());
        }
    }
}
