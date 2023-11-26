@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todo Update Page</div>

                <div class="card-body">
 
                <div class="row">
                    <div class="col-12">
                        @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
 
                <form method="post" action="{{route('todos.update', $todo->id)}}">
                    @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text"  name="title" class="form-control" value="{{$todo->title}}">
                </div>
                <div class="mb-3">
                    <label  class="form-label">description</label>
                    <textarea name="description" id="" cols="50" rows="5" class="form-control">{{$todo->description}}</textarea>
                </div>
                <div class="mb-3">
                    <input type="checkbox" name="is_completed" @if($todo->is_completed == 1) checked @endif >
                    <label  class="form-label">Is Completed?</label>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{route('todos.index')}}" class="btn btn-outline-danger">cancel</a>
                </form>
                    </div>
                    <div class="col-12 d-flex flex-column">
                        <hr>
                        <h4><strong>{{$todo->title}}</strong> @if ($todo-> is_completed == 1 )
                            <button disabled class="btn btn-success btn-sm">completed</button>
                        @else
                            <button disabled class="btn btn-sm btn-warning"><i class="bi bi-exclamation-circle"></i> not completed</button></h4>
                        @endif
                            
                                    
                        <p>{{$todo->description}}</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
