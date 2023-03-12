@extends('layouts.main')
@section('content')
<div class="flex gap-6 w-full">
    <div class="card mt-6 w-full">
        <div class="card-header">Edit Lelang</div>
        <div class="card-body">
            <form action="{{ route('admin.barang.put.update', $data->id) }}" method="post">
            @csrf
            @method('put')
                Nama Barang
                <input class="focus:border-blue-400 focus:ring-2 focus:ring-blue-200 focus:outline-none w-full text-base placeholder-gray-400 border border-gray-300 rounded py-1.5 px-3 mb-2" type="text" name="name" value="{{ $data->name }}" required />
                Deskripsi Barang
                <textarea name="description" rows="3" class="focus:border-blue-400 focus:ring-2 focus:ring-blue-200 focus:outline-none w-full text-base placeholder-gray-400 border border-gray-300 rounded py-1.5 px-3 mb-2" required>{{ $data->description }}</textarea>
                Harga Buka
                <input class="focus:border-blue-400 focus:ring-2 focus:ring-blue-200 focus:outline-none w-full text-base placeholder-gray-400 border border-gray-300 rounded py-1.5 px-3 mb-2" type="number" name="initial_price" value="{{ $data->initial_price }}" required />
                <div class="w-full">
                    status Lelang
                    <select class="focus:border-blue-400 focus:ring-2 focus:ring-blue-200 focus:outline-none w-full text-base placeholder-gray-400 border border-gray-300 rounded py-1.5 px-3 mb-2" name="status" required>
                        <option value="1" {{ $data->lelangs->status == "active" ? 'selected' : '' }}>Active</option>
                        <option value="2" {{ $data->lelangs->status == "inactive" ? 'selected' : '' }}>Inactive</option>
                        <option value="3" {{ $data->lelangs->status == "close" ? 'selected' : '' }}>Close</option>
                    </select>
                </div>
                <input type="number" name="lelang_id" value="{{ $data->lelangs->id }}" hidden>

                <button class="px-4 py-2 text-sm border border-transparent rounded bg-green-500 text-white hover:bg-green-500 focus:outline-none focus:border-green-500 focus:shadow-outline-green active:bg-green-500 transition duration-150 ease-in-out inline-flex items-center" type="submit">
                    Update
                </button>
            </form>
        </div>
    </div>
</div>
@endsection