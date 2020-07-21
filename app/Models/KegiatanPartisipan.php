<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KegiatanPartisipan
 *
 * @property int $id
 * @property int $kegiatan_id
 * @property string $nama
 * @property int $jk
 * @property string $alamat
 * @property Carbon|null $created_at
 *
 * @property Kegiatan $kegiatan
 *
 * @package App\Models
 */
class KegiatanPartisipan extends Model
{
	protected $table = 'kegiatan_partisipan';
	public $timestamps = false;

	protected $casts = [
		'kegiatan_id' => 'int',
		'jk' => 'int',
	];

	protected $fillable = [
		'kegiatan_id',
		'nama',
		'jk',
		'alamat'
	];

	public function kegiatan()
	{
		return $this->belongsTo(Kegiatan::class);
	}
}
