<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\OnpeController;

Route::controller(OnpeController::class)->group( function() {

    Route::get('grupo_votacion/{grupo_votacion}', 'grupo_votacion');

    Route::get('is_departamento/{detalle}', 'is_departamento'); 
    Route::get('is_provincia/{detalle}', 'is_provincia');

    Route::get('departamentos/{inicio}/{fin}', 'departamentos');

    Route::get('provincias/{idDepartamento}', 'provincias');
    Route::get('provincias_departamento/{departamento}', 'provincias_by_departamento');

    Route::get('distritos/{idProvincia}', 'distritos'); 
    Route::get('distritos_provincia/{provincia}', 'distritos_by_provincia');

    Route::get('locales_votacion/{idDistrito}', 'locales_votacion'); 
    Route::get('locales_votacion_distrito/{provincia}/{distrito}', 'locales_votacion_by_distrito');

    Route::get('grupos_votacion/{idLocalVotacion}', 'grupos_votacion'); 
    Route::get('grupos_votacion_ubicacion/{provincia}/{distrito}/{local}', 'grupos_votacion_by_ubicacion');

    Route::get('grupo_votacion_detalle/{departamento}/{provincia}/{distrito}/{local}/{grupo}', 'grupo_votacion_detalle');

    Route::get('votos/{inicio}/{fin}', 'votos'); 
    Route::get('votos_departamento/{departamento}', 'votos_departamento'); 
    Route::get('votos_provincia/{provincia}', 'votos_provincia');

    Route::get('distritos_departamento/{departamento}', 'distritos_departamento'); 
    Route::get('locales_votacion_departamento/{departamento}', 'locales_votacion_departamento');

});
