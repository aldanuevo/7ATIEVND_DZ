<?php

namespace App\Http\Controllers;
use Log;
use Illuminate\Http\Request;
use  App\Models\Cms\Productos;
class EjemploController extends Controller
{
    public function index(Request $request){
        return"Hola ".$request->get("nombre");

    }
    public function tabla(Request $request) {
        try{
        $request=[];
        if($request->has('nomber')){
            if(is_numeric($request->get('nomber'))){
                $resultado=$request->get('nomber')*2;
                $response=['code'=>200,'data'=>$resultado];
                Log::info("Somos grandes");
               // return $request->get('nomber')*18;
            }
            else{
              //return "no es un numero";
        $msg="no es un numero";
        Log::warning("El sonso coloco ".$request->get('nomber'));
        $response=array('code'=>201,'data'=>$msg);
    } 
 } else{
       // return "falta un parametro";
       $response=['code'=>201, 'data'=>'falta un parametro'];
    }
    //return "Numero: "$request->get("number);
    return $response;
    }catch(\Exeption $ex)
    {
        $response=['code'=>500,'data'=>'Incidencia no encontrada'];
        Log::error("ver la linea".$ex->getLine()."=>".$ex->getMessage());
        return response()->json($response);
    }
     }

     public function getProducts(Request $request){
        
        try{
            $response=[];
            
            // $data = Productos::all();
            $data = Productos::orderBy('descripcion','desc')->get();
             if($data!=null)
             {
                 foreach($data as $row)
                 {
                  $response[] = ['uuid'=>$row->uuid,'presio'=>number_formant($row->presio,2),
                  'descripcion'=>$row->descripcion];
                 }
             }
             return $response;

         }
         catch(\Exception $es)
         {
         $response=['code'=>500,'data'=>'Incidencia no encontrada'];
         log::error("ver la linea".$ex->getLine()."=>".$ex->getMessage());
         return response()->json($response);
        }
    }
     
}


