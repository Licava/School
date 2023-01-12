<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  
  
    protected $guarded = [];
    use HasFactory;
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    public function scholarship()
    {
        return $this->belongsToMany(Scholarship::class);
    }
}
