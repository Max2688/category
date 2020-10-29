<p>
    <label for="title">Title</label>
    <input type="text" id="title" name="title" class="form-control" placeholder="Title" value="{{$category->title ?? ''}}" />
</p>
<p>
    <label for="sort_order">Sort Order</label>
    <input type="text" id="sort_order" name="sort_order" class="form-control" placeholder="Sort Order" value="{{$category->sort_order ?? ''}}" />
</p>
<div class="form-group">
    <select name="parent_id" class="form-control">
        <option value=" ">-- no parent category --</option>
        @include('category.categories')
    </select>
</div>