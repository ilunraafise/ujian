<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseStudent;
use App\Models\StudentAnswer;
use App\Imports\StudentsImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\ValidationException;

class CourseStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Course $course)
    {
        $students = $course->students()->orderBy('id', 'DESC')->get();
        $questions = $course->questions()->orderBy('id', 'DESC')->get();
        $totalQuestions = $questions->count();

        // Perulangan untuk setiap siswa
        foreach($students as $student) {
            // Ambil semua jawaban siswa untuk kursus ini
            $studentAnswer = StudentAnswer::whereHas('question', function($query) use ($course) {
                $query->where('course_id', $course->id);
            })->where('user_id', $student->id)->get();

            // Hitung jumlah jawaban yang benar dan total jawaban
            $answersCount = $studentAnswer->count();
            $correctAnswersCount = $studentAnswer->where('answer', 'correct')->count();

            // Tentukan status berdasarkan jumlah jawaban benar
            if($answersCount == 0){
                $student->status = 'Not Started';
                $student->score = 0; // Jika belum mulai, skor 0
            } elseif($correctAnswersCount < $totalQuestions) {
                $student->status = 'Not Passed';
                $student->score = $correctAnswersCount; // Skor berdasarkan jawaban benar
            } elseif($correctAnswersCount == $totalQuestions) {
                $student->status = 'Passed';
                $student->score = $correctAnswersCount; // Skor berdasarkan jawaban benar
            }

            // Tambahkan nilai untuk siswa
            $student->score_percentage = ($correctAnswersCount / $totalQuestions) * 100; // Nilai dalam bentuk persen
        }

        return view('admin.students.index', [
            'course' => $course,
            'questions' => $questions,
            'students' => $students,
            'totalQuestions' => $totalQuestions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        $students = $course->students()->orderBy('id', 'DESC')->get();
        return view('admin.students.add_student', [
            'course' => $course,
            'students' => $students,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
    {
        $request->validate([
            'email' => 'nullable|string',
            'file' => 'nullable|mimes:xlsx,csv'
        ]);

        $user = User::where('email', $request->email)->first();

            if ($request->hasFile('file')) {
            // Jika file Excel diupload
            $path = $request->file('file')->store('temp'); // Menyimpan file sementara
            $data = Excel::import(new StudentsImport($course), storage_path('app/' . $path)); // Import data dari Excel
            
            // Hapus file setelah proses selesai
            unlink(storage_path('app/' . $path));
            
            return redirect()->route('dashboard.course.course_students.index', $course)
                            ->with('success', 'Siswa berhasil diimpor!');
        } else {
            // Jika hanya satu siswa yang ditambahkan
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                throw ValidationException::withMessages([
                    'system_error' => ['Email student tidak tersedia!'],
                ]);
            }

            $isEnrolled = $course->students()->where('user_id', $user->id)->exists();
            if ($isEnrolled) {
                throw ValidationException::withMessages([
                    'system_error' => ['Student sudah memiliki hak akses kelas'],
                ]);
            }

            DB::beginTransaction();
            try {
                $course->students()->attach($user->id);
                DB::commit();
                return redirect()->route('dashboard.course.course_students.index', $course)
                                ->with('success', 'Siswa berhasil ditambahkan');
            } catch (\Exception $e) {
                DB::rollBack();
                throw ValidationException::withMessages([
                    'system_error' => ['System error!' . $e->getMessage()],
                ]);
            }
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(CourseStudent $courseStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseStudent $courseStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseStudent $courseStudent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseStudent $courseStudent)
    {
        //
    }

}
