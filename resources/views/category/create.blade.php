@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="page-header justify-content-end">
            <button type="submit" form="category"  class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Save" ><i class="fa fa-save"></i></button>
        </div>
        <div class="card">

            <div class="card-header">
                <h5 class="card-title"><i class="fa fa-pencil"></i> Create Category</h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" id="category" action="{{ route('category.store') }}" method="post">
                    @csrf
                    @include('category.partials.form')
                </form>
            </div>
        </div>
    </div>


@endsection