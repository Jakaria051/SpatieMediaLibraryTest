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



    @foreach ($avatars as $avatar)



      <div class="row row-cols-1 row-cols-md-3">
        <div class="col mb-4">
          <div class="card h-100">
            <img src="{{ $avatar->getUrl('card') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
      </div>


    @endforeach



</div>

    </div>


@endsection

