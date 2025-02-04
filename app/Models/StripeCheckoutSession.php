<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StripeCheckoutSession extends Model
{
    protected $fillable = [
        'session_id',
        'user_id',
        'plan_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
