<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;

class RouteController extends Controller
{
    public function getRoutes(){
        $routes=Route::all();
        return response()->json($routes);
    }

    public function registerRoutes(Request $request){
        $request->validate([
         "origin"=> "required|string",
         "destination"=> "required|string",
         "distance"=> "required|decimal:10,00",
         "status"=> "required|string",
        ]);
        $route= new Route();
        $route->name=$request->route()->name;
        $route->destination=$request->route()->destination;
        $route->status=$request->route()->status;
        $route->save();
        return response()->json([
            "message"=>"Route agregada exitosamente",
            "Route"=>$route
        ]);
    }

    public function updateRoutes(Request $request)
    {
        $route= Route::find($request->id);
        $route->update($request->all());
        return response()->json([
            "message"=> "Route actualizada con exito",
            "Route"=>$route
        ]) ;

    }

    public function deleteRoutes(Request $request){
        $route= Route::find($request->id);
        $route->delete();
        return response()->json([
            "message"=> "Route Eliminada con exito",
            "Route"=>$route
        ]);
    }
}
//origin', 'destination', 'distance', 'status