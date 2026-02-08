<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class blog extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        "titr", "author", "text"
    ];
    protected $blog = ['deleted_at'];
}
