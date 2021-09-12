<?php

namespace App\Http\Controllers;
use Log;
use Illuminate\Http\Request;
use App\Models\Cms\Productos;

class EjemploController extends Controller
{
    public function index(Request $request){
        return 'Hola ' .$request->get("nombre");
    }
    public function tabla(Request $request){ 
        try{
            $response=[];
            if($request->has('number')){
                //$resultado=$request->get("number")*2;
                if(is_numeric($request->get('number'))){
                    $resultado=$request->get("number")*2;
                    $response=['code'=>200,'data'=>$resultado];
                    Log::info("Somos GRANDES!!");
                    //return $resultado;
                }else{
                    //return'No es un numero';
                    $msg='No es un número';
                    Log::warning("El sonso colocó ".$request->get('number'));
                    $response=array('code'=>201,'data'=>$msg);
                }
            }else{
                //return 'Falta un parámetro';
                $response=['code'=>201,'data'=>'Falta un parámetro'];
            }
            //return $request->get("number");
            return $response;
        }catch(\Exception $ex){
            $response=['code'=>500,'data'=>'Incidencia no controlada'];
            Log::error("Ver la  línea ".$ex->getLine()."=>".$ex->getMessage());
            return response()->json($response);
        }
    }

    public function getProducts (Request $request){
        try{
            $response=[];
            //$data = Productos::all();
            $data = Productos::orderby('descripcion')->get();
            $data = Productos::orderby('descripcion','desc')->get();
            if($data!=null){
                foreach($data as $row){
                    $response[] = ['uuid'=>$row->uuid,'precio'=>number_format($row->precio,2),'descripcion'=>$row->descripcion];
                }
            }
            return $response;
        }catch(\Exception $ex){
            $response=['code'=>500,'data'=>'Incidencia no controlada'];
            Log::error("Ver la  línea ".$ex->getLine()."=>".$ex->getMessage());
            return response()->json($response);
        }

    }
}
