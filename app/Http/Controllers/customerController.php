<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class customerController extends Controller
{
 public function listaCustomer(Request $request){
     $texto=trim($request->get('texto'));
     $customer=DB::table('customer')
         ->join('category','customer.category_id','=','category.id')
         ->select('customer.*','category.description')
         ->where('name','LIKE','%'.$texto.'%')
         ->orwhere('addres','LIKE','%'.$texto.'%')
         ->orwhere('phone_number','LIKE','%'.$texto.'%')
         ->orwhere('category.description','LIKE','%'.$texto.'%')

         ->paginate(10);

    return view('customer.listaCustomer',compact('customer','texto'));
}

    public function formCustomer(){
     $category=category::all();
    return view('customer.crearCustomer',compact('category'));
}

    public function guardarCustomer(Request $request){
    try{
        $validar=$this->validate($request,[
            'name'=>'required',
            'addres'=>'required',
            'phone_number'=>'required',
            'category_id'=>'required',

        ]);
        customer::create([
            'name'=>$validar['name'],
            'addres'=>$validar['addres'],
            'phone_number'=>$validar['phone_number'],
            'category_id'=>$validar['category_id'],
        ]);
    }catch (QueryException $queryException){
        Log::debug($queryException->getMessage());
        return redirect('/formCustomer')->with('alertaQery', 'no');
    } catch (\Exception $exception){

        Log::debug($exception->getMessage());

        return redirect('/formCustomer')->with('alerta', 'si');
    }
    return redirect('/listaCustomer')->with('customeriaGuardado', 'Guardado');
}

    public function editformCustomer($id){
        $category=category::all();
    $customer=customer::findOrFail($id);

    return view('customer.editCustomer', compact('customer','category'));
}
    public function editCustomer(Request $request, $id ){
    $dato=request()->except((['_token','_method']));
    customer::where('id','=', $id)->update($dato);
    return redirect('/listaCustomer')->with('customerModificado', 'Modificado');
}
    public function destroy($id){
    try {
        customer::destroy($id);
        return redirect('/listaCustomer')->with('customerEliminado', 'Eliminado');
    }catch (\Exception $exception){
        Log::debug($exception->getMessage());
        return redirect('/listaCustomer')->with('alerta','si');
    }
}
}

