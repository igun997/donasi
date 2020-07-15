<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 *
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 *
 * @property Collection|Kegiatan[] $kegiatans
 *
 * @package App\Models
 */
class Category extends Model
{
	protected $table = 'categories';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'created_at'
	];

	public function kegiatans()
	{
		return $this->hasMany(Kegiatan::class);
	}
}
