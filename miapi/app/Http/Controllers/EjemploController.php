<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
class EjemploController extends Controller
{
    public function index(Request $request){
        return "hola ".$request->get("nombre");
    }

    public function tabla(Request $request){
        try{
            $response=[];
            if ($request->has('number')){
                if (is_numeric($request->get('number'))){
                    $resultado=$request->get('number')*2;
                    $response=['code'=>200,'data'=>$resultado];
                    Log::info("somos grandes!!!");
                    //return $resultado;
                }
                else {
                    //return "el dato que ingreso no es un numero";
                    $msg="el dato que ingreso no es un numero";
                    Log::warning("el dato ingresado fue ".$request->get('number'));
                    $response=array('code'=>201, 'data'=>$msg);
                }
            }
            else{
                //return "Falta un paramentro";
                $response=['code'=>201, 'data'=>"falta un parametro"];
            }
            //return $request->get("number");
            return $response;
        }
        catch(\Exception $ex){
            $response=['code'=>500, 'data'=>'incidencia no controlada'];
            Log::error("Ver la linea".$ex->getLine()."=>".$ex->getMessage);
            return response()-> json($response);
        }
        
    }
}
