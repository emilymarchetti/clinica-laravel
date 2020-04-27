<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Paciente
 * 
 * @property int $id
 * @property string $nome
 * @property Carbon $data_nascimento
 * @property int $rg
 * @property int $cpf
 * @property string $fone
 * @property string $email
 * @property Carbon $create_time
 * @property Carbon $update_time
 * 
 * @property Collection|Consulta[] $consulta
 *
 * @package App\Models
 */
class Paciente extends Model
{
	protected $table = 'paciente';
	public $timestamps = false;

	protected $casts = [
		'rg' => 'int',
		'cpf' => 'int'
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
		'fone',
		'email',
		'create_time',
		'update_time'
	];

	public function consulta()
	{
		return $this->hasMany(Consulta::class);
	}
}
