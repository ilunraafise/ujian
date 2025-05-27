<?php

namespace App\Exports;

use App\Models\User;
use App\Models\StudentAnswer;
use App\Models\Course;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentScoresExport implements FromCollection, WithHeadings
{
    protected $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function collection()
    {
        $students = $this->course->students()->get();
        $questionsCount = $this->course->questions()->count();

        return $students->map(function ($student) use ($questionsCount) {
            $answers = StudentAnswer::whereHas('question', function ($query) {
                $query->where('course_id', $this->course->id);
            })->where('user_id', $student->id)->get();

            $correctCount = $answers->where('answer', 'correct')->count();
            $scorePercentage = $questionsCount > 0 ? ($correctCount / $questionsCount) * 100 : 0;

            return [
                'name' => $student->name,
                'email' => $student->email,
                'total_questions' => $questionsCount,
                'correct_answers' => $correctCount,
                'score_percentage' => round($scorePercentage, 2),
            ];
        });
    }

    public function headings(): array
    {
        return ['Nama', 'Email', 'Total Soal', 'Jawaban Benar', 'Nilai (%)'];
    }
}

