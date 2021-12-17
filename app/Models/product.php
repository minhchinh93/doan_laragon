<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\type_product;

class product extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function type_product(){
        return $this->belongsTo(type_product::class);
    }
}
