<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'description', 'price', 'image',
    ];

    /**
     * Get the user that owns the menu.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the orders that contain the menu.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
