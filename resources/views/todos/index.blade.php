@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    {{ __('Dashboard') }}
                    <a href="{{route('todos.create')}}" class="btn btn-success btn-sm"><i class="bi bi-plus"></i> Todos</a>
                </div>

                <div class="card-body">

                    @if(Session::has('alert-success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('alert-success')}}
                      </div>
                      @endif
                
                      @if(count($todos)>0)
                      <table class="table">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>title</th>
                            <th>Description</th>
                            <th>status</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($todos as $idx=>$todo)
                            <tr>
                                <td>{{$idx+= 1}}</td>
                                <td>{{mb_strimwidth($todo->title, 0, 15, "...")}}</td>
                                <td>{{mb_strimwidth($todo->description, 0, 35, "...")}}</td>
                                <td>
                                    @if ($todo-> is_completed == 1 )
                                        <button disabled class="btn btn-success btn-sm">completed</button>
                                    @else
                                        <button disabled class="btn btn-warning btn-sm">not completed</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('todos.details', $todo->id)}}" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a href="{{route('todos.delete', $todo->id)}}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                        @else
                        <h4>No Todos Created yet</h4>
                      @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
