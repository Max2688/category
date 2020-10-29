@foreach ($categories as $categoryItem)
    <option value="{{ $categoryItem->id ?? '' }}"
            @isset ($category->id)

            @if ($category->parent_id == $categoryItem->id)
            selected=""
            @endif

            @if ($category->id == $categoryItem->id)
            disabled=""
            @endif

            @endisset
    >
        {{ $delimiter ?? '' }}{{ $categoryItem->title ?? '' }}
    </option>

    @isset ($categoryItem->categories)
    @include('category.categories', [
        'categories' => $categoryItem->categories,
        'delimiter' => ' - ' . $delimiter
    ])
    @endisset

@endforeach