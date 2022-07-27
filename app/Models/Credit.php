<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    protected $table = 'credits';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'category_id', 'nominal', 'description', 'credit_date'
    ];
}
