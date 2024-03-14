@extends('layouts.Exercise_details')
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
                        <h6 class="mb-0">Recent exercises details</h6>
                        <a href="{{route('exercises_details.create')}}"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form" >creation des categories </button>  </a>  
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">id</th>
                                    <th scope="col">repition</th>
                                    <th scope="col">durée</th>
                                    <th scope="col">Kcal</th>
                 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($exercises_details as $details)
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>{{ $details->id }}</td>
                                    @if( $details->repetition == null  )
                                    <td>0</td>
                                    @else
                                    <td>{{ $details->repetition }}</td>
                                    @endif
                                    @if( $details->duree == null  )
                                    <td>0 minutes</td>
                                    @else
                                    <td>{{ $details->duree }} minutes</td>
                                    @endif
                                    <td>{{ $details->kcal }} kcal</td>
                                    
                                    <td>
                                        <form action="{{ route('exercises_details.destroy', $details->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-success" href="{{route('exercises_details.edit',$details->id)}}">update</a>

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