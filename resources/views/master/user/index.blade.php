@extends('layouts.main')
@section('content')
<div class="flex gap-6 w-full">
    <div class="card mt-6 w-1/4">
        <div class="card-header">Form Create User</div>
        <div class="card-body flex items-center">
            <form class="w-full" action="{{ route('admin.petugas.post.store') }}" method="post">
            @csrf
                <input class="focus:border-blue-400 focus:ring-2 focus:ring-blue-200 focus:outline-none w-full text-base placeholder-gray-400 border border-gray-300 rounded py-1.5 px-3 mb-2" type="text" name="name" placeholder="name" required />
                <input class="focus:border-blue-400 focus:ring-2 focus:ring-blue-200 focus:outline-none w-full text-base placeholder-gray-400 border border-gray-300 rounded py-1.5 px-3 mb-2" type="text" name="username" placeholder="username" required />
                <input class="focus:border-blue-400 focus:ring-2 focus:ring-blue-200 focus:outline-none w-full text-base placeholder-gray-400 border border-gray-300 rounded py-1.5 px-3 mb-2" type="email" name="email" placeholder="email" required />
                Default Password "12345"
                <input class="focus:border-blue-400 focus:ring-2 focus:ring-blue-200 focus:outline-none w-full text-base placeholder-gray-400 border border-gray-300 rounded py-1.5 px-3 mb-2" type="password" name="password" value="12345" required />
                <div class="w-full">
                    User Level
                    <select name="level" class="focus:border-blue-400 focus:ring-2 focus:ring-blue-200 focus:outline-none w-full text-base placeholder-gray-400 border border-gray-300 rounded py-1.5 px-3 mb-2" required>
                        <option value="administrator">Administrator</option>
                        <option value="petugas" selected>Petugas</option>
                    </select>
                </div>

                <button class="px-4 py-2 text-sm border border-transparent rounded bg-green-500 text-white hover:bg-green-500 focus:outline-none focus:border-green-500 focus:shadow-outline-green active:bg-green-500 transition duration-150 ease-in-out inline-flex items-center" type="submit">
                    Create
                </button>
            </form>
        </div>
    </div>
    <div class="card col-span-2 xl:col-span-1 mt-6 w-3/4">
        <div class="card-header flex justify-between items-center">
            Data Petugas
            {{-- <a href="#" class="btn-bs-primary">Create +</a> --}}
        </div>
        
        @if ($petugas->count() != 0)
        <table class="table-auto w-full text-left">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-r">name</th>
                    <th class="px-4 py-2 border-r">username</th>
                    <th class="px-4 py-2 border-r">email</th>
                    <th class="px-4 py-2 border-r">level</th>
                    <th class="px-4 py-2">created at</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($petugas as $item)
                <tr>                    
                    <td class="border border-l-0 px-4 py-2">{{ $item->user->name }}</td>
                    <td class="border border-l-0 px-4 py-2">{{ $item->username }}</td>
                    <td class="border border-l-0 px-4 py-2 lowercase">{{ $item->user->email }}</td>
                    <td class="border border-l-0 px-4 py-2">{{ $item->user->level }}</td>
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
@endsection