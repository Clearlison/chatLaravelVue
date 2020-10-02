<?php

namespace App\Models\Chat;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['body'];
    protected $appends = ['owner'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y H:i', strtotime($value));
    }

    public function getOwnerAttribute() {
        return $this->user_id == auth()->user()->id;
    }
}
