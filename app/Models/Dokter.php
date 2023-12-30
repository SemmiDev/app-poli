<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Dokter
 * 
 * @property int $id
 * @property string $nama
 * @property string $alamat
 * @property string $no_hp
 * @property int $id_poli
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Poli $poli
 * @property Collection|JadwalPeriksa[] $jadwal_periksas
 *
 * @package App\Models
 */
class Dokter extends Model
{
	protected $table = 'dokter';

	protected $casts = [
		'id_poli' => 'int'
	];

	protected $fillable = [
		'nama',
		'alamat',
		'no_hp',
		'id_poli'
	];

	public function poli()
	{
		return $this->belongsTo(Poli::class, 'id_poli');
	}

	public function jadwal_periksas()
	{
		return $this->hasMany(JadwalPeriksa::class, 'id_dokter');
	}
}
