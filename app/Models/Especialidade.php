<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Especialidade
 * 
 * @property int $id
 * @property string $nome
 * @property Carbon $create_time
 * @property Carbon $update_time
 * 
 * @property Collection|Medico[] $medicos
 *
 * @package App\Models
 */
class Especialidade extends Model
{
	protected $table = 'especialidade';
	public $timestamps = false;

	protected $dates = [
		'create_time',
		'update_time'
	];

	protected $fillable = [
		'nome',
		'create_time',
		'update_time'
	];

	public function medicos()
	{
		return $this->hasMany(Medico::class);
	}
}
