@extends('layouts.app')

@section('content')





<div class="container">
    <div class="row">

        @if (session()->has('error'))
        <div class="alert alert-danger">{{ session()->get('error') }}</div>
         @endif
    <form action="{{ route('avatar.store') }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="input-group mb-3">
            <div class="custom-file">
              <input type="file" name="avatar" class="custom-file-input" id="inputGroupFile02">
              <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
            </div>
            <div class="input-group-append">
                <input type="submit" value="Upload" class="ml-2">
            </div>
          </div>
        </form>
    </div>


    @foreach ($avatars as $avatar)


    <div class="card-group">
        <div class="card">
        <img class="card-img-top" src="{{ $avatar->getUrl() }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>

      </div>


    @endforeach



</div>




@endsection

