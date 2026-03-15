<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Zapato;
use Illuminate\Cache\RetrievesMultipleKeys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Carrito $carrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrito $carrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrito $carrito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrito $carrito)
    {
        //
    }

    public function ver(Request $request){

        $id_usuario = auth()->id();
        $linea = DB::table('carritos')
        ->join('zapatos','carritos.zapato_id','=','zapatos.id')
        ->where('usuario_id','=',$id_usuario)
        ->get();

        return view('carritos.ver',[
            'lineas'=>$linea]);

    }

    public function meter(Request $request,$id){

        $id_usuario = auth()->id();
        $zapato = $id;

        $existe = DB::table('carritos')
        ->where('usuario_id', $id_usuario)
        ->where('zapato_id', $zapato)
        ->first();
        
        if ($existe){
            DB::table('carritos')
            ->where('zapato_id','=',$zapato)
            ->update(['cantidad' => DB::raw('cantidad + 1')]);
        } else {
            DB::table('carritos')->insert(
                ['usuario_id'=>$id_usuario,
                'zapato_id'=>$zapato,
                'cantidad'=>1],
            );
        }
        
        return redirect()->route('zapatos.index');
    }

    public function cambiar(Request $request,$opcion,$id){

        $id_usuario = auth()->id();
        $zapato = $id;

        $existe = DB::table('carritos')
        ->where('usuario_id', $id_usuario)
        ->where('zapato_id', $zapato)
        ->first();

        if ($opcion === 'sumar'){
            DB::table('carritos')
            ->where('zapato_id','=',$zapato)
            ->update(['cantidad' => DB::raw('cantidad + 1')]);
        } elseif($opcion === 'restar') {
            if($existe->cantidad > 1){
                DB::table('carritos')
                ->where('zapato_id','=',$zapato)
                ->update(['cantidad' => DB::raw('cantidad - 1')]);
            } 
        }

        return redirect()->route('carritos.ver');
    }

    public function vaciar(Request $request){
        
        $id_usuario = auth()->id();
        
        DB::table('carritos')->where('usuario_id', '=',$id_usuario)->delete();
        
        return redirect()->route('zapatos.index');
    }
    
}
