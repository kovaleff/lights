<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MessageType extends Model
{
    use HasFactory;

    function messages():  HasMany{
        return $this->hasMany(Message::class);
    }
}
