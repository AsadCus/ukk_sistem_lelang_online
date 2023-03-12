@extends('layouts.main')
@section('content')
<div class="flex gap-6 w-full">
    <div class="card mt-6 w-1/4">
        <div class="card-header">Form Create Lelang</div>
        <div class="card-body flex items-center">
            <form class="w-full" action="{{ route('admin.barang.post.store') }}" method="post">
            @csrf
                <input class="focus:border-blue-400 focus:ring-2 focus:ring-blue-200 focus:outline-none w-full text-base placeholder-gray-400 border border-gray-300 rounded py-1.5 px-3 mb-2" type="text" name="name" placeholder="barang" required />
                <textarea name="description" placeholder="deskripsi barang" rows="3" class="focus:border-blue-400 focus:ring-2 focus:ring-blue-200 focus:outline-none w-full text-base placeholder-gray-400 border border-gray-300 rounded py-1.5 px-3 mb-2" required></textarea>
                <input class="focus:border-blue-400 focus:ring-2 focus:ring-blue-200 focus:outline-none w-full text-base placeholder-gray-400 border border-gray-300 rounded py-1.5 px-3 mb-2" type="number" name="initial_price" placeholder="harga buka" required />
                status Lelang
                <select name="status" class="focus:border-blue-400 focus:ring-2 focus:ring-blue-200 focus:outline-none w-full text-base placeholder-gray-400 border border-gray-300 rounded py-1.5 px-3 mb-2" required>
                    <option value="1">Active</option>
                    <option value="3">Close</option>
                </select>

                <button class="px-4 py-2 text-sm border border-transparent rounded bg-green-500 text-white hover:bg-green-500 focus:outline-none focus:border-green-500 focus:shadow-outline-green active:bg-green-500 transition duration-150 ease-in-out inline-flex items-center" type="submit">
                    Create
                </button>
            </form>
        </div>
    </div>
    <div class="card col-span-2 xl:col-span-1 mt-6 w-3/4">
        <div class="card-header flex justify-between items-center">
            Data Barang
            {{-- <a href="{{ route('admin.barang.get.create') }}" class="btn-bs-primary">Create +</a> --}}
        </div>
        
        @if ($barang->count() != 0)
        <table class="table-auto w-full text-left">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-r">name</th>
                    <th class="px-4 py-2 border-r">description</th>
                    <th class="px-4 py-2">action</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($barang as $item)
                <tr>                    
                    <td class="border border-l-0 px-4 py-2">{{ $item->name }}</td>
                    <td class="border border-l-0 px-4 py-2">{{ $item->description }}</td>
                    @if (Auth::user()->level == "administrator")
                    <td class="border border-l-0 border-r-0 px-4 py-2 flex flex-col items-center">
                        <a href="{{ route('admin.barang.get.edit', $item->id) }}" class="bg-yellow-400 p-1 rounded mb-1">edit</a>
                        <form method="post" action="{{ route('admin.barang.delete', $item->id) }}">
                            @method('delete')
                            @csrf
                            <input type="number" name="lelang_id" value="{{ $item->lelangs->id }}" hidden>
                            <button type="submit" class="bg-red-500 p-1 rounded text-white">delete</button>
                        </form>
                    </td>
                    @else
                    <td class="border border-l-0 border-r-0 px-4 py-2 text-center">
                        <a href="{{ route('admin.barang.get.edit', $item->id) }}" class="bg-yellow-400 p-1 rounded mb-1">edit</a>
                    </td>
                    @endif
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