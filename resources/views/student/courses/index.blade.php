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
    <section id="content" class="flex">
        <div id="sidebar" class="w-[270px] flex flex-col shrink-0 min-h-screen justify-between p-[30px] border-r border-[#EEEEEE] bg-[#FBFBFB]">
            <div class="w-full flex flex-col gap-[30px]">
                <a href="{{route('dashboard.learning.index')}}" class="flex items-center justify-center">
                    <img src="{{asset('/images/logo/logo_sekolah.png')}}" alt="logo">
                </a>
                <ul class="flex flex-col gap-3">
                    <li>
                        <h3 class="font-bold text-xs text-[#A5ABB2]">MENU</h3>
                    </li>
                    <li>
                        <a href="{{route('dashboard')}}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#047333]">
                            <div>
                                <img src="{{asset('/images/icons/home-hashtag.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 bg-[#01923F] transition-all duration-300 hover:bg-[#047333]">
                            <div>
                                <img src="{{asset('images/icons/note-favorite.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold text-white transition-all duration-300 hover:text-white">Ujian</p>
                        </a>
                    </li>
                </ul>
                <ul class="flex flex-col gap-3">
                    <li>
                        <h3 class="font-bold text-xs text-[#A5ABB2]">OTHERS</h3>
                    </li>
                    <li>
                        <a href="{{route('profile.edit')}}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#047333]">
                            <div>
                                <img src="{{asset('images/icons/setting-2.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Setting Profile</p>
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#047333]">
                                <div>
                                    <img src="{{asset('/images/icons/security-safe.svg')}}" alt="icon">
                                </div>
                                <p class="font-semibold transition-all duration-300 hover:text-white">Logout</p>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div id="menu-content" class="flex flex-col w-full pb-[30px]">
            <div class="nav flex justify-between p-5 border-b border-[#EEEEEE]">
                <form class="search flex items-center w-[400px] h-[52px] p-[10px_16px] rounded-full border border-[#EEEEEE]">
                    <input type="text" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" placeholder="Cari" name="search">
                    <button type="submit" class="ml-[10px] w-8 h-8 flex items-center justify-center">
                        <img src="{{asset('images/icons/icon-search.svg')}}" alt="icon">
                    </button>
                </form>
                <div class="flex items-center gap-[30px]">
                    <div class="flex gap-[14px]">
                        <a href="" class="w-[46px] h-[46px] flex shrink-0 items-center justify-center rounded-full border border-[#EEEEEE]">
                            <img src="{{asset('images/icons/notification.svg')}}" alt="icon">
                        </a>
                    </div>
                    <div class="h-[46px] w-[1px] flex shrink-0 border border-[#EEEEEE]"></div>
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
            <div class="flex flex-col px-5 mt-5">
                <div class="w-full flex justify-between items-center">
                    <div class="flex flex-col gap-1">
                        <p class="font-extrabold text-[30px] leading-[45px]">Ujian Saya</p>
                        <p class="text-[#7F8190]">Selesaikan ujian yang sudah diberikan oleh guru!</p>
                    </div>
                </div>
            </div>
            <div class="course-list-container flex flex-col px-5 mt-[30px] gap-[30px]">
                <div class="course-list-header flex flex-nowrap justify-between pb-4 pr-10 border-b border-[#EEEEEE]">
                    <div class="flex shrink-0 w-[300px]">
                        <p class="text-[#7F8190]">Mata Pelajaran</p>
                    </div>
                    <div class="flex justify-center shrink-0 w-[150px]">
                        <p class="text-[#7F8190]">Tanggal Buat</p>
                    </div>
                    <div class="flex justify-center shrink-0 w-[170px]">
                        <p class="text-[#7F8190]">Kelas</p>
                    </div>
                    <div class="flex justify-center shrink-0 w-[120px]">
                        <p class="text-[#7F8190]">Action</p>
                    </div>
                </div>

                @forelse($my_courses as $course)
                <div class="list-items flex flex-nowrap justify-between pr-10">
                    <div class="flex shrink-0 w-[300px]">
                        <div class="flex items-center gap-4">
                            <!-- <div class="w-16 h-16 flex shrink-0 overflow-hidden rounded-full">
                                <img src="{{Storage::url($course->cover)}}" class="object-cover" alt="thumbnail">
                            </div> -->
                            <div class="flex flex-col gap-[2px]">
                                <p class="font-bold text-lg">{{ $course->name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex shrink-0 w-[150px] items-center justify-center">
                        <p class="font-semibold">{{ $course->created_at->format('d M Y') }}</p>
                    </div>
                    <div class="flex shrink-0 w-[170px] items-center justify-center">
                        <p class="p-[8px_16px] rounded-full bg-[#D5EFFE] font-bold text-sm text-[#066DFE]">{{ $course->category->name }}</p>
                    </div>
                    <div class="flex shrink-0 w-[120px] items-center">
                        @if($course->nextQuestionId !== null)
                        <a href="{{ route('dashboard.learning.course', [
                        'course'=>$course->id, 'question'=>$course->nextQuestionId]) }}" class="w-full h-[41px] p-[10px_20px] bg-[#01923F] rounded-full font-bold text-sm text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D] text-center">
                        Mulai</a>
                        @else
                        <a href="{{ route('dashboard.learning.rapport.course', $course) }}" class="w-full h-[41px] p-[10px_20px] bg-indigo-950 rounded-full font-bold text-sm text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D] text-center">
                        Lihat Nilai</a>
                        @endif
                    </div>
                </div>

                @empty
                <p>Belum ada kelas yang diberikan</p>
                @endforelse
            </div>
        </div>
    </section>

</body>
</html>