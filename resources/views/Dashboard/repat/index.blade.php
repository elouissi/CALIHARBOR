@extends('layouts.repats')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

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
<div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent  repats</h6>
                        <a href="{{route('repat.create')}}"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form" >creation des repats </button>  </a>  
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">id</th>
                                    <th scope="col">nom</th>
                                    <th scope="col">description</th>
                                    <th scope="col">repats</th>

                 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($repats as $repat)
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>{{ $repat->id }}</td>
                                    <td>{{ $repat->nom }} </td>
                                    <td>{{ $repat->description }} </td>
                                    <td>
    @foreach($repat->ingrediants as $ingrediant)
        <li>{{ $ingrediant->nom }} - {{ $ingrediant->pivot->quantite }} {{ $ingrediant->unite }}</li>
    @endforeach
</td>
                                  
                                    <td>
                                        <form action="{{ route('repat.destroy', $repat->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-success" href="{{route('repat.edit',$repat->id)}}">update</a>

                                            <button type="submit" class="btn btn-sm btn-danger">delete</button>
                                        </form>                                  
                                      </td>
                                </tr>
                                @endforeach
                      
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->
            @endsection