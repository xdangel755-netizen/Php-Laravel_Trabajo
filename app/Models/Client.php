<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address', 'city', 'document_id', 'is_active'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
