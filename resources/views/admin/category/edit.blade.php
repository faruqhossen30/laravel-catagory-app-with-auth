@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                        Edit Catagory
                </div>


                <div class="card-body">
                <form action="{{route('update.catagory', $catagory->id)}}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Add Catagory</label>
                    <input value="{{$catagory->category_name}}" name="category_name" type="text" class="form-control @error('category_name') is-invalid @enderror"
                          id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Catagory">
                    @error('category_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update Catagory</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
