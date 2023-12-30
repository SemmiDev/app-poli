<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pasien
 * 
 * @property int $id
 * @property string $nama
 * @property string $alamat
 * @property string $no_ktp
 * @property string $no_hp
 * @property string $no_rm
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|DaftarPoli[] $daftar_polis
 *
 * @package App\Models
 */
class Pasien extends Model
{
	protected $table = 'pasien';

	protected $fillable = [
		'nama',
		'alamat',
		'no_ktp',
		'no_hp',
		'no_rm'
	];

	public function daftar_polis()
	{
		return $this->hasMany(DaftarPoli::class, 'id_pasien');
	}
}
