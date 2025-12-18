<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Company extends Model
{
    use HasFactory, HasUuids;

    
    protected $fillable = [
        'name',
        'email',
        'password',
        'contact_name',
        'contact_phone',
        'status',
    ];

    protected $hidden = ['password'];

    public function integrations()
    {
        return $this->belongsToMany(
            Integration::class,
            'company_integrations'
        )->withPivot([
            'id',
            'external_user_id',
            'access_token',
            'refresh_token',
            'token_expires_at',
            'status',
        ])->withTimestamps();
    }
}
