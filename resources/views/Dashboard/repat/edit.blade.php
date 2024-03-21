@extends('layouts.repats')
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
<form action="{{ route('repat.update',$repat->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="col-sm-12 col-xl-6" style="margin: auto">
        <div class="bg-secondary rounded h-100 p-4" style="margin-top: 111px;">
            <h6 class="mb-4">update </h6>

            <div class="form-floating mb-3">
                <input type="text" name="nom" class="form-control" value="{{$repat->nom}}" id="floatingPassword"
                    placeholder="nom">
                <label for="floatingInput">nom</label>
            </div>
            <div class="form-floating mb-3">
                <textarea type="text" name="description" class="form-control" id="floatingPassword"
                    placeholder="description">{{$repat->description}}</textarea>
                <label for="floatingInput">description</label>
            </div>
            <div id="show_item">
                @foreach($repat->ingrediants as $ingre)
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="select_ingrediant" class="form-label">Ingrédiant</label>
                        <select class="form-select form-select-lg mb-3" name="ingrediants[]"
                            aria-label=".form-select-lg example">
                            <option value="{{$ingre->id }}" selected>{{$ingre->nom }}</option>
                            @foreach($ingrediants as $ingrediant)
                            <option value="{{ $ingrediant->id }}">{{ $ingrediant->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="input_quantite" class="form-label">Quantité</label>
                        <input type="number" style="height: 47px;" name="quantites[]" id="nom" class="form-control"
                            placeholder="quantite" value="{{$ingre->pivot->quantite}}">
                    </div>
                    <div class="col-md-2 mb-3 d-grid">
                        <button style="height: 47px; margin-top: 34px;" class="btn btn-sm btn-primary add_item_btn"><i
                                class="fa fa-plus"></i></button>
                    </div>
                </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-sm btn-primary">update repat</button>
        </div>
    </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(".add_item_btn").click(function(e){
        e.preventDefault();
     

        $("#show_item").prepend(`
        <div class="row">
                <div class="col-md-5 mb-3">
                <label for="select_ingrediant" class="form-label">Ingrédiant</label>
                    <select class="form-select form-select-lg mb-3" name="ingrediants[]" aria-label=".form-select-lg example">
                        <option selected>Open this select menu</option>
                        @foreach($ingrediants as $ingrediant)
                            <option value="{{ $ingrediant->id }}">{{ $ingrediant->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5 mb-3">
                <label for="input_quantite" class="form-label">Quantité</label>
                    <input type="number" style="height: 47px;" name="quantites[]" id="nom" class="form-control" placeholder="quantite">
                </div>
                <div class="col-md-2 mb-3 d-grid">
                                            
                    <button style="height: 47px;margin-top: 34px;"  class="btn btn-sm btn-dark remove_item_btn"><i class="fas fa-minus"></i></button>

                    
                </div>

            </div>

            `);
    });

    $(document).on('click','.remove_item_btn',function(e){
        e.preventDefault();
        let row_item = $(this).parent().parent()
        $(row_item).remove();
    })
});
</script>
@endsection