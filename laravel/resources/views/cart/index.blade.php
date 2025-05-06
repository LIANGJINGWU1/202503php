<h2>我的购物车</h2>

@if(count($cart) > 0)
    @foreach($cart as $item)
        <div>
            <strong>{{ $item['title'] }}</strong>
            <form method = "POST" action = "{{ route('cart.remove') }}">
                @csrf
                <input type = "hidden" name = "code" value="{{ $item['code'] }}">
            </form>
        </div>
    @endforeach
@else
    <p>购物车为空</p>
@endif
