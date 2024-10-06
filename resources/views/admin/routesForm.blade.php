<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rutas Disponibles</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-6">Rutas Disponibles</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @if($customers && $customers->isNotEmpty())
                @foreach($customers as $customer)
                    @if($customer->user) 
                        <div class="bg-white shadow-md rounded-lg p-4">
                            <h2 class="text-lg font-semibold mb-2 text-center"> Cliente : {{ $customer->user->name }}</h2>
                            <ul class="space-y-2">
                                @foreach($customer->orders as $order)
                                    @if($order->route) 
                                        <li class="border border-gray-300 rounded-md p-3">
                                            <p><strong>Pedido:</strong> {{ $order->charge }}</p>
                                            <p><strong>Fecha del Pedido:</strong> {{ $order->date }}</p>
                                            <p><strong>Origen:</strong> {{ $order->route->origin }}</p>
                                            <p><strong>Destino:</strong> {{ $order->route->destination }}</p>
                                            <p><strong>Distancia:</strong> {{ $order->route->distance }} km</p>
                                            <p><strong>Estado:</strong> {{ $order->route->status }}</p>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @endforeach
            @else
                <p>No customers found.</p>
            @endif
        </div>
    </div>
</body>
</html>