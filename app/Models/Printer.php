<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "model",
        "country",
        "year",
        "img",
        "description",
        "category",
        "price"
    ];
}
