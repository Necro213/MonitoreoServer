<?php

namespace App\Http\Controllers;

use App\Root;
use App\Trabajador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ApiController extends Controller
{
    function getTrabajadores($id){
        try{
            $trabajadores = Trabajador::all()->where('idusuario','=',$id)->where('monitoreo','=',1);
        }catch (Exception $e){

        }


        return Response::json($trabajadores);
    }

    function addtrabajadores(Request $request,$id){
        try{
            $trabajador = new Trabajador();

            $trabajador->idusuario = $id;
            $trabajador->username = $request->params['username'];
            $trabajador->password = $request->params['password'];
            $trabajador->monitoreo = 0;

            $trabajador->save();

            return 200;
        }catch (Exception $e){
            return 300;
        }
    }

    function logint(Request $request){
        try{
            $usr = Root::where("username",'=',$request->params['username'])->first();

            if($usr!=null){
                if($usr->password == $request->params['password']){
                    return $usr->id;
                }
            }
            return 300;
        }catch (Exception $e){
            return 500;
        }
    }

    function logincli(Request $request){
        try{
            $usr = Trabajador::where("username",'=',$request->params['username'])->first();

            if($usr!=null){
                if($usr->password == $request->params['password']){
                    return $usr->id;
                }
            }
            return 300;
        }catch (Exception $e){
            return 500;
        }
    }

    function delete($id){
        try{
            Trabajador::destroy($id);
            return 200;
        }catch (\Exception $e){
            return 300;
        }
    }

    function reload(Request $request, $id){
        try{
            $usr = Trabajador::where("id",'=',$id)->first();

            if($usr!=null){
              $usr->lat = $request->params['lat'];
              $usr->lng = $request->params['lng'];
              $usr->monitoreo = 1;
              $usr->save();
              return 200;
            }
            return 300;
        }catch (Exception $e){
            return 500;
        }
    }

    function cancel($id){
        try{
            $usr = Trabajador::where("id",'=',$id)->first();
            dd($usr);
            if($usr!=null){
                $usr->monitoreo = 0;
                $usr->save();
                return 200;
            }
            return 300;
        }catch (Exception $e){
            return 500;
        }
    }
}
