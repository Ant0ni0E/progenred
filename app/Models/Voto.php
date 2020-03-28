<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Voto
 * 
 * @property int $id
 * @property int $eleccion_id
 * @property int $casilla_id
 * @property string $evidencia
 * 
 * @property Casilla $casilla
 * @property Eleccion $eleccion
 * @property Collection|Candidato[] $candidatos
 *
 * @package App\Models
 */
class Voto extends Model
{
	protected $table = 'voto';
	public $timestamps = false;

	protected $casts = [
		'eleccion_id' => 'int',
		'casilla_id' => 'int'
	];

	protected $fillable = [
		'eleccion_id',
		'casilla_id',
		'evidencia'
	];

	public function casilla()
	{
		return $this->belongsTo(Casilla::class);
	}

	public function eleccion()
	{
		return $this->belongsTo(Eleccion::class);
	}

	public function candidatos()
	{
		return $this->belongsToMany(Candidato::class, 'votocandidato')
					->withPivot('votos');
	}
}
