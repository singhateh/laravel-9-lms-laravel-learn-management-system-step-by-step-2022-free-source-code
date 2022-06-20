<?php

namespace App\Models;

use App\Traits\Slugable;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasPermissions;
use Creativeorange\Gravatar\Facades\Gravatar;
use Google\Service\Classroom\Resource\CoursesStudents;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App
 *
 * @property string $name
 * @property string media_token
 * @property string email
 */
class User extends Authenticatable
{
    use Notifiable, HasApiTokens, HasRoles, HasFactory, Slugable;

    protected $appends = ['avatar'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'status', 'image', 'code', 'slug'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function getAvatarAttribute()
    {
        return Gravatar::get($this->attributes['email']);
    }

    public function userCourses(): HasMany
    {
        return $this->hasMany(Course::class, 'teacher_id', 'id');
    }


    public function courses(): HasMany
    {
        return $this->hasMany(CourseUser::class);
    }

    public function assignRoles()
    {
        foreach ($this->getRoleNames() as $role) {
            return $role;
        }
    }

    public function singleTeacherLink()
    {
        return Route('teachers.single', $this->slug);
    }

    public function scopeStudent()
    {
        return User::Role('user');
    }

    public function scopeTeacher()
    {
        return User::Role('teacher');
    }

    public function scopeAdmin()
    {
        return User::Role('admin');
    }

    public function scopeAccountant()
    {
        return User::Role('accountant');
    }

    public function scopeStaff()
    {
        return User::Role('staff');
    }
}
