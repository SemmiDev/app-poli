<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DaftarPoli
 * 
 * @property int $id
 * @property int $id_pasien
 * @property int $id_jadwal
 * @property string $keluhan
 * @property int $no_antrian
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property JadwalPeriksa $jadwal_periksa
 * @property Pasien $pasien
 * @property Collection|Periksa[] $periksas
 *
 * @package App\Models
 */
class DaftarPoli extends Model
{
	protected $table = 'daftar_poli';

	protected $casts = [
		'id_pasien' => 'int',
		'id_jadwal' => 'int',
		'no_antrian' => 'int'
	];

	protected $fillable = [
		'id_pasien',
		'id_jadwal',
		'keluhan',
		'no_antrian'
	];

	public function jadwal_periksa()
	{
		return $this->belongsTo(JadwalPeriksa::class, 'id_jadwal');
	}

	public function pasien()
	{
		return $this->belongsTo(Pasien::class, 'id_pasien');
	}

	public function periksas()
	{
		return $this->hasMany(Periksa::class, 'id_daftar_poli');
	}
}
