<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function submission()
    {
        return $this->hasMany(Submission::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function hasExceededSubmissionLimit ()
    {
        // if user has already submitted 5 time within 24 hours
        //check time of last upload and compare to current time
        $lastUpload = $this->last_upload;
        $now = now();
        $diff = $now->diffInHours($lastUpload);
        // return $diff;
        $count = $this->upload_count;
        if ($diff < 24 && $count >= 5) {
            return true;
        }
        return false;
    }

    public function hasAgreedToTermsAndConditions ()
    {
        if ($this->TermsAndConditions == true) {
            return true;
        }
        return false;
    }


}
