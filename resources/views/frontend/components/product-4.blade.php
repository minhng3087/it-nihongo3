<div class="item">
    <div class="avarta"><a href="{{ route('home.single.product', $item->slug) }}"><img src="{{ $item->image }}" class="img-fluid" width="100%" alt=""></a></div>
    <div class="info">
        <h4><a href="{{ route('home.single.product', $item->slug) }}">{{ $item->name }}</a></h4>
        <div class="vote">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
        </div>
        @if($item->sale_price)
            <div class="price"><span>{{ number_format($item->sale_price,0, '.', '.') }}đ</span></div>
            <div class="price"><del><span>{{ number_format($item->regular_price,0, '.', '.') }}đ</span></del></div>
        @else
             <div class="price"><span>{{ number_format($item->regular_price,0, '.', '.') }}đ</span></div>

        @endif

    </div>
</div>