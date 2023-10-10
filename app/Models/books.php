<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LostBook;

class books extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'author'
    ];

    public function reservation():HasOne{
        return $this->hasOne(Reservation::class, 'book_id');
    }

    public function lostBooks()
{
    return $this->hasMany(LostBook::class);
}

}
