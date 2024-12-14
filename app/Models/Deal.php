<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'executor_id',
        'amount',
        'deal_title',
        'description',
        'status',
        'role',
        'deal_date',
    ];

    // Связь с пользователем - заказчик
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    // Связь с пользователем - исполнитель
    public function executor()
    {
        return $this->belongsTo(User::class, 'executor_id');
    }

    // Связь с чатом
    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

    // Связь с транзакциями
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}