<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use App\Models\Cms\Productos;

class EjemploController extends Controller
{

public function index(Request $request)
{
    return "Hola " . $request->get("nombre");
}

    public function tabla(Request $request)
    {   
        try{

            $response=[];
            
            if ($request->has('number'))
            {
                if(is_numeric($request->get('number')))
                {
                $respuesta=$request->get('number')*18;
                $response=['code'=>200,'data'=>$respuesta];
                Log::info("Somos grandes");
                    //return $respuesta;
                }
                else
                {
                    //return  "El valor no es un número.";
                    $msg="El valor no es un número.";
                    $response=array('code'=>201,'data'=>$msg);
                }
            }

            else
            {
                //return "Falta un parámetro.";
                $response=['code'=>201,'data'=>"Falta un parámetro"];
            }

            //return $request->get("number");
            return $response;
        }catch(\Exception $ex)
        {
            $response=['code'=>500,'data'=>'Incidencia no controlada'];
            Log::error("Ver la linea: ".$ex->getLine()."=>".$ex->getMessage());
            return response()->json(arreglo);
        }
    }


    public function getProducts(Request $request){

        try{
            $response=[];
           //$data = Productos::all();
           //$data = Productos::orderBy('descripcion')->get();
           $data = Productos::orderBy('descripcion','desc')->get();
           if($data!=null)
           {
               foreach($data as $row)
               {
                $response[] = ['uuid'=>$row->uuid,'precio'=>number_format( $row->precio,2),
                'descripcion'=>$row->descripcion];
               }
           }
           return $response; 
        }
        catch(\Exception $ex)
        {
            $response=['code'=>500,'data'=>'Incidencia no controlada'];
            Log::error("Ver la linea: ".$ex->getLine()."=>".$ex->getMessage());
            return response()->json(arreglo);
        }
    }
}
