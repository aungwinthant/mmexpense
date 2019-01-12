@extends('layouts.app')


@section('content')

@include('layouts.navbar')

<div class="container">
        @if ($errors->any())
            @include('layouts.errors')
        @endif
        <div class="card">
            <div class="card-body">
                    <form action="/users" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="avatar">
                                <img src="/uploads/avatars/{{ $user->avatar }}" alt="" style="width: 150px; height: 150px; border-radius:50%; cursor:pointer" class="rounded-circle">
                            </label>
                            <input type="file" name="avatar" style="display:none" id="avatar">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Save Changes" class="btn btn-sm btn-primary">
                        </div>
                    </form>
                    <h1>{{ $user->name }}</h1>
            </div>
        </div>
              
        <a class="btn btn-info btn-md" href="/transactions">Go Back</a>
</div>
<!-- Card -->
@include('layouts.footer')

@endsection