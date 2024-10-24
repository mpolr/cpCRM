<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCase extends Model
{
    protected $fillable = ['client_id', 'description', 'status', 'assigned_employee'];

    public function client(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function employee(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_employee');
    }
}