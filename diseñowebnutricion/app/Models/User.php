<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 *
 * @property $userID
 * @property $name
 * @property $email
 * @property $allergies
 * @property $goals
 * @property $password_hash
 * @property $age
 * @property $gender
 * @property $weight
 * @property $height
 * @property $activity_level
 * @property $restrictions
 * @property $created_at
 * @property $updated_at
 *
 * @property Activity7.admin[] $activity7.admins
 * @property Activity7.student[] $activity7.students
 * @property Activity7.teacher[] $activity7.teachers
 * @property Dise単owebnutricion.fitnessIntegration[] $dise単owebnutricion.fitnessIntegrations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'userID';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'allergies',
        'goals',
        'password',
        'age',
        'gender',
        'weight',
        'height',
        'activity_level',
        'restrictions',
        'role'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'allergies' => 'string',
        'goals' => 'string',
        'restrictions' => 'string',
        'weight' => 'float',
        'height' => 'float',
        'age' => 'integer',
        'password' => 'hashed',
        'role' => 'string'
    ];

    protected $attributes = [
        'allergies' => '',
        'goals' => '',
        'restrictions' => '',
        'role' => 'user'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function admins()
    {
        return $this->hasMany(Admin::class, 'user_id', 'userID');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany(Student::class, 'user_id', 'userID');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teachers()
    {
        return $this->hasMany(Teacher::class, 'user_id', 'userID');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fitnessIntegrations()
    {
        return $this->hasMany(FitnessIntegration::class, 'userID', 'userID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recipes()
    {
        return $this->hasMany(Recipe::class, 'userID', 'userID');
    }
}