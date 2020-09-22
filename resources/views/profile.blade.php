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

              <div class="float-left">
                  <a href="#" onclick="event.preventDefault(); document.getElementById('selecForm{{$avatar->id}}').submit()">
                      <i class="text-success fas fa-check fa-2x"></i>
                  </a>
                <form action="{{ route('avatar.update',auth()->user()->id) }}" id="selecForm{{ $avatar->id }}" style="display: none" method="post">
                    @csrf
                    @method('put')
                <input type="hidden" name="selectedAvatar" value="{{$avatar->id}}" type="submit">
                </form>

                  <a href="#">
                    <i class="text-danger fas fa-minus-circle fa-2x"></i>
                </a>

            </div>

            <div class="float-right">
                <a href="#">
                    <i class=" text-info fas fa-eye fa-2x"></i>
                </a>
                <a href="#">
                    <i class=" text-warning fas fa-cloud-download-alt fa-2x"></i>\
                </a>
            </div>

            </div>
          </div>
        </div>
      </div>


    @endforeach



</div>

    </div>


@endsection

