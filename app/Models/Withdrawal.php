<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    protected $table = 'withdrawals';

    protected $fillable = [
        'id',
        'user_id',
        'requisites',
        'account_number',
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
