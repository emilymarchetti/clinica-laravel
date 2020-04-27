<?php

namespace App\Http\Controllers;

use App\Http\Requests\EspecialidadeRequest;

use App\Models\Especialidade;

class EspecialidadeController extends Controller
{
    private $objEspecialidade;

    public function __construct()
    {
        $this->objEspecialidade = new Especialidade();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $especialidades = $this->objEspecialidade->all();
        return view('especialidades.index', compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('especialidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EspecialidadeRequest $request)
    {
        //
        $cad = $this->objEspecialidade->create([
            'nome' => $request->nome
        ]);
        if ($cad) {
            return redirect('especialidade');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $especialidades = $this->objEspecialidade->find($id);
        return view('especialidades.show', compact('especialidades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $especialidades = $this->objEspecialidade->find($id);
        return view('especialidades.create', compact('especialidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EspecialidadeRequest $request, $id)
    {
        //
        $this->objEspecialidade->where(['id' => $id])->update([
            'nome' => $request->nome
        ]);
        return redirect('especialidade');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $del = $this->objEspecialidade->destroy($id);
        return ($del) ? "sim" : "não";
    }

    public function getAll()
    {
        return $this->objEspecialidade->all();
    }
}
