<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Consultum
 * 
 * @property int $id
 * @property int $paciente_id
 * @property int $medico_id
 * @property Carbon $data
 * @property string $descricao
 * @property bool $status
 * @property Carbon $create_time
 * @property Carbon $update_time
 * 
 * @property Medico $medico
 * @property Paciente $paciente
 *
 * @package App\Models
 */
class Consulta extends Model
{
	protected $table = 'consulta';
	public $timestamps = false;

	protected $casts = [
		'paciente_id' => 'int',
		'medico_id' => 'int',
		'status' => 'bool'
	];

	protected $dates = [
		'data',
		'create_time',
		'update_time'
	];

	protected $fillable = [
		'paciente_id',
		'medico_id',
		'data',
		'descricao',
		'status',
		'create_time',
		'update_time'
	];

	public function medico()
	{
		return $this->belongsTo(Medico::class);
	}

	public function paciente()
	{
		return $this->belongsTo(Paciente::class);
	}
}
