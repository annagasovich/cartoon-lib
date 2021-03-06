
<div class="card mb-4 box-shadow">
    <a href="{{$item->full_url}}">
        <img class="img-fluid card-img-top" src="/img/placeholder.jpg" alt="">
    </a>
    <div class="card-body">
        <h3>{{$item->name}}</h3>
        <div class="card-text">
            <p>{{ $item->studio->name ?? '' }}, {{ $item->year  }}</p>
            <p>@include('parts.tag_list', ['data' => $item->genres])</p>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                @include('cartoon.icons.main_icons')
            </div>
        </div>
    </div>
</div>
