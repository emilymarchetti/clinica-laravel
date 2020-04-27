<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteRequest;

use App\Models\Paciente;

class PacienteController extends Controller
{
    private $objPaciente;

    public function __construct()
    {
        $this->objPaciente = new Paciente();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pacientes = $this->objPaciente->all();
        return view('pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PacienteRequest $request)
    {
        //
        $cad = $this->objPaciente->create([
            'nome' => $request->nome,
            'data_nascimento' => $request->data_nascimento,
            'rg' => $request->rg,
            'cpf' => $request->cpf,
            'fone' => $request->fone,
            'email' => $request->email
        ]);
        if ($cad) {
            return redirect('paciente');
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
        $pacientes = $this->objPaciente->find($id);
        return view('pacientes.show', compact('pacientes'));
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
        $pacientes = $this->objPaciente->find($id);
        return view('pacientes.create', compact('pacientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PacienteRequest $request, $id)
    {
        //
        $this->objPaciente->where(['id' => $id])->update([
            'nome' => $request->nome,
            'data_nascimento' => $request->data_nascimento,
            'rg' => $request->rg,
            'cpf' => $request->cpf,
            'fone' => $request->fone,
            'email' => $request->email
        ]);
        return redirect('paciente');
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
        $del = $this->objPaciente->destroy($id);
        return ($del) ? "sim" : "não";
    }

    public function getAll()
    {
        return $this->objPaciente->all();
    }
}
