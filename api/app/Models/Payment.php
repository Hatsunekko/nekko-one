<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Payment extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'payments';

    protected $fillable = [
        'ticket_id',
        'company_id',
        'company_integration_id',
        'amount',
        'external_id',
        'qr_code',
        'qr_code_base64',
        'status',
        'paid_at',
        'expires_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'paid_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function companyIntegration()
    {
        return $this->belongsTo(CompanyIntegration::class);
    }

    public function isPaid(): bool
    {
        return $this->status === 'paid';
    }
}