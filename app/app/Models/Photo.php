<?php

namespace App\Models;

use App\Models\Admin\Ad;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['ad_id', 'file_path'];

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}
