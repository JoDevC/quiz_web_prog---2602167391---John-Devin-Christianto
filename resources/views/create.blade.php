@extends('layout')

@section('content')
    <form action="{{ route('movie.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label for="genre">Genre</label>
      <select class="form-control" name="genre_id" id="genre_id">
        @foreach ($genres as $genre)
            <option value="{{$genre->id}}" >{{$genre->nama}}</option>
        @endforeach
      </select>

      @error('genre_id')
        <div class="alert alert-danger">
          <strong>{{$message}}</strong>
        </div>
      @enderror

    </div>

    <div class="form-group">
      <label for="photo">Photo</label>
      <input type="file" class="form-control" name="photo" id="photo" accept="image/*">
      @error('photo')
        <div class="alert alert-danger">
          <strong>{{$message}}</strong>
        </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
      @error('title')
        <div class="alert alert-danger">
          <strong>{{$message}}</strong>
        </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name="description" id="description" rows="3">{{old('description')}}</textarea>
      @error('description')
      <div class="alert alert-danger">
        <strong>{{$message}}</strong>
      </div>
    @enderror
    </div>

    <div class="form-group">
      <label for="publish_date">Date</label>
      <input type="date" class="form-control" name="publish_date" value="{{old('publish_date')}}">
      @error('publish_date')
      <div class="alert alert-danger">
        <strong>{{$message}}</strong>
      </div>
    @enderror
    </div>

    <button type="submit" class="btn btn-dark my-4">Submit</button>

    </form>

@endsection
