<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Course;
use App\Models\CourseStudent;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    protected $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function model(array $row)
    {
        // Pastikan kolom 'email' ada di file Excel
        if (isset($row['email'])) {
            $user = User::where('email', $row['email'])->first();
            
            /// Jika user ditemukan, tambahkan ke kursus
            if ($user) {
                // Menggunakan attach untuk menambahkan siswa ke kursus
                $this->course->students()->attach($user->id);
            }
        }
    }
}
