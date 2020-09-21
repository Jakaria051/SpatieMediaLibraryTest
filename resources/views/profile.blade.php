@extends('layouts.app')

@section('content')





<div class="container">
    <div class="row">

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
</div>




@endsection

