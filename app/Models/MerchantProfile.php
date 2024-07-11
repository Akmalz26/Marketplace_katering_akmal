<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'company_name', 'address', 'contact', 'description',
    ];

    /**
     * Get the user that owns the merchant profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the menus for the merchant profile.
     */
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
