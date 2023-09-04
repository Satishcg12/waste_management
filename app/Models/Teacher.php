<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Teacher extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard = 'teacher';

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

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function students()
    {
        return User::where('grade_id', $this->grade_id)->get();
    }
    public function totalNumberOfStudents()
    {
        return $this->students()->count();
    }
    public function totalNumberOfSubmissions()
    {
        return $this->submission()->count();
    }
    public function submission()
    {
        return $this->students()->map(function ($student) {
            return $student->submission;
        })->flatten();
    }
    public function numberOfVideos()
    {
        return $this->submission()->where('attachment_type', 'video')->count();
    }
    public function numberOfImages()
    {
        return $this->submission()->where('attachment_type', 'image')->count();
    }


}
