<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\bill;
class bill_detaill extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product(){
    	return $this->belongsTo(product::class,'id_product','id');
    }

    public function bill(){
    	return $this->belongsTo(bill::class,'id_bill','id');
    }
}
