<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\bill;

class customer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function bill(){
    	return $this->hasMany(bill::class,'id_customer','id');
    }

}
