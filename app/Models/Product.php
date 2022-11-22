<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table ="products";
    /**
     * @var mixed
     */

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
