<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapa;

class MapController extends Controller
{

    public function store(Request $request){

        // dd(auth()->user()->role_id);
        // $this->MapSession($request);
        // $mapas=$request->session()->get('mapas');
        $mapas = new Mapa();
        $mapas->latitud = $request->input('latitud');
        $mapas->longitud = $request->input('longitud');
        $mapas->user_id = auth()->id();
        $mapas->save();
        if ($mapas){
            $notification = 'Se creo las coordenadas seleccionadas!';
        }else{
            $notification = 'No se pudo crear las coordenadas seleccionadas!';
        }

        return response()->json($notification);
    }

    // public function MapSession($request){
    //     $data= Array();
    //         $data[]=array(
    //         "latitud"=>$latitud=$request->latitud,
    //         "longitud"=>$longitud=$request->longitud,
    //         );
    //         $request->session()->push('mapas', $data);
    //         $request->session()->save();
    // }
}
