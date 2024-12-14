<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'deal_id',
        'sender_id',
        'message',
        'message_type',
    ];

    protected $appends = [
        'formattedCreatedAt',
        'sender'
    ];

    public function deal()
    {
        return $this->belongsTo(Deal::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function getSenderAttribute()
    {
        return User::find($this->sender_id)->login;
    }

    public function formattedCreatedAt()
    {
        return $this->created_at->format('g:i A');
    }

    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('g:i A');
    }
}