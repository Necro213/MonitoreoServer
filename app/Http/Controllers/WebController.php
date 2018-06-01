<?php

namespace App\Http\Controllers;

use App\Root;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class WebController extends Controller
{
    function login(Request $request){
        try{
            $cookie = null;
            $usr = Root::where("username",'=',$request->username)->first();

            if($usr!=null){
                if($usr->password == $request->password){

                    Cookie::queue(Cookie::make('rootfn', ['rootprfn' => 1], 500));
                    return Redirect::to('mapa');
                }
            }
            return 200;
        }catch (Exception $e){
            return 500;
        }
    }

    function index(){
        return view('index');
    }

    function mapa(Request $request){
        if ($request->cookie('rootfn') != null) {
            $id = $request->cookie('rootprfn');
            return view('mapa',["idusr"=>$id]);
        } else {
            return redirect()->route('index');
        }

    }
}
