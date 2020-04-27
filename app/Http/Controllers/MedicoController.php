<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicoRequest;

use App\Models\Medico;

use Barryvdh\DomPDF\Facade as PDF;

class MedicoController extends Controller
{
    private $objMedico;
    private $especialidadeController;

    public function __construct()
    {
        $this->objMedico = new Medico();
        $this->especialidadeController = new EspecialidadeController();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $medicos = $this->objMedico->all();
        return view('medicos.index', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidades = $this->especialidadeController->getAll();
        return view('medicos.create', compact('especialidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicoRequest $request)
    {
        //
        $cad = $this->objMedico->create([
            'nome' => $request->nome,
            'data_nascimento' => $request->data_nascimento,
            'rg' => $request->rg,
            'cpf' => $request->cpf,
            'crm' => $request->crm,
            'fone' => $request->fone,
            'email' => $request->email,
            'especialidade_id' => $request->especialidade_id,
        ]);
        if ($cad) {
            return redirect('medico');
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
        $medicos = $this->objMedico->find($id);
        return view('medicos.show', compact('medicos'));
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
        $medicos = $this->objMedico->find($id);
        $especialidades = $this->especialidadeController->getAll();
        return view('medicos.create', compact('medicos', 'especialidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedicoRequest $request, $id)
    {
        //
        $this->objMedico->where(['id' => $id])->update([
            'nome' => $request->nome,
            'data_nascimento' => $request->data_nascimento,
            'rg' => $request->rg,
            'cpf' => $request->cpf,
            'crm' => $request->crm,
            'fone' => $request->fone,
            'email' => $request->email,
            'especialidade_id' => $request->especialidade_id,
        ]);
        return redirect('medico');
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
        $del = $this->objMedico->destroy($id);
        return ($del) ? "sim" : "não";
    }

    public function getAll()
    {
        return $this->objMedico->all();
    }

    public function medicoEspecialidade()
    {
        $medicos = \DB::select("
        SELECT
	        M.nome,
	        E.nome AS nome_especialidade
        FROM
	        medico M
        INNER JOIN especialidade E
	        ON E.id = M.especialidade_id");

        $nome_arquivo = "medicoEspecialidade" . date('YmdHis') . ".pdf";
        $pdf = PDF::loadview("medicos\medicos_especialidade", compact('medicos'));
        return $pdf->setPaper('a4')->stream($nome_arquivo);
    }
}
