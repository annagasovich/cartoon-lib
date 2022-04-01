@extends('layouts.app')

@section('title', $cartoon->name)

@section('sidebar')
    @parent
    {{--some_content--}}
@endsection

@section('content')
<h1>{{$cartoon->name}}</h1>

    <div class="">
        <div class="container">

            <div id="cartoon-description" class="row">
                <div class="col-md-10">{!! $cartoon->descr !!}</div>
                <div class="col-md-2">
                    @include('cartoon.icons.main_icons')
                </div>
            </div>

            <div id="cartoon-content" class="row">
                <div class="col-md-8">
                    <iframe src="{{$cartoon->video_link}}"
                                              class="main-video"
                                              title="YouTube video player" frameborder="0"
                                              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                              allowfullscreen></iframe>
                </div>
                <div class="col-md-4 gallery">
                    <img class="img-fluid" src="/img/placeholder.jpg" alt="">
                    <img class="img-fluid" src="/img/placeholder.jpg" alt="">
                    <img class="img-fluid" src="/img/placeholder.jpg" alt="">
                </div>
            </div>

            <div id="cartoon-info" class="row">
                <div class="col-md-5">
                    <h2>О мультфильме</h2>

                    <table class="table">
                        <tbody>
                        <tr>
                            <td>Студия</td>
                            <td>{{ $cartoon->studio->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Год</td>
                            <td>{{ $cartoon->year  }}</td>
                        </tr>
                        <tr>
                            <td>Создатели</td>
                            <td>{{ '-' }}</td>
                        </tr>
                        <tr>
                            <td>Жанры</td>
                            <td>@include('parts.tag_list', ['data' => $cartoon->genres])</td>
                        </tr>
                        <tr>
                            <td>Тип анимации</td>
                            <td>{{ '-' }}</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>

            <h2>Похожее:</h2>
            <div id="cartoon-similar" class="row">
                @foreach($cartoon->similar() as $similar)
                <div class="col-md-3">
                    @include('cartoon.parts.similar_item', ['item' => $similar])
                </div>
                @endforeach
            </div>
        </div>
    </div>


<script>
    $(document).ready(function () {
            $('.gallery').slick({
                slidesToShow: 2,
                centerMode: true,
                touch: true,
                vertical: true
            });
        }
    );
</script>


@endsection
