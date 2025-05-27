<!-- resources/views/admin/questions/import.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">Import Pertanyaan</h2>

    <!-- Form untuk meng-upload file CSV/Excel -->
    <form action="{{ route('dashboard.course.import', $course->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="file" class="block text-lg font-semibold">Pilih File CSV/Excel:</label>
            <input type="file" name="file" id="file" class="mt-2 p-2 w-full border rounded-md" accept=".csv,.xlsx,.xls" required>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-md">Import</button>
        </div>
    </form>
</div>
@endsection
