<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Berita;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function posts(){
        return $this->hasMany(Berita::class);
    }
    
}
