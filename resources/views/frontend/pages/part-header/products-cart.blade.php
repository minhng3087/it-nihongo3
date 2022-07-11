
@if(Cart::content())
    <div class="select-items">
        <table>
            <tbody>
                @foreach (Cart::content() as $item)
                    <tr>
                        <td class="si-pic"><img src="{{ $item->options->image }}" alt="{{ $item->name }}"></td>
                        <td class="si-text">
                            <div class="product-selected">
                                <p>{{ number_format($item->price, 0, '.', '.') }}đ x {{ $item->qty }}</p>
                                <h6>{{ $item->name }}</h6>
                            </div>
                        </td>
                        <td class="si-close">
                            <i class="ti-close" data-id="{{ $item->rowId }}" value="{{ $item->qty }}"></i>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="select-total">
        <span>TỔNG GIÁ</span>
        <h5>{{ number_format(Cart::total(), 0, '.', '.') }}đ</h5>
    </div>
    <div class="select-button">
        <a href="{{ route('home.cart') }}" class="primary-btn view-card">XEM GIỎ HÀNG</a>
        <a href="{{ route('home.check-out') }}" class="primary-btn checkout-btn">THANH TOÁN</a>
    </div>
@else
    <h6>Giỏ hàng trống</h6>
@endif