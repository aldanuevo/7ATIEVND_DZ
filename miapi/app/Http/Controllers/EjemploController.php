<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use App\Models\Cms\Productos;

class EjemploController extends Controller
{
    public function index(Request $request){
        return "Hola ".$request->get("nombre");
    }
    public function tabla(Request $request){
        $response=[];
        try{
        if($request->has('number')){
            if(is_numeric($request->get('number'))){
                $resultado = $request->get('number')*18;
                $response=['code'=>200,'data'=>$resultado];
                Log::info("Somos grandes!!");
                //return $resultado;
            }
            else{
                //return "el valor debe ser numerico";
                $msg = "el valor debe ser numerico";
                Log::warning("El sonso colocó ".$request->get('number'));
                $response=array('code'=>201, 'data'=>$msg);
            } 

        }
        else {
            //return "Falta un parametro";

            $response=['code'=>201, 'data'=>'Falta parametro'];
        }
        //return response()->json($response);
        return $response;
        //return $request->get("number");

    }
    catch(\Exception $ex){
        $response=['code'=>500, 'data'=>'Incidencia no controlada'];
        Log::error("Ver la linea ".$ex->getLine()."=>".$ex->getMessage());
        return response()->json($response);

    }
    }

    public function getProducts(Request $request){
        try{
            $response=[];
            //$data = Productos::all();
            //$data = Productos::orderBy('descripcion')->get();
            $data = Productos::orderBy('descripcion','desc')->get();
            if($data!=null){
                foreach($data as $row){
                    $response[] = ['uuid'=>$row->uuid,'precio'=>'$'.number_format($row->precio,3),'descripcion'=>$row->descripcion];
                }
            }
            return $response;
            }
        catch(\Exeption $ex){
            $response = ['code'=>500,'data'=>'Incidencia no controlada'];
            Log::error("ver la linea: ".$ex->getLine()."=>".$ex->getMenssage());
            return response()->json(arreglo);
        }
    }
}
