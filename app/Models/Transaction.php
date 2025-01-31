<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'account_number',
        'requisites',
        'method',
        'fio',
        'payment_id', 
        'link', 
        'transaction_amount',
        'transaction_amount_with_commission',
        'status',
        'transaction_date',
    ];

    // Связь с пользователем
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}