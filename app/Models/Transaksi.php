<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Casts\FileBase;
use App\Casts\JenisCast;
use App\Casts\StatusCast;
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
		'jenis' => JenisCast::class,
		'created_at' => 'date',
		'bukti_upload' => 'date',
		'tgl_donasi' => 'date',
		'status' => StatusCast::class,
		'bukti' => FileBase::class,
		'kegiatan_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'total',
		'status',
		'bukti',
		'jenis',
        'created_at',
        'bukti_upload',
        'no_rekening',
        'atas_nama',
        'tgl_donasi',
		'kegiatan_id',
		'user_id',
		'no_rekening',
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
