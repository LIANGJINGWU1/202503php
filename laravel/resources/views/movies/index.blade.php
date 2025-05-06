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
{{--    <div class="flex justify-between items-center">--}}

{{--    </div>--}}

<nav class="bg-gray-800 text-white p-4 flex justify-between items-center">
{{--    <ul class="max-w-7xl mx-auto px-4 flex items-center space-x-6 h-14">--}}
      <ul  style="max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; gap: 20px; height: 56px; align-items: center">
        <li><a href="">主页</a></li>
        <li><a href="">无码区</a></li>
        <li><a href="">欧美区</a></li>
        <li><a href="{{ route('cart.index') }}">购物车</a></li>
    </ul>
</nav>
<nav class="bg-gray-800 text-white">
    <div style="
        max-width: 1000px;
        margin: 0 auto;
        padding: 0 20px;
        display: flex;
        gap: 20px;
        height: 56px;
        align-items: center;
    ">
        <ul style="display: flex; gap: 20px;">
            <li><a href="/">主页</a></li>
            <li><a href="#">无码区</a></li>
            <li><a href="#">欧美区</a></li>
            <li><a href="{{ route('cart.index') }}">购物车</a></li>
        </ul>
    </div>
</nav>
    <div
        style="
        max-width: 1000px;
        margin: 0 auto;
        padding: 20px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;"
    >
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
                <form method="POST" action="{{route('cart.add')}}">
                    @csrf
                    <input type = "hidden" name = "code" value = "{{$movie->code}}">
                    <button type = "submit">加入购物车</button>
                </form>
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
