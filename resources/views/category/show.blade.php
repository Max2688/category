@extends('layouts.app')

@section('content')
    <ul>
        <li> {{ $category->title ?? ''}}
            <ul>
                @foreach ($category->categoriesWithChildren as $childCategory)
                    @include('category.child', ['child_category' => $childCategory])
                @endforeach
            </ul>
        </li>
    </ul>
@endsection