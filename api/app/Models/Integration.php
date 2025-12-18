<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Integration extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'slug',
        'name',
        'active',
    ];

    public function companies()
    {
        return $this->belongsToMany(
            Company::class,
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
