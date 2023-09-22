<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'birthdate',
        'nationality',
        'biography'
    ];


    public function books(){
        return $this->hasMany(Book::class);
    }

    public function name(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value) {
                return "$this->first_name $this->last_name";
            },
        );
    }
}
