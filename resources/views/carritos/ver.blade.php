<x-app-layout>
    <div class="card bg-base-300 w-full shadow-sm">
        <div class="card-body">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th class="text-left">Zapato</th>
                        <th class="text-left">Cantidad</th>
                        <th class="text-left">Precio</th>
                        <th class="text-left">Importe</th>
                        <th class="text-left">Acciones</th>
                    </tr>
                    
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($lineas as $linea)
                    <tr>
                        <td>
                            {{ $linea->denominacion }}
                        </td>
                        <td>
                            {{ $linea->cantidad }}
                        </td>
                         <td>
                            {{ $linea->precio }} €
                        </td>
                        @php
                        $c = $linea->cantidad;
                        $p = $linea->precio ;
                        $importe = $c * $p;
                        $total += $importe;
                        @endphp
                        <td>
                            {{ $importe }}€
                        </td>
                        <td>
                            <div class="flex gap-6">
                                <a href="{{route('carritos.cambiar',['opcion'=>'sumar','id'=>$linea->zapato_id])}}">+</a>
                                <a href="{{route('carritos.cambiar',['opcion'=>'restar','id'=>$linea->zapato_id])}}">-</a>
                            </div>
                        </td>
                    </tr>                    
                    @endforeach
                </tbody>
            </table>
            <tr>
                <td>El total es de :{{ $total }} €</td>
            </tr>
        </div>
    </div>
    <form action="{{ route('carritos.vaciar') }}" method="POST">
    @csrf
            <button class="btn btn-soft btn-error">Vaciar Carrito</button>
    </form>
    
    <div class="flex-2 mt-8">
        <form action="{{ route('carritos.pedido')}}" method="POST">
            @csrf
            <button class="btn btn-soft btn-success">Realizar Pedido</button>
        </form>
    <a href="{{route('zapatos.index')}}" class="btn btn-soft btn-info">Volver</a>
    </div>
</x-app-layout>
