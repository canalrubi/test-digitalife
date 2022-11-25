<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['original_url', 'url', 'product_id'];

    public function product() {
        return $this->belongsTo(Product::class);
    }

}
