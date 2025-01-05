<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Arr;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'client_id',
        'description',
        'solution',
        'status',
        'closed_at',
        'user_id',
    ];

    protected array $orderStatus = [
        'open' => "Открыта",
        'in_progress' => "В работе",
        'closed' => "Закрыта",
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getStatus(?string $value = null): string
    {
        if ($value === null) {
            $value = $this->status;
        }

        return Arr::get($this->orderStatus, $value);
    }
}