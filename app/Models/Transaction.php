<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'borrowed_at',
        'returned_at',
        'due_date'
    ];

    public $timestamps = false;

    public static function boot(){ //model events - while creating model slip this process in before saving it in the database
        parent::boot();

        static::creating(function(Transaction $transaction){
            $transaction->borrowed_at = now();
        }); 

        
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }
}
