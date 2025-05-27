<?php

namespace App\Http\Controllers;

use Str;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseQuestion;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CourseQuestionsImport;
use Dotenv\Exception\ValidationException;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class CourseQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        $students = $course->students()->orderBy('id', 'DESC')->get();
        
        return view('admin.questions.create', [
            'course'=> $course,
            'students'=> $students,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:5000',
            'answers' => 'required|array',
            'answers.*' => 'required|string',
            'correct_answer'=>'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', //validasi gambar
        ]);

        DB::beginTransaction();
        try{

            $imagePath = null;
            if($request->hasFile('image')){
                // Menyimpan gambar ke folder public/course_images
                $imagePath = $request->file('image')->store('course_images', 'public');
            }
            
            $question = $course->questions()->create([
                'question' => $request->question,
                'image' => $imagePath, //menyimpan gambar
            ]);

            foreach($request->answers as $index => $answerText){
                $isCorrect = ($request->correct_answer == $index);
                $question->answers()->create([
                    'answer' => $answerText,
                    'is_correct' => $isCorrect,
                ]);
            }


            DB::commit();

            return redirect()->route('dashboard.courses.show', $course->id);
        }
        catch(\Exception $e){
            DB::rollBack();
            $error = ValidationValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);

            throw $error;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseQuestion $courseQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseQuestion $courseQuestion)
    {
        $course = $courseQuestion->course;
        $students = $course->students()->orderBy('id', 'DESC')->get();
        return view('admin.questions.edit', [
            'courseQuestion' => $courseQuestion,
            'course' => $course,
            'students' => $students,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseQuestion $courseQuestion)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:5000',
            'answers' => 'required|array',
            'answers.*' => 'required|string',
            'correct_answer'=>'required|integer',
        ]);

        DB::beginTransaction();
        try{
            
            $courseQuestion->update([
                'question' => $request->question,
            ]);

            $courseQuestion->answers()->delete();

            foreach($request->answers as $index => $answerText){
                $isCorrect = ($request->correct_answer == $index);
                $courseQuestion->answers()->create([
                    'answer' => $answerText,
                    'is_correct' => $isCorrect,
                ]);
            }

            DB::commit();

            return redirect()->route('dashboard.courses.show', $courseQuestion->course_id);
        }
        catch(\Exception $e){
            DB::rollBack();
            $error = ValidationValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);

            throw $error;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseQuestion $courseQuestion)
    {
        try {
            $courseQuestion->delete();
            return redirect()->route('dashboard.course.show', $courseQuestion->course_id);
        }
        
        catch(\Exception $e){
            DB::rollBack();
            $error = ValidationValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);
    
            throw $error;
        }
    }

    public function import(Request $request, Course $course)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv,xls',
        ]);

        try {
            Excel::import(new CourseQuestionsImport($course->id), $request->file('file'));
            return redirect()->route('dashboard.courses.show', $course->id)
                            ->with('success', 'Soal berhasil diimport!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['file' => 'Gagal mengimpor soal: ' . $e->getMessage()]);
        }
    }
}
