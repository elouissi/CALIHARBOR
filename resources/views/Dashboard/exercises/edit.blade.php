@extends('layouts.Exercise')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('exercises.update', $exercise->id)}}" method="POST"  enctype="multipart/form-data">
    @csrf
    @method('PUT')
 <div class="col-sm-12 col-xl-6" style="margin: auto">
    <div class="bg-secondary rounded h-100 p-4"style="  margin-top: 111px;">
        <h6 class="mb-4">update exercise </h6>
        <div class="form-floating mb-3">
        <img src="{{asset('storage/'.$exercise->image)}}" class="img-responsive" alt="Image 1" style="width: 90px;">
            <input type="file" name="image" class="form-control" id="floatingInput "
                placeholder="title">
            <label for="floatingInput">image</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="nom" class="form-control" id="floatingPassword"value="{{ $exercise->nom }}"
                placeholder="content">
            <label for="floatingInput">nom</label>
        </div>
        <div class="form-floating mb-3">
            <textarea type="text" name="description" class="form-control" id="floatingPassword"value="{{ $exercise->description }}"
                placeholder="description">{{ $exercise->description }}</textarea>
            <label for="floatingInput">description</label>
        </div>
    
        <button type="submit"class="btn btn-sm btn-primary">update exercise</button>
    </div>
</div>
</form>
@endsection