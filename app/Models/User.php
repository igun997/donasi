<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Casts\UserStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property int $id
 * @property string $nama
 * @property string $username
 * @property string $password
 * @property string $alamat
 * @property string|null $email
 * @property string|null $no_hp
 * @property string|null $no_rekening
 * @property int $level
 * @property Carbon $created_at
 *
 * @property Collection|Transaksi[] $transaksis
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	public $timestamps = false;

	protected $casts = [
		'level' => 'int',
		'created_at' => 'date',
		'status' => UserStatus::class,
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'nama',
		'username',
		'password',
		'alamat',
		'created_at',
		'email',
		'no_hp',
		'status',
		'level'
	];

	public function transaksis()
	{
		return $this->hasMany(Transaksi::class);
	}
}
