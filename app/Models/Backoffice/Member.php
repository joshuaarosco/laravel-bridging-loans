<?php

namespace App\Models\Backoffice;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    use Notifiable, SoftDeletes;

    protected $table = 'members';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id','id');
    }

    public function getAvatar(){
        return $this->id_directory.'/'.$this->id_filename;
    }
}
