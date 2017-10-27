<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    use SoftDeletes;

    //creating deletes property to use with softdeletes
    protected $dates = ['deleted_at'];


//To allow MassAssignment bypassing the MassAssignmentException
    protected $fillable = [
      'title','body'
    ];

    //

    //Creating Inverse of ONE TO ONE relationships in Model class

    public function user(){

        return $this->belongsTo('App\User');

    }


}
