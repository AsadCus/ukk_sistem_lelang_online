@extends('layouts.main')
@section('content')
<div class="flex gap-6 w-full">
    <div class="card mt-6 w-1/4">
        <div class="card-header">Filter</div>
        <div class="card-body flex items-center">
        </div>
    </div>
    <div class="card col-span-2 xl:col-span-1 mt-6 w-3/4">
        <div class="card-header flex justify-between items-center">
            Data Lelang
        </div>
        
        @if ($lelang->count() != 0)
        <table class="table-auto w-full text-left">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-r"></th>
                    <th class="px-4 py-2 border-r">barang</th>
                    <th class="px-4 py-2 border-r">petugas</th>
                    <th class="px-4 py-2 border-r">initial price</th>
                    <th class="px-4 py-2 border-r">created at</th>
                    <th class="px-4 py-2">action</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($lelang as $item)
                <tr>                    
                    <td class="border border-l-0 px-4 py-2 {{ $item->status == 'active' ? 'text-green-500' : 'text-red-500' }} text-left"><i class="fad fa-circle"></i> {{ $item->status }}</td>
                    <td class="border border-l-0 px-4 py-2">{{ $item->barang->name }}</td>
                    <td class="border border-l-0 px-4 py-2">{{ $item->petugas->username ?? '-' }}</td>
                    <td class="border border-l-0 px-4 py-2">{{ 'Rp. '.strrev(implode('.',str_split(strrev(strval($item->barang->initial_price)),3))) }}</td>
                    <td class="border border-l-0 px-4 py-2">{{ $item->created_at->format('d M Y') }}</td>
                    <td class="border border-l-0 border-r-0 px-4 py-2">
                        <a href="{{ route('detail-lelang', ['id' => $item->id]) }}">view</a>
                    </td>
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
@endsection