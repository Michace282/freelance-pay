<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KingsHistory extends Model
{
    use HasFactory;

    protected $table = 'kings_history';

    protected $fillable = [
        'id',
        'user_id',
        'amount',
        'status',
        'created_at'
    ];

     // Связь с пользователем
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}