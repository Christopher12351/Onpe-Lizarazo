<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OnpeController extends Controller
{

    public function grupo_votacion($grupo_votacion) {
       
        $acta = DB::select("call sp_getGrupoVotacion(?)",[$grupo_votacion]);

        $success = isset($acta);
        $status = $success ? 200 : 404;

        $acta = [
            'success' => $success,
            'acta' => $success ? $acta : null,
            'message' => $success ? 'Acta encontrada' : 'No existe esta acta',
            'status' => $status
        ];
        return response()->json($acta, $status); 
    }



    public function is_departamento($detalle) { 
        $departamento = DB::select("call sp_isDepartamento(?)",[$detalle]); 
            
        $success = isset($departamento); 
        $status = $success ? 200 : 404; 
        
        $departamento = [ 
            'success' => $success, 
            'departamento' => $success ? $departamento : null, 
            'message' => $success ? 'Departamento encontrado' : 'No existe el departamento', 
            'status' => $status 
            ]; 
        
        return response()->json($departamento, $status); 
    }



    public function is_provincia($detalle) { 
        $provincia = DB::select( "call sp_isProvincia(?)", [$detalle] ); 
        
        $success = isset($provincia); 
        $status = $success ? 200 : 404; 
        
        $provincia = [ 
            'success' => $success, 
            'provincia' => $success ? $provincia : null, 
            'message' => $success ? 'Provincia encontrada' : 'No existe la provincia', 
            'status' => $status ]; 
            
        return response()->json($provincia, $status); 
    }



    public function departamentos($inicio, $fin) { 
        $departamentos = DB::select( "call sp_getDepartamentos(?, ?)", [$inicio, $fin] ); 
        
        $success = isset($departamentos); 
        $status = $success ? 200 : 404; 
        
        $departamentos = [ 
            'success' => $success, 
            'departamentos' => $success ? $departamentos : null, 
            'message' => $success ? 'Departamentos encontrados' : 'No existen departamentos', 
            'status' => $status ]; 
            
        return response()->json($departamentos, $status); 
    }


    
    public function provincias($idDepartamento) { 
        
        $provincias = DB::select( "call sp_getProvincias(?)", [$idDepartamento] ); 
        
        $success = isset($provincias); 
        $status = $success ? 200 : 404; 
        
        $provincias = [ 
            'success' => $success, 
            'provincias' => $success ? $provincias : null, 
            'message' => $success ? 'Provincias encontradas' : 'No existen provincias', 
            'status' => $status ]; 
            
        return response()->json($provincias, $status); 
    }



    public function provincias_by_departamento($departamento) { 
        
        $provincias = DB::select( "call sp_getProvinciasbyDepartamento(?)", [$departamento] ); 
        
        $success = isset($provincias); 
        $status = $success ? 200 : 404; 
        
        $provincias = [ 
            'success' => $success, 
            'provincias' => $success ? $provincias : null, 
            'message' => $success ? 'Provincias encontradas' : 'No existen provincias', 
            'status' => $status ]; 
            
        return response()->json($provincias, $status); 
    }



    public function distritos($idProvincia) { 
        
        $distritos = DB::select( "call sp_getDistritos(?)", [$idProvincia] ); 
        
        $success = isset($distritos); 
        $status = $success ? 200 : 404; 
        
        $distritos = [ 
            'success' => $success, 
            'distritos' => $success ? $distritos : null, 
            'message' => $success ? 'Distritos encontrados' : 'No existen distritos', 
            'status' => $status ]; 
            
        return response()->json($distritos, $status); 
    }



    public function distritos_by_provincia($provincia) { 
        
        $distritos = DB::select( "call sp_getDistritosByProvincia(?)", [$provincia] ); 
        
        $success = isset($distritos); 
        $status = $success ? 200 : 404; 
        
        $distritos = [ 
            'success' => $success, 
            'distritos' => $success ? $distritos : null, 
            'message' => $success ? 'Distritos encontrados' : 'No existen distritos', 
            'status' => $status ]; 
            
        return response()->json($distritos, $status); 
    }



    public function locales_votacion($idDistrito) { 
        
        $locales = DB::select( "call sp_getLocalesVotacion(?)", [$idDistrito] ); 
        
        $success = isset($locales); 
        $status = $success ? 200 : 404; 
        
        $locales = [ 
            'success' => $success, 
            'locales' => $success ? $locales : null, 
            'message' => $success ? 'Locales encontrados' : 'No existen locales', 
            'status' => $status ]; 
        return response()->json($locales, $status); 
    }



    public function locales_votacion_by_distrito($provincia, $distrito) { 
        
        $locales = DB::select( "call sp_getLocalesVotacionByDistrito(?, ?)", [$provincia, $distrito] ); 
        
        $success = isset($locales); 
        $status = $success ? 200 : 404; 
        
        $locales = [ 
            'success' => $success, 
            'locales' => $success ? $locales : null, 
            'message' => $success ? 'Locales encontrados' : 'No existen locales', 
            'status' => $status ]; 
            
        return response()->json($locales, $status); 
    }
    


    public function grupos_votacion($idLocalVotacion) { 
        
        $grupos = DB::select( "call sp_getGruposVotacion(?)", [$idLocalVotacion] ); 
        
        $success = isset($grupos); 
        $status = $success ? 200 : 404; 
        
        $grupos = [ 
            'success' => $success, 
            'grupos' => $success ? $grupos : null, 
            'message' => $success ? 'Grupos encontrados' : 'No existen grupos', 
            'status' => $status ]; 
        return response()->json($grupos, $status); 
    }



    public function grupos_votacion_by_ubicacion($provincia, $distrito, $local) { 
        
        $grupos = DB::select( "call sp_getGruposVotacionByProvinciaDistritoLocal(?, ?, ?)", [$provincia, $distrito, $local] ); 
        
        $success = isset($grupos); 
        $status = $success ? 200 : 404; 
        
        $grupos = [ 
            'success' => $success, 
            'grupos' => $success ? $grupos : null, 
            'message' => $success ? 'Grupos encontrados' : 'No existen grupos', 
            'status' => $status ]; 
        return response()->json($grupos, $status); 
    }



    public function grupo_votacion_detalle( $departamento, $provincia, $distrito, $local, $grupo ) { 
        
        $acta = DB::select( "call sp_getGrupoVotacionByProvinciaDistritoLocalGrupo(?, ?, ?, ?, ?)", [ $departamento, $provincia, $distrito, $local, $grupo ] ); 
        
        $success = isset($acta); 
        $status = $success ? 200 : 404; 
        
        $acta = [ 
            'success' => $success, 
            'acta' => $success ? $acta : null, 
            'message' => $success ? 'Acta encontrada' : 'No existe esta acta', 
            'status' => $status ]; 
        return response()->json($acta, $status); 
    }



    public function votos($inicio, $fin) { 
        
        $votos = DB::select( "call sp_getVotos(?, ?)", [$inicio, $fin] ); 
        
        $success = isset($votos); 
        $status = $success ? 200 : 404; 
        
        $votos = [ 
            'success' => $success, 
            'votos' => $success ? $votos : null, 
            'message' => $success ? 'Votos encontrados' : 'No existen votos', 
            'status' => $status ]; 
        return response()->json($votos, $status); 
    }

    

    public function votos_departamento($departamento) { 
        
        $votos = DB::select( "call sp_getVotosDepartamento(?)", [$departamento] ); 
        
        $success = isset($votos); 
        $status = $success ? 200 : 404; 
        
        $votos = [ 
            'success' => $success, 
            'votos' => $success ? $votos : null, 
            'message' => $success ? 'Votos encontrados' : 'No existen votos', 
            'status' => $status ]; 
        return response()->json($votos, $status); 
    }



    public function votos_provincia($provincia) { 
        
        $votos = DB::select( "call sp_getVotosProvincia(?)", [$provincia] ); 
        
        $success = isset($votos); 
        $status = $success ? 200 : 404; 
        
        $votos = [ 
            'success' => $success, 
            'votos' => $success ? $votos : null, 
            'message' => $success ? 'Votos encontrados' : 'No existen votos', 
            'status' => $status ]; 
        return response()->json($votos, $status);
    }



    public function distritos_departamento($departamento) { 
        
        $distritos = DB::select( "call sp_getDistritosDepartamento(?)", [$departamento] ); 
        
        $success = isset($distritos); 
        $status = $success ? 200 : 404; 
        
        $distritos = [ 
            'success' => $success, 
            'distritos' => $success ? $distritos : null, 
            'message' => $success ? 'Distritos encontrados' : 'No existen distritos', 
            'status' => $status ]; 
        return response()->json($distritos, $status); 
    }



    public function locales_votacion_departamento($departamento) { 
        
        $locales = DB::select( "call sp_getLocalesVotacionDepartamento(?)", [$departamento] ); 
        
        $success = isset($locales); 
        $status = $success ? 200 : 404; 
        
        $locales = [ 
            'success' => $success, 
            'locales' => $success ? $locales : null, 
            'message' => $success ? 'Locales encontrados' : 'No existen locales', 
            'status' => $status ]; 
        return response()->json($locales, $status); 
    }
    
}
