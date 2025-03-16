<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'type',
        'material_usage',
        'production_time',
        'complexity',
        'durability',
        'unique_features',
        'price',
        'image_path',
    ];

    public function maker()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
