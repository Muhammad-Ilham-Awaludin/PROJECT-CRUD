@extends('layouts.layout')

@section('title', 'Edit Book')

@section('content')
    <h2>Edit Buku</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}">
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Penulis</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}">
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Tahun</label>
            <input type="number" class="form-control" id="year" name="year" value="{{ $book->year }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Buku</button>
    </form>
@endsection
