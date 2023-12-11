<?php

namespace App\Models\Backoffice;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    use Notifiable, SoftDeletes;

    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function productImage(){
        return $this->hasOne('App\Models\Backoffice\ProductImage', 'product_id','id')->where('is_thumb', true);
    }

    public function thumbnail(){
        return $this->productImage->directory."/".$this->productImage->filename;
    }

    public function loanType(){
        return $this->belongsTo('App\Models\Backoffice\LoanType', 'loan_type_id','id');
    }
}
