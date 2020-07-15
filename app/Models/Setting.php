<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 *
 * @property int $id
 * @property string $set_key
 * @property string $set_value
 * @property Carbon $created_at
 *
 * @package App\Models
 */
class Setting extends Model
{
	protected $table = 'setting';
	public $timestamps = false;

	protected $fillable = [
		'set_key',
        'created_at',
		'set_value'
	];
}
