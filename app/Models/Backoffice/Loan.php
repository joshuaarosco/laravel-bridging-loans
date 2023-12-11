<?php

namespace App\Models\Backoffice;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    //
    use Notifiable, SoftDeletes;

    protected $table = 'loans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id','id');
    }

    public function loanType(){
        return $this->belongsTo('App\Models\Backoffice\LoanType', 'type_id','id');
    }
}
