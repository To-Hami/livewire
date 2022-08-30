<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['imagePath','image'];


    //relations ==========================================

    public function user(){
        return $this->belongsTo(User::class);
    }

    // attribute  =======================================

    public function getImagePathAttribute(){
        return Storage::disk('public')->url($this->image);
    }
}
