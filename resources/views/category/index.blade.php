@extends('layouts.app')

@section('content')

    <div class="container-fluid">

        <div class="page-header justify-content-between">
            <span class="box-title align-self-center">Categories</span>
            <a class="btn btn-primary" href="{{ route('category.create') }}"><i class="fa fa-plus"></i></a>
        </div>
        <div class="card border-0">
            @forelse( $categories as $category)
                <ul>
                    <li style="margin-bottom: 20px">
                        <div style="display: flex;align-items: center;margin-bottom: 20px">
                            {{ $category->title ?? ''}} -- {{ $category->sort_order ?? ''}} --
                            <form method="post" onsubmit="if( confirm('Delete?') ) { return true;} else {return false}" action="{{route('category.destroy' , $category)}}">
                                <input type="hidden" name="_method"  value="delete"/>
                                @csrf
                                <a class="btn btn-app" href="{{ route('category.edit', $category) }}"><i class="fa fa-edit icon-black"></i></a>
                                <button type="submit" class="btn btn-app button-style" ><i class="fa fa-trash-o icon-black"></i></button>

                            </form>
                        </div>
                        <ul>
                            @foreach ($category->categoriesWithChildren as $childCategory)
                                @include('category.child', ['child_category' => $childCategory])
                            @endforeach
                        </ul>
                    </li>
                </ul>
            @empty
                <p>No categories created!</p>
            @endforelse
        </div>
    </div>


@endsection