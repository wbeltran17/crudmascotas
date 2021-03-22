<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MascotasModel;

class MascotasController extends Controller
{

    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $Request)
    {
        $nombre = $Request->get('nombre');
        $mascotas = MascotasModel::Search($Request->nombre)->orderBy('id', 'DESC')->paginate(10);
        return view('mascotas.index', compact('mascotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mascotas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nombre' => 'required', 'raza' => 'required', 'edad' => 'required']);
        MascotasModel::create($request->all());
        return redirect()->route('mascotas.index')->with('success', 'Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mascotas = MascotasModel::find($id);
        return view('mascotas.show', compact('mascotas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mascotas = MascotasModel::find($id);
        return view('mascotas.edit', compact('mascotas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['nombre' => 'required', 'raza' => 'required', 'edad' => 'required']);
        MascotasModel::find($id)->update($request->all());
        return redirect()->route('mascotas.index')->with('success', 'Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MascotasModel::find($id)->delete();
        return redirect()->route('mascotas.index')->with('success', 'Registro eliminado satisfactoriamente');
    }
}
