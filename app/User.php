<?php namespace App;


use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract {

    use Authenticatable, Authorizable, CanResetPassword;

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

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function imageUser()
    {
        return $this->hasOne('App\ImageUser');
    }

    public function comments()
    {
        $this->hasMany('App\Comment');
    }

    public function getRolesListAttribute()
    {
        return $this->roles->lists('title', 'id');
    }

    public function hasRole($slug)
    {

        if ($this->role->slug === $slug)
        {
            return true;
        }

        return false;
    }

    public function jobs()
    {
        return $this->hasOne(Job::class);
    }

    public function sosmeds()
    {
        return $this->hasOne(Sosmed::class);
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function valueSkill()
    {
        return $this->hasMany(ValueSkill::class);
    }

    public function educations()
    {
        $this->hasOne(FormalEdu::class);
    }

    public function getLastLoginAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }


}
