<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAddress extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'street',
        'street_2',
        'region',
        'city',
        'state',
        'country',
        'zip',
    ];

    // User
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
