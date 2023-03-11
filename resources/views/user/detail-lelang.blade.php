@extends('layouts.main')
@section('content')
<div class="flex gap-6 w-full">
    <div class="card mt-6 w-1/4">
        @if (Auth::user()->level == 'petugas')
        <div class="card-header">Manage</div>
        <div class="card-body flex flex-col">
            @if ($lelang->status == 'active')
            <a href="#" class="btn-bs-secondary mb-2">Tutup Sementara</a>
            @endif
            @if ($lelang->status == 'active')
            <a href="#" class="btn-bs-danger">Tutup Lelang</a>
            @endif
        </div>
        @endif
        @if (Auth::user()->level == 'masyarakat')
        <div class="card-header">Form Penawaran</div>
        <div class="card-body flex flex-col">
            
        </div>
        @endif
    </div>
    <div class="col-span-2 xl:col-span-1 mt-6 w-3/4">
        <div class="card flex flex-col gap-2">
            <div class="card-body">
                <h1 class="text-4xl font-semibold mb-2">{{ $lelang->barang->name }}</h1>
                <div class="w-full flex">
                    <div class="w-1/4">
                        <div><span class="text-gray-500">description</span></div>
                        <div><span class="text-gray-500">opening date</span></div>
                        <div><span class="text-gray-500">open price</span></div>
                    </div>
                    <div class="w-3/4">
                        <div>: {{ $lelang->barang->description }}</div>
                        <div>: {{ $lelang->created_at->format('l, d M Y') }}</div>
                        <div>: {{ 'Rp. '.strrev(implode('.',str_split(strrev(strval($lelang->barang->initial_price)),3))) }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card flex flex-col mt-4">
            <div class="card-header items-center">recent bid</div>
            @if ($historyLelang->count() != 0)
            <table class="table-auto w-full text-left">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-r">username</th>
                        <th class="px-4 py-2 border-r">bid price</th>
                        <th class="px-4 py-2">time</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600">
                    @foreach ($historyLelang as $item)
                    <tr>                    
                        <td class="border border-l-0 px-4 py-2">{{ $item->user->masyarakat->username }}</td>
                        <td class="border border-l-0 px-4 py-2">{{ 'Rp. '.strrev(implode('.',str_split(strrev(strval($item->price_quotation)),3))) }}</td>
                        <td class="border border-l-0 border-r-0 px-4 py-2">{{ $item->created_at->format('d M Y - H:i') }}</td>
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
</div>
@endsection