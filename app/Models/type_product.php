<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\product;

class type_product extends Model
{
    use HasFactory,SoftDeletes;
    public $table= 'type_products';
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(product::class);
    }
}
