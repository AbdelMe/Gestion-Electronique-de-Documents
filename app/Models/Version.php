<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Version extends Model
{
    protected $guarded = ['id'];
    protected $casts = [
        'date' => 'date',
    ];
    
    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }
}
