<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model

{
    protected $fillable = [
        'user_id',
        'book_id',

    ];
    use HasFactory;
    public function user():BelongsTo{
        return $this->BelongsTo(User::class, 'user_id');
    }

    public function book():BelongsTo{
        return $this->BelongsTo(Books::class, 'book_id');
    }
}
