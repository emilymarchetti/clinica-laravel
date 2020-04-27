<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Medico
 * 
 * @property int $id
 * @property string $nome
 * @property Carbon $data_nascimento
 * @property int $rg
 * @property int $cpf
 * @property string $crm
 * @property string $fone
 * @property string $email
 * @property int $especialidade_id
 * @property Carbon $create_time
 * @property Carbon $update_time
 * 
 * @property Especialidade $especialidade
 * @property Collection|Consulta[] $consulta
 *
 * @package App\Models
 */
class Medico extends Model
{
	protected $table = 'medico';
	public $timestamps = false;

	protected $casts = [
		'rg' => 'int',
		'cpf' => 'int',
		'especialidade_id' => 'int'
	];

	protected $dates = [
		'data_nascimento',
		'create_time',
		'update_time'
	];

	protected $fillable = [
		'nome',
		'data_nascimento',
		'rg',
		'cpf',
		'crm',
		'fone',
		'email',
		'especialidade_id',
		'create_time',
		'update_time'
	];

	public function especialidade()
	{
		return $this->belongsTo(Especialidade::class);
	}

	public function consulta()
	{
		return $this->hasMany(Consulta::class);
	}
}
