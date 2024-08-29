<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'prefixname',
        'firstname',
        'middlename',
        'lastname',
        'suffixname',
        'username',
        'email',
        'password',
        'photo',
        'type',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute(): string
    {
        if ($this->photo) {
            return Storage::disk('public')->url($this->photo);
        }

        $defaultImage = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAAC...';
        return $defaultImage;
    }

    public function getFullnameAttribute(): string
    {
        $fullName = $this->firstname;
        if ($this->middleinitial) {
            $fullName .= ' ' . $this->middleinitial;
        }
        $fullName .= ' ' . $this->lastname;
        return $fullName;
    }

    public function getMiddleinitialAttribute(): string
    {
        return $this->middlename ? strtoupper(substr($this->middlename, 0, 1)) . '.' : '';
    }
}
