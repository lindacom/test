<?php
namespace App;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
class User extends Model implements Authenticatable
{


protected $fillable = [
    'first_name',
    'last_name',
    'email',
];


}
