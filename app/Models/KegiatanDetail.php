<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KegiatanDetail
 * 
 * @property int $id
 * @property string $foto
 * @property int $kegiatan_id
 * 
 * @property Kegiatan $kegiatan
 *
 * @package App\Models
 */
class KegiatanDetail extends Model
{
	protected $table = 'kegiatan_detail';
	public $timestamps = false;

	protected $casts = [
		'kegiatan_id' => 'int'
	];

	protected $fillable = [
		'foto',
		'kegiatan_id'
	];

	public function kegiatan()
	{
		return $this->belongsTo(Kegiatan::class);
	}
}
