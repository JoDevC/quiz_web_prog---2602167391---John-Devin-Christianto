@extends('layout')

@section('content')

{{-- @if(@session('success'))
    <div class="alert alert-success" role="alert">
        <strong>Data has been deleted</strong>
    </div>
@endif --}}

@if(session('create-success'))
    <div class="alert alert-success" role="alert">
        <strong>{{ session('create-success') }}</strong>
    </div>
@endif

@if(session('update-success'))
    <div class="alert alert-success" role="alert">
        <strong>{{ session('update-success') }}</strong>
    </div>
@endif

@if(session('delete-success'))
    <div class="alert alert-success" role="alert">
        <strong>{{ session('delete-success') }}</strong>
    </div>
@endif

<a class="btn btn-primary" href="{{ route('book.create') }}">create</a>
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>genre</th>
                <th>description</th>
                <th>publish_date</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->name}}</td>
                    <td>{{$book->genre->nama}}</td>
                    <td>{{$book->description}}</td>
                    <td>{{$book->publish_date}}</td>
                    <td>
                        <a href="{{ route('book.detail', ['book'=>$book->id]) }}" class="btn btn-sm btn-outline-dark">detail</a>
                        <form action="{{ route('book.delete', ['id'=>$book->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="delete" class="btn btn-sm btn-danger">
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3">Data tidak ditemukan</td></tr>
            @endforelse    
        </tbody>
    </table>
    {{$books->links()}}
@endsection