<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

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

    static public function getRecord() {
        $return = self::select('users.*')
                    ->orderBy('id', 'desc');
                    // Search Start
                    if (!empty(request('id'))) {
                        $return = $return->where('users.id', '=', request('id'));
                    }
                    if (!empty(request('name'))) {
                        $return = $return->where('users.name', 'like', '%'. request('name') .'%');
                    }
                    if (!empty(request('username'))) {
                        $return = $return->where('users.username', 'like', '%'. request('username') .'%');
                    }
                    if (!empty(request('email'))) {
                        $return = $return->where('users.email', 'like', '%'. request('email') .'%');
                    }
                    if (!empty(request('phone'))) {
                        $return = $return->where('users.phone', 'like', '%'. request('phone') .'%');
                    }
                    if (!empty(request('website'))) {
                        $return = $return->where('users.website', 'like', '%'. request('website') .'%');
                    }
                    if (!empty(request('role'))) {
                        $return = $return->where('users.role', 'like', '%'. request('role') .'%');
                    }
                    if (!empty(request('status'))) {
                        $return = $return->where('users.status', '=', request('status'));
                    }
                    // Search End
                    $return = $return->paginate(10);
                    return $return;
    }
}
