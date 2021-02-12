<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    function createUser($data){
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->password = Hash::make($data['password']);

        if ($this->userExists($data['email'])){
            return [
                'message'=>'User with email already exists!',
                'error'=>true
            ];
        }

        $this->save();

        return [
            'name'=>$this->name,
            'email'=>$this->email
        ];
    }

    function userExists($email){
        $query = (new self)->newQuery();
        $query = $query->where('email',$email);
        return $query->exists();
    }


    static function getUserIdFromEmail($email){
     $query = (new User)->newQuery();
     $query = $query->where('email',$email);
     return $query->first()->id;
    }

}
