<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="{{ asset('css/output.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
</head>
<body class="font-poppins text-[#0A090B]">
    <section id="content">
        <div class="border-b border-[#EEEEEE]">
            <div class="nav flex items-center w-full h-[92px] max-w-[1280px] mx-auto justify-between p-5">
                <div class="flex items-center gap-4">
                    <div class="flex flex-col gap-[2px]">
                        <p class="font-bold text-lg">{{ $course->name }}</p>
                        <p class="font-semibold">Kelas {{$course->category->name}}</p>
                    </div>
                </div>
                <div class="flex gap-3 items-center">
                    <div class="flex flex-col text-right">
                        <p class="font-semibold">{{ Auth::user()->name }}</p>
                    </div>
                    <div class="w-[46px] h-[46px]">
                        <img src="{{asset('images/icons/icon-profile.svg')}}" alt="photo">
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('dashboard.learning.course.answer.store', ['course' => $course->id,
        'question'=>$question->id]) }}" method="POST" class="learning flex flex-col gap-[50px] items-center mt-[50px] w-full pb-[30px]">
            @csrf
            <h1 class="w-[821px] font-extrabold text-[46px] leading-[69px] text-center">
                {{ $question->question }}
            </h1>

            <!-- Menampilkan gambar jika ada -->
            @if($question->image)
                <div class="w-full flex justify-center mb-[30px]">
                    <img src="{{ asset('storage/' . $question->image) }}" alt="Image for question" class="max-w-[600px] h-auto" />
                </div>
            @endif

            <div class="flex flex-col gap-[30px] max-w-[750px] w-full">
                @foreach($question->answers as $answer)
                    <label for="{{ $answer->id }}" class="group flex items-center justify-between rounded-full w-full border border-[#EEEEEE] p-[18px_20px] gap-[14px] transition-all duration-300 has-[:checked]:border-2 has-[:checked]:border-[#0A090B]">
                        <div class="flex items-center gap-[14px]">
                            <img src="{{asset('images/icons/arrow-circle-right.svg')}}" alt="icon">
                            <span class="font-semibold text-xl leading-[30px]">{{ $answer->answer }}</span>
                        </div>
                        <div class="hidden group-has-[:checked]:block">
                            <img src="{{asset('images/icons/tick-circle.svg')}}" alt="icon">
                        </div>
                        <input type="radio" name="answer_id" id="{{ $answer->id }}" value="{{ $answer->id }}" class="hidden">
                    </label>
                @endforeach

            </div>
            <button type="submit" class="w-fit p-[14px_40px] bg-[#01923F] rounded-full font-bold text-sm text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D] text-center align-middle">Simpan & Lanjut Pertanyaan</button>
        </form>
    </section>

</body>
</html>