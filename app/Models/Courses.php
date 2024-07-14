<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courses extends Model
{
    use HasFactory;
    use SoftDeletes;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    public static $status_type = [
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_INACTIVE => 'In Active',
    ];
    protected $table="courses";
    protected $fillable = ['id','name', 'description', 'thumbnail','status','created_at','updated_at','deleted_at'];

    public function media()
    {
        return $this->hasOne(Media::class, 'id', 'thumbnail');
    }

    public static $get_media_url = false;
    public static $get_media_name = false;
    public function getImageAttribute($image){
        if($image){
            $media = Media::select()->whereId($image)->first();
            if($media){
                if(self::$get_media_url){
                    return asset(Media::$directory[$media->media_type].$media->file_name);
                }else if(self::$get_media_name){
                    return $media->file_name;
                }
            }
        }
        return $image;
    }

}
