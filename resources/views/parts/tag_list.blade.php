<div class="tag_list">
    @foreach($data as $item)
        <a href="{{$item->full_url}}">{{$item->name}}</a>
    @endforeach
</div>
