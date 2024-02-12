<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;
    public $fillable=[
        'message_type_id'
    ];

    function messageType(): BelongsTo{
        return $this->belongsTo(MessageType::class);
    }
}
