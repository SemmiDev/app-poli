<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Obat
 * 
 * @property int $id
 * @property string $nama_obat
 * @property string $kemasan
 * @property int $harga
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|DetailPeriksa[] $detail_periksas
 *
 * @package App\Models
 */
class Obat extends Model
{
	protected $table = 'obat';

	protected $casts = [
		'harga' => 'int'
	];

	protected $fillable = [
		'nama_obat',
		'kemasan',
		'harga'
	];

	public function detail_periksas()
	{
		return $this->hasMany(DetailPeriksa::class, 'id_obat');
	}
}
