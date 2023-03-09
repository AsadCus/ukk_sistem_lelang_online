<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
  <link rel="shortcut icon" href="{{ asset('img/fav.png') }}" type="image/x-icon">
  <title>LelangGelap</title>
  <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">  
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
<!-- nav -->
<div class="items-center p-10 border-b">
    <div class="flex justify-center mb-6">
        <i class="fad fa-vacuum-robot text-2xl" class="w-12"></i>
        <strong class="capitalize text-2xl ml-1">Admin-LelangGelap</strong>
    </div>
    <div class="items-center flex justify-between">
        <div class="text-gray-600 flex gap-8">
            <a class="transition duration-500 ease-in-out hover:text-gray-900" href="{{ route('admin.dashboard') }}">
                <h1 class="text-sm font-semibold m-0 p-0 leading-none">Home</h1>    
            </a>
            <a class="transition duration-500 ease-in-out hover:text-gray-900" href="{{ route('admin.lelang.get.index') }}">
                <h1 class="text-sm font-semibold m-0 p-0 leading-none">Lelang</h1>    
            </a>
            <a class="transition duration-500 ease-in-out hover:text-gray-900" href="{{ route('admin.barang.get.index') }}">
                <h1 class="text-sm font-semibold m-0 p-0 leading-none">Barang</h1>    
            </a>
        </div>
        <div class="dropdown relative md:static">

            <button class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center">
              <div class="w-8 h-8 overflow-hidden rounded-full">
                <img class="w-full h-full object-cover" src="{{ asset('img/user.svg') }}" >
              </div> 
  
              <div class="ml-2 capitalize flex ">
                <h1 class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none">moeSaid</h1>
                <i class="fad fa-chevron-down ml-2 text-xs leading-none"></i>
              </div>                        
            </button>
  
            <button class="hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"></button>
  
            <div class="text-gray-500 menu hidden md:mt-10 md:w-full rounded bg-white shadow-md absolute z-20 right-0 w-40 mt-5 py-2 animated faster">
  
              <!-- item -->
              <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
                <i class="fad fa-user-edit text-xs mr-1"></i> 
                edit my profile
              </a>     
              <!-- end item -->
  
              <!-- item -->
              <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
                <i class="fad fa-inbox-in text-xs mr-1"></i> 
                my inbox
              </a>     
              <!-- end item -->
  
              <!-- item -->
              <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
                <i class="fad fa-badge-check text-xs mr-1"></i> 
                tasks
              </a>     
              <!-- end item -->
  
              <!-- item -->
              <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
                <i class="fad fa-comment-alt-dots text-xs mr-1"></i> 
                chats
              </a>     
              <!-- end item -->
  
              <hr>
  
              <!-- item -->
              <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
                <i class="fad fa-user-times text-xs mr-1"></i> 
                log out
              </a>     
              <!-- end item -->
  
            </div>
        </div>
    </div>
</div>
<!-- end nav -->
<!-- dashboard -->
<div class="px-10 py-2">
    @yield('content')
</div>
<!-- end dashboard -->
<!-- script -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<!-- end script -->
</body>
</html>
<!doctype html>

