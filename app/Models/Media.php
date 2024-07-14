<?php

namespace App\Models;

use App\Helpers\MediaHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'media_type', 'alt', 'file_name', 'file_type', 'file_size', 'label',
    ];

    const ADMIN = 1;
    const USER = 2;
    const COURSES = 3;
    const COURSE_VIDEO = 4;
    const COURSE_IMAGE = 5;
    const RANDOM = 6;
    const BRAND = 7;
    const SITECONTENT = 8;
    const CATEGORIES = 9;
    const SLIDER = 10;
    const LOCATION = 11;

    public static $header = [
        self::ADMIN => 'Admin',
        self::USER => 'User',
        self::COURSES => 'Courses',
        self::COURSE_VIDEO => 'Course Videos',
        self::COURSE_IMAGE => 'Course Image',
        self::RANDOM => 'Mix',
        self::BRAND => 'Brands',
        self::SITECONTENT => 'Site Pages',
        self::CATEGORIES => 'Categories',
        self::SLIDER => 'Slider',
        self::LOCATION => 'Locations',
    ];

    public static $label = [
        self::ADMIN => 'admin',
        self::USER => 'user',
        self::COURSES => 'courses',
        self::COURSE_VIDEO => 'course-videos',
        self::COURSE_IMAGE => 'course-image',
        self::RANDOM => 'mix',
        self::BRAND => 'brands',
        self::SITECONTENT => 'site-pages',
        self::CATEGORIES => 'categories',
        self::SLIDER => 'slider',
        self::LOCATION => 'locations',
    ];
    
    public static $directory = [
        self::ADMIN => '/uploads/users/',
        self::USER => '/uploads/users/',
        self::COURSES => '/uploads/courses/',
        self::COURSE_VIDEO => '/uploads/course_videos/',
        self::COURSE_IMAGE => '/uploads/courses/',
        self::CATEGORIES => '/uploads/categories/',
        self::RANDOM => '/uploads/services/',
        self::SLIDER => '/uploads/slider/',
        self::BRAND => '/uploads/services/',
        self::LOCATION => '/uploads/locations/',
    ];
    
    public static $folder_name = [
        self::ADMIN => 'users',
        self::USER => 'users',
        self::COURSES => 'courses',
        self::COURSE_VIDEO => 'course_videos',
        self::COURSE_IMAGE => 'courses',
        self::CATEGORIES => 'categories',
        self::RANDOM => 'services',
        self::SLIDER => 'slider',
        self::BRAND => 'services',
        self::LOCATION => 'locations',
    ];

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            $path = ($model->media_type) ? public_path() . self::$directory[$model->media_type] : null;
            if ($model->file_name) {
                MediaHelper::removeImage($path . $model->file_name);
            }
        });
    }

    public static $file_path;
    public function getFileNameAttribute($file_name)
    {
        if (self::$file_path) {
            return asset(self::$file_path . $file_name);
        }
        return $file_name;
    }
}
