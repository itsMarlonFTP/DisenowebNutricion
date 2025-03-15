<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
class User extends Model
{
    
    protected $perPage = 20;
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['userID', 'name', 'email', 'email_verified_at','allergies', 'goals', 'password_hash', 'age', 'gender', 'weight', 'height', 'activity_level', 'restrictions'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activity7_admins()
    {
        return $this->hasMany(\App\Models\Activity7.admin::class, 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activity7_students()
    {
        return $this->hasMany(\App\Models\Activity7.student::class, 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activity7_teachers()
    {
        return $this->hasMany(\App\Models\Activity7.teacher::class, 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dise単owebnutricion_fitnessIntegrations()
    {
        return $this->hasMany(\App\Models\Dise単owebnutricion.fitnessIntegration::class, 'userID', 'userID');
    }
    protected $casts = [
        'email_verified_at' => 'datetime', 
    ];
    
}