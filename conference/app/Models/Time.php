<?php

namespace App\Models;

use App\Models\Events;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Time extends Model
{
    protected $guarded = ['id'];

    public function events(): BelongsTo
    {
        return $this->belongsTo(Events::class);
    }
}
