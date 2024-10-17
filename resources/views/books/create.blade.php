@extends('layouts.layout')

@section('title', 'Add New Book')

@section('content')
    <h2>Tambah Buku Baru</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Penulis</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}">
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Tahun</label>
            <input type="number" class="form-control" id="year" name="year" value="{{ old('year') }}">
        </div>
        <button type="submit" class="btn btn-primary">Tambah Buku</button>
    </form>
@endsection
