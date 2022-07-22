<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class categoryController extends Controller
{
    public function listaCategory(){
        $dato['category']= category::paginate(50);
        return view('category.listaCategory', $dato);
    }
    public function formCategory(){
        return view('category.crearCategory');
    }

    public function guardarCategory(Request $request){
        try{
            $validar=$this->validate($request,[
                'description'=>'required',
            ]);
            category::create([
                'description'=>$validar['description'],
            ]);
        }catch (QueryException $queryException){
            Log::debug($queryException->getMessage());
            return redirect('/formCategory')->with('alertaQery', 'no');
        } catch (\Exception $exception){

            Log::debug($exception->getMessage());

            return redirect('/formCategory')->with('alerta', 'si');
    }
    return redirect('/category')->with('Guardado', "Guardado");
    }

    public function editformCategory($id){
        $category=category::findOrFail($id);

        return view('category.editCategory', compact('category'));
    }
    public function editCategory(Request $request, $id ){
        $dato=request()->except((['_token','_method']));
        category::where('id','=', $id)->update($dato);
        return redirect('/category')->with('Guardado', "Guardado");
    }
    public function destroy($id){
        try {
            category::destroy($id);
            return redirect('/category')->with('Guardado', "Guardado");
        }catch (\Exception $exception){
            Log::debug($exception->getMessage());
            return redirect('/category')->with('alerta','si');
        }
    }
}

