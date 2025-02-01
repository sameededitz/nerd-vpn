<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivationCode extends Model
{
    protected $fillable = [
        'plan_id',
        'code',
        'is_used',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
