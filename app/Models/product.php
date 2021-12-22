<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\type_product;
use App\Models\bill_detaill;

class product extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(type_product::class,'id_type', 'id');

    }

    public function bill_detail(){
    	return $this->hasMany(bill_detaill::class,'id_product','id');
    }
}
