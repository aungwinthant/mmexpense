@extends('layouts.app')


@section('content')

@include('layouts.navbar')
<div class="container">
    @if (Session::has('status'))
    <div class="alert alert-info">{{ Session::get('status') }}</div>
    @endif
    <div class="row">
        <div class="category-container">
            <div class="card">
                <div class="card-header">
                    Add New Category
                </div>
                <div class="card-body">
                    <form action="/category" method="POST" class="text-center border border-light p-5">
                        {{csrf_field()}}
                        <div class="form-group form-group md-form">
                            <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid': ''}} mb-4" name="name" value="{{ old('title') }}" required placeholder="Name">
                        </div>
                        <div class="form-group form-group md-form">
                            <textarea class="form-control {{ $errors->has('description') ? ' is-invalid': ''}} mb-4" name="description" value="{{ old('description') }}" required placeholder="Description"></textarea>
                        </div>
                        <button class="btn btn-default btn-block" type="submit">Create</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="category-container">
            <div class="card">
                <div class="card-header">
                    Category List
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                            <td>{{$category->name}}</td>
                            <td>{{ $category->description }}</td>
                            <tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')

@endsection