<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visita;

class VisitaController extends Controller{

    public function index () {
        
            $datos = visita::all();
            return response() -> json ( $datos ) ; 
    }

    public function guardar (Request $request) {

        $datos = new visita();
        $datos->nombre=$request->nombre;
        $datos->apellido=$request->apellido;
        $datos->motivo=$request->motivo; 
        $datos->save();     

        return response() -> json($request);
    
    }

    public function ver($id) {

        $datos = new visita();  
        $datosencontrados=$datos->find($id);

        return response() -> json($datosencontrados);

    }

    public function eliminar($id) {

        $datos = visita::find($id);
        $datos->delete();
        return response() -> json('registro  borrado');

    }

    public function actualizar(Request $request,$id){

        $datos = visita::find($id);

        if ($request->input('nombre')){
            
            $datos->nombre = $request->input('nombre');
        }
        if ($request->input('apellido')){
            
            $datos->apellido = $request->input('apellido');
        }
        if ($request->input('motivo')){
            
            $datos->motivo = $request->input('motivo');
        }
        $datos->save();

        return response() -> json($datos);
        

    }
}

