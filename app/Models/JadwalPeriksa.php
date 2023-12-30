<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JadwalPeriksa
 *
 * @property int $id
 * @property int $id_dokter
 * @property string $hari
 * @property Carbon $jam_mulai
 * @property Carbon $jam_selesai
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Dokter $dokter
 * @property Collection|DaftarPoli[] $daftar_polis
 *
 * @package App\Models
 */
class JadwalPeriksa extends Model
{
	protected $table = 'jadwal_periksa';

	protected $casts = [
		'id_dokter' => 'int',
		'jam_mulai' => 'datetime',
		'jam_selesai' => 'datetime'
	];

	protected $fillable = [
		'id_dokter',
		'hari',
		'jam_mulai',
		'jam_selesai'
	];

	public function dokter()
	{
		return $this->belongsTo(Dokter::class, 'id_dokter');
	}

	public function daftar_polis()
	{
		return $this->hasMany(DaftarPoli::class, 'id_jadwal');
	}
}
