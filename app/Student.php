<?php
/**
 * Created by PhpStorm.
 * User: Antonio
 * Date: 07/05/2018
 * Time: 15:11
 */

namespace App;
use Illuminate\Database\Eloquent\Model;
class Student extends Model
{
    protected $fillable = [
        'name',
    ];
    public static function boot()
    {
        parent::boot();
        static::saving(function($student) {
            $student->saves = $student->saves + 1;
        });
    }
}