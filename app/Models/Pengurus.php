<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;

    protected $guarded = [];

    // one to one ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
