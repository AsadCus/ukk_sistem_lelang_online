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
            Data Barang
            <a href="{{ route('admin.barang.get.create') }}" class="btn-bs-primary">Create +</a>
        </div>
        
        @if ($barang->count() != 0)
        <table class="table-auto w-full text-left">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-r">name</th>
                    <th class="px-4 py-2 border-r">description</th>
                    <th class="px-4 py-2 border-r">initial price</th>
                    <th class="px-4 py-2">action</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($barang as $item)
                <tr>                    
                    <td class="border border-l-0 px-4 py-2">{{ $item->name }}</td>
                    <td class="border border-l-0 px-4 py-2">{{ $item->description }}</td>
                    <td class="border border-l-0 px-4 py-2">{{ 'Rp. '.strrev(implode('.',str_split(strrev(strval($item->initial_price)),3))) }}</td>
                    <td class="border border-l-0 border-r-0 px-4 py-2 flex flex-col text-center">
                        <a href="{{ route('admin.barang.get.edit') }}" class="bg-yellow-400 p-1 rounded mb-1">edit</a>
                        <a href="{{ route('admin.barang.delete') }}" class="bg-red-500 p-1 rounded text-white">delete</a>
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