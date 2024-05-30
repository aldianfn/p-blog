<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasUlids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'picture',
        'bio',
        'facebook',
        'x',
        'instagram',
        'website',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $userRole = Role::where('role', 'User')->firstOrFail();
            $user->role_id = $userRole->id; // Set role_id to "user" role's ID
        });
    }

    public function hasAnyRole($role)
    {
        // Check if role is a string (assuming it represents a name)
        if (is_string($role)) {
            // Access the role model using the name and compare with user's role_id
            $roleId = Role::where('role', $role)->first()->id;
            if ($this->role_id === $roleId) {
                return true;
            }
        } else {
            // If not a string, assume it's a role object and compare IDs as before
            if ($this->role_id === $role->id) {
                return true;
            }
        }
        return false;
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
