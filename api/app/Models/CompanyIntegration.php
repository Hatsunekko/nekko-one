<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class CompanyIntegration extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'company_id',
        'integration_id',
        'external_user_id',
        'access_token',
        'refresh_token',
        'token_expires_at',
        'status',
    ];

    protected $casts = [
        'access_token' => 'encrypted',
        'refresh_token' => 'encrypted',
        'token_expires_at' => 'datetime',
    ];
    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function integration()
    {
        return $this->belongsTo(Integration::class);
    }
}
