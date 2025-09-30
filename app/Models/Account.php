<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use function Laravel\Prompts\password;

class Account extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'business_name',
        'email',
        'rfc',
        'account_type',
        'contact_name',
        'phone',
        'address',
        'account_status',
        'account_level',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

     public function parent(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'parent_account_id');
    }

   
    public function children(): HasMany
    {
        return $this->hasMany(Account::class, 'parent_account_id');
    }
}
