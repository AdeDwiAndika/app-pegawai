<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'created_by',
        'expires_at',
    ];

    protected $dates = ['expires_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function isExpired()
    {
        return $this->expires_at && $this->expires_at < Carbon::now();
    }
}