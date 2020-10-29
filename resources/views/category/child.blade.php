<li style="display: flex;align-items: center;margin-bottom: 20px">{{ $child_category->title }} -- {{ $child_category->sort_order }} --
    <form method="post" onsubmit="if( confirm('Delete?') ) { return true;} else {return false}" action="{{route('category.destroy' , $child_category)}}">
        <input type="hidden" name="_method"  value="delete"/>
        @csrf
        <a class="btn btn-app" href="{{ route('category.edit', $child_category) }}"><i class="fa fa-edit icon-black"></i></a>
        <button type="submit" class="btn btn-app button-style" ><i class="fa fa-trash-o icon-black"></i></button>
    </form>
</li>

@if ($child_category->categories)
   <ul>
       @foreach ($child_category->categories as $childCategory)
           @include('category.child', ['child_category' => $childCategory])
       @endforeach
   </ul>
@endif
