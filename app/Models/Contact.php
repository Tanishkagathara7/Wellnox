<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope for status.
     */
    public function scopeStatus($query, $status)
    {
        if (! empty($status)) {
            return $query->where('status', $status);
        }

        return $query;
    }

    /**
     * Scope for searching.
     */
    public function scopeSearch($query, $term)
    {
        if (! empty($term)) {
            return $query->where(function ($q) use ($term) {
                $q->where('name', 'like', "%{$term}%")
                    ->orWhere('email', 'like', "%{$term}%")
                    ->orWhere('phone', 'like', "%{$term}%")
                    ->orWhere('subject', 'like', "%{$term}%")
                    ->orWhere('message', 'like', "%{$term}%");
            });
        }

        return $query;
    }
}
