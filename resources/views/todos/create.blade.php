@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todo Create Page</div>

                <div class="card-body">
 
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
 
                <form method="post" action="{{route('todos.save')}}">
                    @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text"  name="title" class="form-control">
                </div>
                <div class="mb-3">
                    <label  class="form-label">description</label>
                    <textarea name="description" id="" cols="50" rows="5" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <input type="checkbox" name="is_completed">
                    <label  class="form-label">Is Completed?</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection