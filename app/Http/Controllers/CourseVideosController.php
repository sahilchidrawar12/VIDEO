<?php

namespace App\Http\Controllers;

use App\Models\Course_Videos;
use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;

class CourseVideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course_videos = Course_Videos::all();
        return view("course_videos.index", compact("course_videos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Courses::select('id','name')->where('status',1)->get();
        return view("course_videos.create", compact("courses"));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                "name"=> "required",
                "description"=> "required",
                "thumbnail"=>'nullable|max:2048',
                "file"=>'nullable',
            ]);
            $destinationPath = 'uploads/course_videos/';
            $thumbnail = $request->file('thumbnail');
            if ($thumbnail) {
                $ext = strtolower($thumbnail->getClientOriginalExtension());
                $thumbnail_file = time() . 'tr1.' . $ext;
                $thumbnail->move($destinationPath, $thumbnail_file);
            }
            $video_file = $request->file('file');
            if ($video_file) {
                $ext = strtolower($video_file->getClientOriginalExtension());
                $video = time() . 'tr1.' . $ext;
                $video_file->move($destinationPath, $video);
            }
            // echo $video;
            $data = [
                'course_id' => $request->course_id,
                'name' => $request->name,
                'description' => $request->description,
                'thumbnail' => $thumbnail_file,
                'file' => $video,
            ];
            // dd($data);
            Course_Videos::create($data);            
            return redirect()->route('course_videos.index')->with('success','Course Videos added sucesfully');
        } catch (\Throwable $th) {
            //throw $th;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course_Videos  $Course_Videos
     * @return \Illuminate\Http\Response
     */
    public function show(Course_Videos $Course_Videos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course_Videos  $Course_Videos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $course_video_data = Course_Videos::find($id);
        // echo "<pre>";
        // print_r($course_video_data);
        // die;
        $courses = Courses::where('status',1)->get();
        return view('course_videos.edit', compact('course_video_data','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course_Videos  $Course_Videos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course_Videos $Course_Videos)
    {
        try {
            $request->validate([
                "name"=> "required",
                "description"=> "required",
                "thumbnail"=>'nullable|max:2048',
                "file"=>'nullable',
            ]);
            $destinationPath = 'uploads/course_videos/';
            $thumbnail = $request->file('thumbnail');
            if ($thumbnail) {
                $ext = strtolower($thumbnail->getClientOriginalExtension());
                $thumbnail_file = time() . 'tr1.' . $ext;
                $thumbnail->move($destinationPath, $thumbnail_file);
            }
            $video_file = $request->file('file');
            if ($video_file) {
                $ext = strtolower($video_file->getClientOriginalExtension());
                $video = time() . 'tr1.' . $ext;
                $video_file->move($destinationPath, $video);
            }
            // echo $video;
            $data = [
                'course_id' => $request->course_id,
                'name' => $request->name,
                'description' => $request->description,
                'thumbnail' => $thumbnail_file,
                'file' => $video,
            ];

            Course_Videos::where('id',$request->id)->update($data);            
            return redirect()->route('course_videos.index')->with('success','Course Videos updated sucesfully');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course_Videos  $Course_Videos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course_Videos::find($id);
        $course->delete();
        return redirect()->route('course_videos.index')->with('success','Course Video deleted sucesfully');

    }
}
