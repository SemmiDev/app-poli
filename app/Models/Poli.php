<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Poli
 * 
 * @property int $id
 * @property string $nama_poli
 * @property string $keterangan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Dokter[] $dokters
 *
 * @package App\Models
 */
class Poli extends Model
{
	protected $table = 'poli';

	protected $fillable = [
		'nama_poli',
		'keterangan'
	];

	public function dokters()
	{
		return $this->hasMany(Dokter::class, 'id_poli');
	}
}
