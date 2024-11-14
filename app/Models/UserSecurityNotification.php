<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSecurityNotification extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guarded = [];

    /**
     * Mark the notification as viewed.
     *
     * @return void
     */
    public function markAsViewed()
    {
        $this->is_viewed = true;
        $this->save();
    }


    public function isNotViewed(Builder $builder) {
        return $builder->where('is_viewed', false);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
