<?php

namespace App\Imports;

use App\Models\CourseAnswer;
use App\Models\CourseQuestion;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CourseQuestionsImport implements ToCollection
{
    protected $courseId;

    public function __construct($courseId)
    {
        $this->courseId = $courseId;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            if ($index === 0) continue; // skip header

            $question = CourseQuestion::create([
                'course_id' => $this->courseId,
                'question' => $row[0],
                'image' => null, // atau logika upload jika ada kolom gambar
            ]);

            for ($i = 1; $i <= 4; $i++) {
                CourseAnswer::create([
                    'course_question_id' => $question->id,
                    'answer' => $row[$i],
                    'is_correct' => ($row[5] == $i), // asumsi kolom ke-5 adalah nomor jawaban benar (1-4)
                ]);
            }
        }
    }
}