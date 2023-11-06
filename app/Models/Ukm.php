<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukm extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'alamat',
        'category',
        'phone_number',
        'tujuan',
        'visi',
        'misi',
        'sejarah',
    ];
    public function editor()
    {
        return $this->belongsTo(User::class);
    }
}
