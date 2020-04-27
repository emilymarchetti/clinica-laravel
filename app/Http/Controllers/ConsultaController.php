<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultaRequest;

use App\Models\Consulta;

use Barryvdh\DomPDF\Facade as PDF;

class ConsultaController extends Controller
{
    private $objConsulta;
    private $pacienteController;

    public function __construct()
    {
        $this->objConsulta = new Consulta();
        $this->pacienteController = new PacienteController();
        $this->medicoController = new MedicoController();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $consultas = $this->objConsulta->all();
        return view('consultas.index', compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = $this->pacienteController->getAll();
        $medicos = $this->medicoController->getAll();
        return view('consultas.create', compact('pacientes', 'medicos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsultaRequest $request)
    {
        //
        $cad = $this->objConsulta->create([
            'paciente_id' => $request->paciente_id,
            'medico_id' => $request->medico_id,
            'data' => $request->data,
            'status' => $request->status,
            'descricao' => $request->descricao,
        ]);

        if ($cad) {
            return redirect('consulta');
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
        $consultas = $this->objConsulta->find($id);
        return view('consultas.show', compact('consultas'));
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
        $consultas = $this->objConsulta->find($id);
        $pacientes = $this->pacienteController->getAll();
        $medicos = $this->medicoController->getAll();
        return view('consultas.create', compact('consultas', 'pacientes', 'medicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConsultaRequest $request, $id)
    {
        //
        $this->objConsulta->where(['id' => $id])->update([
            'paciente_id' => $request->paciente_id,
            'medico_id' => $request->medico_id,
            'data' => $request->data,
            'status' => $request->status,
            'descricao' => $request->descricao,
        ]);
        return redirect('consulta');
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
        $del = $this->objConsulta->destroy($id);
        return ($del) ? "sim" : "não";
    }

    public function consultaMedico()
    {
        $consultas = \DB::select("
        SELECT
	        M.nome AS medico_nome,
	        P.nome AS paciente_nome,
	        C.`data` AS data_consulta
        FROM
	        consulta C
        INNER JOIN medico M
	        ON M.id = C.medico_id
        INNER JOIN paciente P
            ON P.id = C.paciente_id
        ");

        $nome_arquivo = "consultaMedico" . date('YmdHis') . ".pdf";
        $pdf = PDF::loadview("consultas\consultas_medico", compact('consultas'));
        return $pdf->setPaper('a4')->stream($nome_arquivo);
    }

    public function consultaPaciente()
    {
        $consultas = \DB::select("
        SELECT
	        M.nome AS medico_nome,
	        P.nome AS paciente_nome,
	        C.`data` AS data_consulta
        FROM
	        consulta C
        INNER JOIN medico M
	        ON M.id = C.medico_id
        INNER JOIN paciente P
            ON P.id = C.paciente_id
        ");

        $nome_arquivo = "consultaPaciente" . date('YmdHis') . ".pdf";
        $pdf = PDF::loadview("consultas\consultas_paciente", compact('consultas'));
        return $pdf->setPaper('a4')->stream($nome_arquivo);
    }
}
