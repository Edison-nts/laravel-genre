<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Traits\Uuid;


class Category extends Model
{
    use SoftDeletes, Uuid;
    protected $fillable = ['name', 'description', 'is_active'];
    protected $dates = ['deleted_at'];

    // necessario pois o id é um UUID , ele tenta converter para int
    protected $casts = [
        'id' => 'string'
    ];

    
}
