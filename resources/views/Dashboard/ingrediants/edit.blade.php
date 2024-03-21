@extends('layouts.Ingrediants')
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
<form action="{{ route('ingrediant.update', $ingrediant->id)}}" method="POST"  enctype="multipart/form-data">
    @csrf
    @method('PUT')
 <div class="col-sm-12 col-xl-6" style="margin: auto">
    <div class="bg-secondary rounded h-100 p-4"style="  margin-top: 111px;">
        <h6 class="mb-4">update ingrediant </h6>
        <div class="form-floating mb-3">
        <img src="{{asset('storage/'.$ingrediant->image)}}" class="img-responsive" alt="Image 1" style="width: 90px;">
            <input type="file" name="image" class="form-control" id="floatingInput "
                placeholder="title">
            <label for="floatingInput">image</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="nom" class="form-control" id="floatingPassword"value="{{ $ingrediant->nom }}"
                placeholder="content">
            <label for="floatingInput">nom</label>
        </div>
        <div class="form-floating mb-3">
            <textarea type="text" name="description" class="form-control" id="floatingPassword"value="{{ $ingrediant->description }}"
                placeholder="description">{{ $ingrediant->description }}</textarea>
            <label for="floatingInput">description</label>
        </div>
        <div class="form-floating mb-3">
                     <select class="form-select form-select-md mb-3" name="unite" aria-label=".form-select-lg example">
                        <option  disabled selected>{{ $ingrediant->unite }}</option>
                        <option  disabled selected>choisir une unité</option>
                        <option value="g"  >g</option>
                        <option value="unite" >unité</option>
                        <option value="l"  >llitre</option>
                   
                    </select>
        </div>
    
        <button type="submit"class="btn btn-sm btn-primary">update ingrediant</button>
    </div>
</div>
</form>
@endsection