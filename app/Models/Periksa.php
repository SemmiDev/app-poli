<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Periksa
 * 
 * @property int $id
 * @property int $id_daftar_poli
 * @property Carbon $tgl_periksa
 * @property string $catatan
 * @property int $biaya_periksa
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property DaftarPoli $daftar_poli
 * @property Collection|DetailPeriksa[] $detail_periksas
 *
 * @package App\Models
 */
class Periksa extends Model
{
	protected $table = 'periksa';

	protected $casts = [
		'id_daftar_poli' => 'int',
		'tgl_periksa' => 'datetime',
		'biaya_periksa' => 'int'
	];

	protected $fillable = [
		'id_daftar_poli',
		'tgl_periksa',
		'catatan',
		'biaya_periksa'
	];

	public function daftar_poli()
	{
		return $this->belongsTo(DaftarPoli::class, 'id_daftar_poli');
	}

	public function detail_periksas()
	{
		return $this->hasMany(DetailPeriksa::class, 'id_periksa');
	}
}
