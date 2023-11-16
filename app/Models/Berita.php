<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ukm;

class Berita extends Model
{
    use HasFactory;
    
    protected $fillable = ['ukm_id', 'judul', 'category', 'deskripsi', 'gambar', 'tanggal'];

    public function ukm()
    {
        return $this->belongsTo(Ukm::class, 'ukm_id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
