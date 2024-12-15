<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemMessage extends Model
{
    use HasFactory;
    
    /**
     * Таблица, связанная с моделью.
     *
     * @var string
     */
    protected $table = 'system_messages';

    /**
     * Поля, которые можно массово назначить.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'message',
    ];

    /**
     * Связь с моделью User (многие к одному).
     * Предполагается, что вы используете модель `User`.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
