<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaksi
 *
 * @property int $id
 * @property float $total
 * @property int $jenis
 * @property int|null $kegiatan_id
 * @property int $user_id
 * @property string $keterangan
 * @property Carbon $created_at
 *
 * @property User $user
 * @property Kegiatan $kegiatan
 *
 * @package App\Models
 */
class Transaksi extends Model
{
	protected $table = 'transaksi';
	public $timestamps = false;

	protected $casts = [
		'total' => 'float',
		'jenis' => 'int',
		'kegiatan_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'total',
		'status',
		'bukti',
		'jenis',
        'created_at',
		'kegiatan_id',
		'user_id',
		'keterangan'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function kegiatan()
	{
		return $this->belongsTo(Kegiatan::class);
	}
}
