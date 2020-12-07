<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Courses;

use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    public function addCourse(Request $request)
    {
        
        $courses = new Courses();
        $courses->type = $request->type;
        $courses->curso = $request->curso;
        $courses->institute = $request->institute;
        $courses->year = $request->year;
        $courses->user_id = auth()->user()->id;
        $courses->save();

        return redirect()->route('perfil');
    }
    
    public function coursesList()
    {   
        $data['curso'] = DB::table('courses')
                                ->where('user_id', auth()->user()->id)
                                ->paginate(10);

        return view('admin.dashboard', $data);
    }
    public function delete($id)
    {
        DB::table('courses')->where('id',$id)->delete();
            return redirect()->route('perfil');;
    }
}
