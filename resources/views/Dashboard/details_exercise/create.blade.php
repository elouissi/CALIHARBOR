@extends('layouts.Exercise_details')
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
<form action="{{ route('exercises_details.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
 <div class="col-sm-12 col-xl-6" style="margin: auto">
    <div class="bg-secondary rounded h-100 p-4" style="  margin-top: 111px;">
        <h6 class="mb-4">add </h6>
        <div class="form-floating mb-3">
            <input type="number" name="repetition" class="form-control" id="floatingInput"
                placeholder="repetition">
            <label for="floatingInput">repetition</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" name="duree" class="form-control" id="floatingPassword"
                placeholder="duree">
            <label for="floatingInput">duree</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" name="kcal" class="form-control" id="floatingPassword"
                placeholder="kcal">
            <label for="floatingInput">kcal</label>
        </div>
    
        <button type="submit"class="btn btn-sm btn-primary">add details exercise</button>

       
    </div>
</div>
</form>
@endsection