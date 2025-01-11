@extends('layout')

@section('content')

@if(@session('success'))
    <div class="alert alert-success" role="alert">
        <strong>Data has been saved</strong>
    </div>
@endif

    <div class="row">
        <div class="col-4">
            <img src="{{ asset('storage/'.$book->photo) }}" alt="" style="max-width: 250px;" >
        </div>
        <div class="col-8">
            <form action="{{ route('book.update',['book'=>$book->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="genre">Genre</label>
                  <select class="form-control" name="genre_id" id="genre_id">
                    @foreach ($genres as $genre)
                        <option value="{{$genre->id}}" {{ $book->genre_id == $genre->id? 'selected' : '' }}>{{$genre->name}}</option>
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
                  <input type="file" class="form-control" name="photo" id="photo" value="{{old('photo')}}">
                  @error('photo')
                    <div class="alert alert-danger">
                      <strong>{{$message}}</strong>
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{old('name',$book->name)}}">
                  @error('name')
                    <div class="alert alert-danger">
                      <strong>{{$message}}</strong>
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" name="description" id="description" rows="3">{{old('description',$book->description)}}</textarea>
                  @error('description')
                  <div class="alert alert-danger">
                    <strong>{{$message}}</strong>
                  </div>
                @enderror
                </div>

                <div class="form-group">
                  <label for="publish_date">Date</label>
                  <input type="date" class="form-control" id="publish_date" name="publish_date" value="{{old('publish_date',$book->publish_date->format('Y-m-d'))}}">
                  @error('publish_date')
                  <div class="alert alert-danger">
                    <strong>{{$message}}</strong>
                  </div>
                @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>

                </form>
        </div>
    </div>
@endsection
