<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function member(){
        return $this->hasOne('App\Models\Backoffice\Member', 'user_id','id');
    }

    public function loan(){
        return $this->hasMany('App\Models\Backoffice\Loan', 'user_id','id');
    }

    public function getAvatar(){
        return $this->directory.'/'.$this->filename;
    }

    public function coe(){
        return $this->member->coe_directory."/".$this->member->coe_filename;
    }

    public function bc(){
        return $this->member->bc_directory."/".$this->member->bc_filename;
    }

    public function lp(){
        return $this->member->lp_directory."/".$this->member->lp_filename;
    }

    public function id(){
        return $this->member->id_directory."/".$this->member->id_filename;
    }

    public function fee(){
        return $this->member->fee_directory."/".$this->member->fee_filename;
    }

    public function shareCapital(){
        return $this->hasOne('App\Models\Backoffice\ShareCapital', 'user_id','id');
    }
}
