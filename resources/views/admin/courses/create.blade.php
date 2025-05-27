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
                <a href="{{route('dashboard.courses.index')}}" class="flex items-center justify-center">
                    <img src="{{asset('/images/logo/logo_sekolah.png')}}" alt="logo">
                </a>
                <ul class="flex flex-col gap-3">
                    <li>
                        <h3 class="font-bold text-xs text-[#A5ABB2]">DAILY USE</h3>
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
            <div class="flex flex-col gap-10 px-5 mt-5">
                <div class="breadcrumb flex items-center gap-[30px]">
                    <a href="{{route('dashboard.courses.index')}}" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Home</a>
                    <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
                    <a href="{{route('dashboard.courses.index')}}" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Manage Ujian</a>
                    <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
                    <a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold ">Ujian Baru</a>
                </div>
            </div>
            <div class="header flex flex-col gap-1 px-5 mt-5">
                <h1 class="font-extrabold text-[30px] leading-[45px]">Ujian Baru</h1>
                <p class="text-[#7F8190]">Buat soal ujian untuk meningkatkan kualitas siswa/siswi</p>
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


            <form method="POST"  action="{{ route('dashboard.courses.store') }}" class="flex flex-col gap-[30px] w-[500px] mx-[70px] mt-10">
                @csrf
                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Mata Pelajaran</p>
                    <div class="flex items-center w-[500px] h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
                        <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                            <img src="{{asset('images/icons/note-favorite-outline.svg')}}" class="w-full h-full object-contain" alt="icon">
                        </div>
                        <input type="text" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" placeholder="Isi Mata Pelajaran" name="name" required>
                    </div>
                </div>
                <div class="group/category flex flex-col gap-[10px]">
                    <p class="font-semibold">Kelas</p>
                    <div class="peer flex items-center p-[12px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
                        <div class="mr-[10px] w-6 h-6 flex items-center justify-center overflow-hidden">
                            <img src="{{asset('images/icons/bill.svg')}}" class="w-full h-full object-contain" alt="icon">
                        </div>
                        <select id="category" class="pl-1 font-semibold focus:outline-none w-full text-[#0A090B] invalid:text-[#7F8190] invalid:font-normal appearance-none bg-[url('{{asset('images/icons/arrow-down.svg')}}')] bg-no-repeat bg-right" name="category_id" required>
                            <option value="" disabled selected hidden>Pilih kelas untuk ujian ini</option>
                            @forelse ($categories as $category )
                            <option value="{{ $category->id }}" class="font-semibold">
                                {{ $category->name }}
                            </option>                               
                            @empty                               
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Tipe Ujian</p>
                    <div class="flex gap-5 items-center">
                        <a href="#" class="group relative flex flex-col w-full items-center gap-5 p-[30px_16px] border border-[#EEEEEE] rounded-[30px] transition-all duration-300 aria-checked:border-2 aria-checked:border-[#0A090B]" data-group="course-type" aria-checked="false" onclick="handleActiveAnchor(this)">
                            <div class="w-[70px] h-[70px] flex shrink-0 overflow-hidden">
                                <img src="{{asset('images/icons/onboarding.svg')}}" class="w-full h-full" alt="icon">
                            </div>
                            <span class="text-center mx-auto font-semibold">Onboarding</span>
                            <div class="absolute transform -translate-x-1/2 -translate-y-1/2 top-[24px] right-0 hidden transition-all duration-300 group-aria-checked:block">
                                <img src="{{asset('images/icons/tick-circle.svg')}}" alt="icon">
                            </div>
                        </a>
                        <a href="#" class="group relative flex flex-col w-full items-center gap-5 p-[30px_16px] border border-[#EEEEEE] rounded-[30px] transition-all duration-300 aria-checked:border-2 aria-checked:border-[#0A090B]" data-group="course-type" aria-checked="false" onclick="handleActiveAnchor(this)">
                            <div class="w-[70px] h-[70px] flex shrink-0 overflow-hidden">
                                <img src="{{asset('images/icons/module.svg')}}" class="w-full h-full" alt="icon">
                            </div>
                            <span class="text-center mx-auto font-semibold">CBT Module</span>
                            <div class="absolute transform -translate-x-1/2 -translate-y-1/2 top-[24px] right-0 hidden transition-all duration-300 group-aria-checked:block">
                                <img src="{{asset('images/icons/tick-circle.svg')}}" alt="icon">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Publish Date</p>
                    <div class="flex gap-[10px] items-center">
                        <a href="#" class="group relative flex w-full items-center gap-[14px] p-[14px_16px] border border-[#EEEEEE] rounded-full transition-all duration-300 aria-checked:border-2 aria-checked:border-[#0A090B]" data-group="publish-date" aria-checked="false" onclick="handleActiveAnchor(this)">
                            <div class="w-[24px] h-[24px] flex shrink-0 overflow-hidden">
                                <img src="{{asset('images/icons/clock.svg')}}" class="w-full h-full" alt="icon">
                            </div>
                            <span class="font-semibold">Aktif Sekarang</span>
                            <div class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 right-0 hidden transition-all duration-300 group-aria-checked:block">
                                <img src="{{asset('images/icons/tick-circle.svg')}}" alt="icon">
                            </div>
                        </a>
                        <a href="#" class="group relative flex w-full items-center gap-[14px] p-[14px_16px] border border-[#EEEEEE] rounded-full transition-all duration-300 aria-checked:border-2 aria-checked:border-[#0A090B] disabled:border-[#EEEEEE]" data-group="publish-date" aria-checked="false" onclick="event.preventDefault()" disabled>
                            <div class="w-[24px] h-[24px] flex shrink-0 overflow-hidden">
                                <img src="{{asset('images/icons/calendar-add-disabled.svg')}}" class="w-full h-full" alt="icon">
                            </div>
                            <span class="font-semibold text-[#EEEEEE]">Buat jadwal</span>
                            <div class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 right-0 hidden transition-all duration-300 group-aria-checked:block">
                                <img src="{{asset('images/icons/tick-circle.svg')}}" alt="icon">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="group/access flex flex-col gap-[10px]">
                    <p class="font-semibold">Tipe Akses</p>
                    <div class="peer flex items-center p-[12px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
                        <div class="mr-[10px] w-6 h-6 flex items-center justify-center overflow-hidden">
                            <img src="{{asset('images/icons/security-user.svg')}}" class="w-full h-full object-contain" alt="icon">
                        </div>
                        <select id="access" class="pl-1 font-semibold focus:outline-none w-full text-[#0A090B] invalid:text-[#7F8190] invalid:font-normal appearance-none bg-[url('{{asset('images/icons/arrow-down.svg')}}')] bg-no-repeat bg-right" name="access" required>
                            <option value="" disabled selected hidden>Pilih Tipe Akses</option>
                            <option value="Invitation Only" class="font-semibold">Invitation Only</option>
                        </select>
                    </div>
                </div>
                <label class="font-semibold flex items-center gap-[10px]"
                    ><input
                    type="radio"
                    name="tnc"
                    class="w-[24px] h-[24px] appearance-none checked:border-[3px] checked:border-solid checked:border-white rounded-full checked:bg-[#2B82FE] ring ring-[#EEEEEE]"
                    checked/>
                    I have read terms and conditions
                </label>
                <div class="flex items-center gap-5">
                    <a href="" class="w-full h-[52px] p-[14px_20px] bg-[#0A090B] rounded-full font-semibold text-white transition-all duration-300 text-center">Simpan Draft</a>
                    <button type="submit" class="w-full h-[52px] p-[14px_20px] bg-[#01923F] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D] text-center">Simpan Ujian</button type="submit">
                </div>
            </form>
        </div>
    </section>

    <script>
        function previewFile() {
            var preview = document.querySelector('.file-preview');
            var fileInput = document.querySelector('input[type=file]');

            if (fileInput.files.length > 0) {
                var reader = new FileReader();
                var file = fileInput.files[0]; // Get the first file from the input

                reader.onloadend = function () {
                    var img = preview.querySelector('.thumbnail-icon'); // Get the thumbnail image element
                    img.src = reader.result; // Update src attribute with the uploaded file
                    preview.classList.remove('hidden'); // Remove the 'hidden' class to display the preview
                }

                reader.readAsDataURL(file);
                fileInput.setAttribute('data-empty', 'false');
            } else {
                preview.classList.add('hidden'); // Hide preview if no file selected
                fileInput.setAttribute('data-empty', 'true');
            }
        }
    </script>

    <script>
        function handleActiveAnchor(element) {
            event.preventDefault();

            const group = element.getAttribute('data-group');
            
            // Reset all elements' aria-checked to "false" within the same data-group
            const allElements = document.querySelectorAll(`[data-group="${group}"][aria-checked="true"]`);
            allElements.forEach(el => {
                el.setAttribute('aria-checked', 'false');
            });
            
            // Set the clicked element's aria-checked to "true"
            element.setAttribute('aria-checked', 'true');
        }
    </script>
    
</body>
</html>