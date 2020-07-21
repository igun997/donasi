<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Kegiatan
 *
 * @property int $id
 * @property string $nama
 * @property string $ket
 * @property int|null $category_id
 * @property Carbon $created_at
 *
 * @property Category $category
 * @property Collection|KegiatanDetail[] $kegiatan_details
 * @property Collection|KegiatanPartisipan[] $kegiatan_partisipans
 * @property Collection|Transaksi[] $transaksis
 *
 * @package App\Models
 */
class Kegiatan extends Model
{
	protected $table = 'kegiatan';
	public $timestamps = false;

	protected $casts = [
		'category_id' => 'int'
	];

	protected $fillable = [
		'nama',
		'created_at',
		'ket',
		'category_id'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function kegiatan_details()
	{
		return $this->hasMany(KegiatanDetail::class);
	}

	public function kegiatan_partisipans()
	{
		return $this->hasMany(KegiatanPartisipan::class);
	}

	public function transaksis()
	{
		return $this->hasMany(Transaksi::class);
	}
}
