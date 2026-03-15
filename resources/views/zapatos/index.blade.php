<x-app-layout>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-6">
        @foreach ($zapatos as $zapato)
            <div class="card bg-base-100 w-60 shadow-sm">
                <figure class="px-10 pt-10">
                    <img
                        src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                        alt="Shoes"
                        class="rounded-xl" />
                </figure>
                <div class="card-body items-center text-center">
                    <h2 class="card-title">{{$zapato->denominacion}}</h2>
                    <p>{{ $zapato->precio }} €</p>
                    <div class="card-actions">
                        <a class="btn btn-sm btn-ghost btn-primary" href="{{ route('carritos.meter',['id'=>$zapato->id]) }}">Añadir al carrito</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @if ($user)
        <a class="btn btn-sm btn-ghost btn-primary" href="{{ route('carritos.ver') }}">Ver carrito({{ $cantidad }})</a>
    @else
        <a class="btn btn-sm btn-ghost btn-primary" href="{{ route('carritos.ver') }}">Sin carrito</a>
    @endif
</x-app-layout>
