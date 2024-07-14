<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Commonfunction;
class CoursesController extends Controller
{
    use Commonfunction;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Courses::all();
        // echo"<pre>";
        // print_r($courses);
        // die;
        return view("courses.index", compact("courses"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("courses.create");
        
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
            ]);

            $destinationPath = 'uploads/courses/';
            $thumbnail = $request->file('thumbnail');
            if ($thumbnail) {
                $ext = strtolower($thumbnail->getClientOriginalExtension());
                $file = time() . 'tr1.' . $ext;
                $thumbnail->move($destinationPath, $file);
            }
            
            $data = [
                'name' => $request->name,
                'description' => $request->description,
                'thumbnail' => $file
            ];
            // dd($data);
            Courses::create($data);            
            return redirect()->route('course.index')->with('success','Course added sucesfully');
        } catch (\Throwable $th) {
            //throw $th;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show(Courses $courses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $course_data = Courses::find($id);
        return view('courses.edit', compact('course_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courses $courses)
    {
        try {
            
            $destinationPath = 'uploads/courses/';
            $thumbnail = $request->file('thumbnail');
            if ($thumbnail) {
                $ext = strtolower($thumbnail->getClientOriginalExtension());
                $file = time() . 'tr1.' . $ext;
                $thumbnail->move($destinationPath, $file);
            }
            $data = [
                'name' => $request->name,
                'description' => $request->description,
                'thumbnail' => $file
            ];
            Courses::where('id',$request->id)->update($data);            
            return redirect()->route('course.index')->with('success','Course updated sucesfully');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Courses::find($id);
        if (!empty($course)) {            
            $course->delete();
        }

        return redirect()->route('course.index')->with('success','Course deleted sucesfully');

    }
}