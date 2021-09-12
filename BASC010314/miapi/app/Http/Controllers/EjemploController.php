<?php

namespace App\Http\Controllers;
use Log;
use Illuminate\Http\Request;
use App\Models\Cms\Productos;


class EjemploController extends Controller
{
    public function index(Request $request){
     return "Hola " . $request->get("nombre");
    }
    public function tabla(Request $request){
        try{
            $response=[];
            if($request->has('number')){
                if(is_numeric($request->get('number'))){
                  $resultado=$request->get('number')*2;
                  $response=['code'=>200,'data'=>$resultado];
                  Log::info("Somos grandes");
                  //return $resultado;
                }
                else{
                    //return "No es un nuemro";
                    $msg="El dato ingresado no es un número";
                    Log::warning("Se coloco".$request->get('number'));
                    $response=array('code'=>201, 'data'=>$msg);
                }
            }
            else{
                //return "Falta un parametro";
                $response=['code'=>2001, 'data'=>"Falta un parametro"];
            }
         //return $request->get("number");
         return $response;
        }catch(\Exception $ex){
            $response=['code'=>500, 'data'=>"Incidencia no encontrada"];
            log::error("Verla línea".$ex->getLine()."=>".$ex->getMessage());
            return response()->json($response);
        }
       
    }

    public function getProducts(Request $request){

        try{
            $response = [];
            //$data = Productos::all();
            //$data = Productos::orderBy('descripcion')->get();
            $data = Productos::orderBy('descripcion','desc')->get();
            if($data!=null){
                foreach($data as $row){
                    $response[] = ['uuid'=>$row->uuid,'precio'=>number_format($row->precio,2),'descripcion'=>$row->descripcion];
                } 
            }
            return $response;
        }
        catch(\Exception $ex){
            $response=['code'=>500, 'data'=>"Incidencia no encontrada"];
            log::error("Verla línea".$ex->getLine()."=>".$ex->getMessage());
            return response()->json($response);
        }
    }
}
