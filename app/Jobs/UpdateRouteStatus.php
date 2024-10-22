<?php
namespace App\Jobs;

use App\Models\Route;
use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateRouteStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $routeId;
    protected $driverId;
    protected $vehicleId;

    public function __construct($routeId, $driverId,$vehicleId)
    {
        $this->vehicleId = $vehicleId;
        $this->routeId = $routeId;
        $this->driverId = $driverId;
    }

    public function handle()
    {
        // Actualizar el estado de la ruta a "entregada"
        Route::where('id', $this->routeId)->update(['status' => 'entregada']);

        //una vez el pedido se entrege actualizar el estado del vehiculo
        Vehicle::where('id',$this->vehicleId )->update(['status'=>'disponible']);
        
        // Actualizar el estado del conductor a "disponible"
        Driver::where('id', $this->driverId)->update(['availability' => 'disponible']);
    }
}