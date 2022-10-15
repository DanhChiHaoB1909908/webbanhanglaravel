<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    //
    public $timestamps = false; //set time to false
    protected $fillable = [
        'brand_name', 'brand_desc', 'brand_status'
    ];
    protected $primaryKey = 'brand_id';
    protected $table = 'tbl_brand';

    // public function product(){
    //     return $this->belongsTo('App\Product', 'brand_id');
    // }
}
