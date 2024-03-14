@extends('layouts.ingrediant_quantite')
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
<form action="{{ route('ingrediant_quantite.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
 <div class="col-sm-12 col-xl-6" style="margin: auto">
    <div class="bg-secondary rounded h-100 p-4" style="  margin-top: 111px;">
        <h6 class="mb-4">add </h6>
        <div class="form-floating mb-3">
            <input type="number" name="quantite" class="form-control" id="floatingPassword"
                placeholder="quantite">
            <label for="floatingInput">quantité</label>
        </div>
  
    
        <button type="submit"class="btn btn-sm btn-primary">add details exercise</button>

       
    </div>
</div>
</form>
@endsection