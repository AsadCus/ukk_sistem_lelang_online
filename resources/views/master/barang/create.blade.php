{{-- @extends('layouts.main')
@section('content')
<div class="flex gap-6 w-full">
    <div class="card mt-6 w-full">
        <div class="card-header">Form Create Lelang</div>
        <div class="card-body flex items-center">
            <form action="{{ route('admin.barang.post.store') }}" method="post">
            @csrf
                <div class="row mb-3 flex gap-2">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('nama barang') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="name" class="form-control @error('name') is-invalid @enderror p-1" name="name" required autocomplete="name" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection --}}