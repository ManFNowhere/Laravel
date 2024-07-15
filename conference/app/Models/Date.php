<?php

namespace App\Models;

use App\Models\Events;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Date extends Model
{
    use HasFactory;
    protected $guarded = ['id'];



    public function date(): BelongsTo
    {
        return $this->belongsTo(Events::class);
    }
}
