<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Course_Videos extends Model
{
    use HasFactory;
    protected $table="course_videos";
    protected $fillable = ['id','name', 'course_id','description', 'thumbnail','file','status','created_at','updated_at','deleted_at'];


    public function course() : HasOne{
    	return $this->hasOne(Courses::class, 'id', 'course_id');
    }
}
