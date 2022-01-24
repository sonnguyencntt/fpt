<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internet extends Model
{
    protected $guarded = [];
    public $timestamps = true;
    public function category()
    {
        return $this->hasOne(Category::class , "id" , "category_id");
    }
    public function store()
    {
        return $this->hasOne(Store::class , "store_code" , "store_code");
    }
}
