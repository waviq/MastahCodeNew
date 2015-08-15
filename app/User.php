<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
        'username',
        'name',
        'jenisKelamin',
        'tanggalLahir',
        'alamat',
        'nomorTelfon',
        'email',
        'code',
        'active',
        'role_id',
        'password',
        'password_tmp'
    ];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function imageUser(){
        return $this->hasOne('App\ImageUser');
    }

    public function comments()
    {
        $this->hasMany('App\Comment');
    }

    public function getRolesListAttribute()
    {
        return $this->roles->lists('title','id');
    }

    public function hasRole($slug)
    {

        if($this->role->slug === $slug){
            return true;
        }
        return false;
    }





}
