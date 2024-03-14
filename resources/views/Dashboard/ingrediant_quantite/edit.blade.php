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
<form action="{{ route('ingrediant_quantite.update', $quantite->id)}}" method="POST" >
    @csrf
    @method('PUT')
 <div class="col-sm-12 col-xl-6" style="margin: auto">
    <div class="bg-secondary rounded h-100 p-4"style="  margin-top: 111px;">
        <h6 class="mb-4">update quantite  </h6>
   
        <div class="form-floating mb-3">
            <input type="number" name="quantite" class="form-control" id="floatingPassword"value="{{ $quantite->quantite }}"
                placeholder="quantite">
            <label for="floatingInput">quantite</label>
        </div>
   
    
        <button type="submit"class="btn btn-sm btn-primary">update quantite</button>
    </div>
</div>
</form>
@endsection