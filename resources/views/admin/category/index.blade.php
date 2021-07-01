@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                        All Catagory
                </div>



                <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">SN</th>
                            <th scope="col">Name</th>
                            <th scope="col">Created By</th>
                            <th scope="col">Create At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1
                            @endphp
                            @foreach ($catagories as $catagory)
                            <tr>
                            <th scope="row">{{$catagory->id}}</th>
                            <td>{{$catagory->category_name}}</td>
                            <td>{{$catagory->user->name}}</td>
                            <td>{{$catagory->created_at->diffForHumans()}}</td>
                            <td>
                            <a href="{{route('edit.catagory', $catagory->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            <a onclick="confirm()" href="{{route('destroy.catagory', $catagory->id)}}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                            </tr>
                            @endforeach



                        </tbody>
                      </table>
                      {{$catagories->links()}}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                        All Catagory
                </div>


                <div class="card-body">
                <form action="{{route('store.catagory')}}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Add Catagory</label>
                         <input name="category_name" type="text" class="form-control @error('category_name') is-invalid @enderror"
                          id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Catagory">
                    @error('category_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Add</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
