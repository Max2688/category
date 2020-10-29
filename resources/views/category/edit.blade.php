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
                <h5 class="card-title"><i class="fa fa-pencil"></i> Edit Category</h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" id="category" action="{{ route('category.update',$category) }}" method="post">
                    <input type="hidden" name="_method"  value="put"/>
                    @csrf
                    @include('category.partials.form')
                </form>
            </div>
        </div>
    </div>


@endsection