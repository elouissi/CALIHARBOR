@extends('layouts.ingrediant_quantite')
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
                        <h6 class="mb-0">Recent  ingrediant quantité</h6>
                        <a href="{{route('ingrediant_quantite.create')}}"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form" >creation des quantite des ingrediant </button>  </a>  
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">id</th>
                                    <th scope="col">quantité</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ingrediant_details as $details)
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>{{ $details->id }}</td>
                                     <td>{{ $details->quantite }} g </td>
                                    
                                    <td>
                                        <form action="{{ route('ingrediant_quantite.destroy', $details->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-success" href="{{route('ingrediant_quantite.edit',$details->id)}}">update</a>

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