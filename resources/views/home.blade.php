@extends('layouts.main')
@section('content')
@if (Auth::user()->level == 'administrator')
<div class="grid grid-cols-5 gap-6 xl:grid-cols-2">
    <div class="card mt-6">
        <div class="card-body flex items-center">
            
            <div class="px-3 py-2 rounded bg-indigo-600 text-white mr-3">
                <i class="fad fa-wallet"></i>
            </div>

            <div class="flex flex-col">
                <h1 class="font-semibold"><span class="num-2"></span> Sales</h1>
                <p class="text-xs"><span class="num-2"></span> payments</p>
            </div>

        </div>
    </div>
    <div class="card mt-6">
        <div class="card-body flex items-center">
            
            <div class="px-3 py-2 rounded bg-green-600 text-white mr-3">
                <i class="fad fa-shopping-cart"></i>
            </div>

            <div class="flex flex-col">
                <h1 class="font-semibold"><span class="num-2"></span> Orders</h1>
                <p class="text-xs"><span class="num-2"></span> items</p>
            </div>

        </div>
    </div>
    <div class="card mt-6 xl:mt-1">
        <div class="card-body flex items-center">
            
            <div class="px-3 py-2 rounded bg-red-600 text-white mr-3">
                <i class="fad fa-comments"></i>
            </div>

            <div class="flex flex-col">
                <h1 class="font-semibold"><span class="num-2"></span> comments</h1>
                <p class="text-xs"><span class="num-2"></span> approved</p>
            </div>

        </div>
    </div>
    <div class="card mt-6 xl:mt-1">
        <div class="card-body flex items-center">
            
            <div class="px-3 py-2 rounded bg-red-600 text-white mr-3">
                <i class="fad fa-comments"></i>
            </div>

            <div class="flex flex-col">
                <h1 class="font-semibold"><span>{{ count($user->whereIn('level', ['administrator', 'petugas'])) }}</span> petugas</h1>
                <p class="text-xs"><span>?</span> online</p>
            </div>

        </div>
    </div>
    <div class="card mt-6 xl:mt-1 xl:col-span-2">
        <div class="card-body flex items-center">
            
            <div class="px-3 py-2 rounded bg-pink-600 text-white mr-3">
                <i class="fad fa-user"></i>
            </div>

            <div class="flex flex-col">
                <h1 class="font-semibold"><span>{{ count($user->where('level', 'masyarakat')) }}</span> members</h1>
                <p class="text-xs"><span>?</span> online</p>
            </div>

        </div>
    </div>
</div>
<div class="flex gap-6">
    <div class="card col-span-2 xl:col-span-1 mt-6 w-full">
        <div class="card-header">Recent Opened</div>
        @if ($lelang->where('status', 'active')->count() != 0)
        <table class="table-auto w-full text-left">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-r"></th>
                    <th class="px-4 py-2 border-r">product</th>
                    <th class="px-4 py-2 border-r">initial price</th>
                    <th class="px-4 py-2">date</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($lelang->where('status', 'active')->take(6) as $item)
                <tr>                    
                    <td class="border border-l-0 px-4 py-2 text-center text-green-500"><i class="fad fa-circle"></i></td>
                    <td class="border border-l-0 px-4 py-2">{{ $item->barang->name }}</td>
                    <td class="border border-l-0 px-4 py-2">{{ 'Rp. '.strrev(implode('.',str_split(strrev(strval($item->barang->initial_price)),3))) }}</td>
                    <td class="border border-l-0 border-r-0 px-4 py-2">{{ $item->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="flex flex-col items-center">
            <div class="w-48">
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_hl5n0bwb.json"  background="transparent" speed="1" loop autoplay></lottie-player>
            </div>
            <p class="text-center mt-3 text-lg">Oops, Nothing Here</p> 
        </div>
        @endif
    </div>
    <div class="card col-span-2 xl:col-span-1 mt-6 w-full">
        <div class="card-header">Recent Closed</div>
        @if ($lelang->where('status', 'inactive')->count() != 0)
        <table class="table-auto w-full text-left">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-r"></th>
                    <th class="px-4 py-2 border-r">product</th>
                    <th class="px-4 py-2 border-r">final price</th>
                    <th class="px-4 py-2">date</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($lelang->where('status', 'inactive')->take(6) as $item)
                <tr>                    
                    <td class="border border-l-0 px-4 py-2 text-center text-red-500"><i class="fad fa-circle"></i></td>
                    <td class="border border-l-0 px-4 py-2">{{ $item->barang->name }}</td>
                    <td class="border border-l-0 px-4 py-2">{{ 'Rp. '.strrev(implode('.',str_split(strrev(strval($item->final_price)),3))) }}</td>
                    <td class="border border-l-0 border-r-0 px-4 py-2">{{ $item->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else   
        <div class="flex flex-col items-center">
            <div class="w-48">
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_hl5n0bwb.json"  background="transparent" speed="1" loop autoplay></lottie-player>
            </div>
            <p class="text-center my-3 text-lg">Oops, Nothing Here</p> 
        </div>
        @endif
    </div>
</div>
@endif
@if (Auth::user()->level == 'masyarakat')
<div class="flex gap-6 w-full">
    <div class="card mt-6 w-1/4">
        <div class="card-header">Filter</div>
        <div class="card-body flex items-center">
        </div>
    </div>
    <div class="grid grid-cols-4 gap-4 xl:grid-cols-2 w-3/4 mt-6">
        @foreach ($lelang as $item)
        <div class="card h-40">
            <div class="card-body flex flex-col justify-between h-full">
                <div class="flex flex-col justify-between">
                    <h1 class="font-semibold">{{ $item->barang->name }}</h1>
                    <p>{{ 'Rp. '.strrev(implode('.',str_split(strrev(strval($item->barang->initial_price)),3))) }}</p>
                </div>
                <a href="{{ route('detail-lelang', ['id' => $item->id]) }}">more</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
@if (Auth::user()->level == 'petugas')
<div class="flex gap-6 w-full">
    <div class="card mt-6 w-1/4">
        <div class="card-header">Filter</div>
        <div class="card-body flex items-center">
        </div>
    </div>
    <div class="grid grid-cols-4 gap-4 xl:grid-cols-2 w-3/4 mt-6">
        @foreach ($lelang as $item)
        <div class="card h-40">
            <div class="card-body flex flex-col justify-between h-full">
                <div class="flex flex-col justify-between">
                    <h1 class="font-semibold">{{ $item->barang->name }}</h1>
                    <p>{{ 'Rp. '.strrev(implode('.',str_split(strrev(strval($item->barang->initial_price)),3))) }}</p>
                </div>
                <a href="{{ route('detail-lelang', ['id' => $item->id]) }}">more</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
@endsection