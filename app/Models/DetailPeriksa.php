<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailPeriksa
 * 
 * @property int $id
 * @property int $id_periksa
 * @property int $id_obat
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Obat $obat
 * @property Periksa $periksa
 *
 * @package App\Models
 */
class DetailPeriksa extends Model
{
	protected $table = 'detail_periksa';

	protected $casts = [
		'id_periksa' => 'int',
		'id_obat' => 'int'
	];

	protected $fillable = [
		'id_periksa',
		'id_obat'
	];

	public function obat()
	{
		return $this->belongsTo(Obat::class, 'id_obat');
	}

	public function periksa()
	{
		return $this->belongsTo(Periksa::class, 'id_periksa');
	}
}
