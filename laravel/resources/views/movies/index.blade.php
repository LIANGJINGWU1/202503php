@extends('movies.layout')
{{--@section('content')--}}
{{--    <h1>电影展示</h1>--}}
{{--    <div style = "display: flex;flex-wrap: wrap;">--}}
{{--    @foreach($movies as $movie)--}}
{{--        <div style = "margin: 10px; text-align: center">--}}
{{--            <img src="{{$movie->cover_img}}" alt="{{$movie->title}}" width="200px">--}}
{{--            <h3>{{$movie->title}}</h3>--}}
{{--            <h4>{{$movie->code}}</h4>--}}
{{--            <p></p>--}}
{{--        </div>--}}
{{--    @endforeach--}}
{{--    </div>--}}
{{--@endsection--}}
@section('content')
    <h2 style="text-align:center; margin-bottom: 30px;">🎬 精选电影展示</h2>

    <div style="
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    ">
        @foreach ($movies as $movie)
            <div style="
                background: #fff;
                border-radius: 12px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.08);
                overflow: hidden;
                transition: transform 0.2s;
            " onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'">
                <img src="{{ $movie->cover_img }}" alt="{{ $movie->title }}" style="
                    width: 100%;
                    height: 300px;
                    object-fit: cover;
                ">
                <div style="padding: 15px;">
                    <h3 style="font-size: 1.1rem; margin: 0 0 10px;">{{ $movie->title }}</h3>
                    <p style="font-size: 0.85rem; color: #666;">🎯 标签：{{ $movie->tag }}</p>
                </div>
            </div>
        @endforeach
    </div>
{{--    <div style="text-align: center; margin-top: 30px;">--}}
{{--        {{ $movies->links() }}--}}
{{--    </div>--}}
    <div class="flex justify-center mt-8">
{{--        {{ $movies->links() }}--}}
        {{ $movies->links('pagination::tailwind') }}
{{--        {{ $movies->links('pagination::simple-tailwind') }}--}}
{{--        消除提示--}}
    </div>
@endsection
