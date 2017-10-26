<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\App;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
|--------------------------------------------------------------------------
| ONE TO ONE RELATIONSHIPS
|--------------------------------------------------------------------------

*/
    //Defining relationship between the Users table and Post table
    public function Post(){


        return $this->hasOne('App\Post'); //this will go to model App\Post and look for 'user_id' by default

        //to specify the column related above, do as below: adding second parameter to it

//        return $this->hasOne('App\Post', 'example_column_in_the_table');
    }
}
