<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
</head>

<body class="font-poppins text-[#0A090B]">
    <section id="content" class="flex">
        <div id="sidebar"
            class="w-[270px] flex flex-col shrink-0 min-h-screen justify-between p-[30px] border-r border-[#EEEEEE] bg-[#FBFBFB]">
            <div class="w-full flex flex-col gap-[30px]">
                <a href="{{route('dashboard.courses.index')}}" class="flex items-center justify-center">
                    <img src="{{asset('/images/logo/logo_sekolah.png')}}" alt="logo">
                </a>
                <ul class="flex flex-col gap-3">
                    <li>
                        <h3 class="font-bold text-xs text-[#A5ABB2]">MENU</h3>
                    </li>
                    <li>
                        <a href="" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#047333]">
                            <div>
                                <img src="{{asset('/images/icons/home-hashtag.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Overview</p>
                        </a>
                    </li>
                    <li>
                        <a href="" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 bg-[#01923F] transition-all duration-300 hover:bg-[#047333]">
                            <div>
                                <img src="{{asset('/images/icons/note-favorite.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold text-white transition-all duration-300 hover:text-white">Ujian</p>
                        </a>
                    </li>
                    <li>
                        <a href="" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#047333]">
                            <div>
                                <img src="{{asset('/images/icons/profile-2user.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Siswa</p>
                        </a>
                    </li>
                </ul>
                <ul class="flex flex-col gap-3">
                    <li>
                        <h3 class="font-bold text-xs text-[#A5ABB2]">OTHERS</h3>
                    </li>
                    <li>
                        <a href="" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#047333]">
                            <div>
                                <img src="{{asset('images/icons/setting-2.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Settings</p>
                        </a>
                    </li>
                    <li>
                        <a href="signin.html" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#047333]">
                            <div>
                                <img src="{{asset('images/icons/security-safe.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="menu-content" class="flex flex-col w-full pb-[30px]">
            <div class="nav flex justify-between p-5 border-b border-[#EEEEEE]">
                <form
                    class="search flex items-center w-[400px] h-[52px] p-[10px_16px] rounded-full border border-[#EEEEEE]">
                    <input type="text"
                        class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none"
                        placeholder="Cari" name="search">
                    <button type="submit" class="ml-[10px] w-8 h-8 flex items-center justify-center">
                        <img src="{{asset('images/icons/icon-search.svg')}}" alt="icon">
                    </button>
                </form>
                <div class="flex items-center gap-[30px]">
                    <div class="flex gap-[14px]">
                        <a href=""
                            class="w-[46px] h-[46px] flex shrink-0 items-center justify-center rounded-full border border-[#EEEEEE]">
                            <img src="{{asset('/images/icons/notification.svg')}}" alt="icon">
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
            <div class="flex flex-col gap-10 px-5 mt-5">
                <div class="breadcrumb flex items-center gap-[30px]">
                    <a href="{{route('dashboard.courses.index')}}" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Home</a>
                    <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
                    <a href="{{ route('dashboard.courses.show', $course) }}" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Manage Ujian</a>
                    <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
                    <a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Tambah Siswa</a>
                </div>
            </div>
            <div class="header ml-[70px] pr-[70px] w-[940px] flex items-center justify-between mt-10">
                <div class="flex gap-6 items-center">
                    <div class="flex flex-col gap-5">
                        <h1 class="font-extrabold text-[30px] leading-[45px]">{{ $course->name }}</h1>
                        <div class="flex items-center gap-5">
                            <div class="flex gap-[10px] items-center">
                                <div class="w-6 h-6 flex shrink-0">
                                    <img src="{{asset('/images/icons/calendar-add.svg')}}" alt="icon">
                                </div>
                                <p class="font-semibold">{{ $course->created_at->format('d M Y') }}</p>
                            </div>
                            <div class="flex gap-[10px] items-center">
                                <div class="w-6 h-6 flex shrink-0">
                                    <img src="{{asset('/images/icons/profile-2user-outline.svg')}}" alt="icon">
                                </div>
                                <p class="font-semibold">{{count($students)}} students</p>
                            </div>
                            <div class="flex gap-[10px] items-center">
                                <div class="w-6 h-6 flex shrink-0">
                                    <img src="{{asset('images/icons/profile-2user-outline.svg')}}" alt="icon">
                                </div>
                                <p class="font-semibold">Kelas {{$course->category->name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-[70px] mt-6">
                <form action="{{ route('dashboard.course.course_students.store', $course) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-2">
                    @csrf

                    <label for="file" class="cursor-pointer text-sm px-3 py-1.5 w-fit border border-[#01923F] text-[#01923F] rounded-md hover:bg-[#01923F] hover:text-white transition">
                        Pilih File
                        <input id="file" type="file" name="file" accept=".xlsx,.xls,.csv" class="hidden" onchange="updateFileName(this)" required>
                    </label>

                    <!-- Nama file akan muncul di sini -->
                    <span id="file-name" class="text-sm text-gray-600 italic"></span>

                    <button type="submit" class="text-sm px-3 py-1.5 w-fit bg-[#01923F] text-white rounded-md hover:bg-[#047333] transition">
                        Import
                    </button>
                </form>
            </div>

            @if($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="py-5 px-5 bg-red-700 text-white">
                        {{ $error }}
                    </li>  
                @endforeach
            </ul>
            @endif


            <form action="{{ route('dashboard.course.course_students.store', $course) }}" id="add-student" class="mx-[70px] mt-[30px] flex flex-col gap-5" 
            method="POST">
                @csrf
                <h2 class="font-bold text-2xl">Tambah Siswa Baru</h2>
                
                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Email Address</p>
                    <div
                        class="flex items-center w-[500px] h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] focus-within:border-2 focus-within:border-[#0A090B]">
                        <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                            <img src="{{asset('/images/icons/sms.svg')}}" class="h-full w-full object-contain" alt="icon">
                        </div>
                        <input type="text"
                            class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none"
                            placeholder="Tulis alamat email siswa di sini" name="email">
                    </div>
                </div>
                <button type="submit"
                    class="w-[500px] h-[52px] p-[14px_20px] bg-[#01923F] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D] text-center">
                    Tambah Siswa</button>
            </form>
        </div>
    </section>

    <script>
        function updateFileName(input) {
            const fileNameSpan = document.getElementById('file-name');
            if (input.files.length > 0) {
                fileNameSpan.textContent = input.files[0].name;
            } else {
                fileNameSpan.textContent = '';
            }
        }
    </script>

</body>

</html>