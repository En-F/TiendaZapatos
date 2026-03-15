<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Zapato;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class ZapatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //obtengo el usuario logeado
        $id = auth()->id();

        $cantidad = DB::table('carritos')
        ->where('usuario_id','=',$id)
        ->sum('cantidad');

        return view('zapatos.index',[
            'zapatos'=>Zapato::all(),
            'cantidad'=>$cantidad,
            'user'=>$id
        ]);
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
    public function show(Zapato $zapato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Zapato $zapato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Zapato $zapato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zapato $zapato)
    {
        //
    }
}
