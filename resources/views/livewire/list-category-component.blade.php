@foreach($categories as $category)
<li>
    <a href="{{route('product.category',['slug'=>$category->slug])}}" class="surfsidemedia-font-dress">{{$category->name}}</a>
</li>
@endforeach