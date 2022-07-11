
<div class="modal-body">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <div class="preview">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="slide-thumbs">
                    <div class="avarta" style="border: 1px solid #ddd;"><img class="" src="{{ @$product->image }}" class="img-fluid" width="100%" alt="{{ @$product->name }}"></div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="info-prev">
                    <div class="cate">
                        <h1>{{ @$product->name }} </h1>
                        <div class="vote">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>	
                        <div class="price">{{ number_format($product->regular_price,0, '.', '.') }}đ</div>
                        <div class="desc">
                            {{ @$product->sort_desc }}
                            @if (count($product->ProductGift))
                                @foreach ($product->ProductGift as $gift)
                                    <?php $indexParent = $loop->index; ?>
                                    @if ($gift->type == 'options')
                                        <li>{!! $gift->desc !!}</li>
                                        <ul>
                                            <?php $options_gift = json_decode( $gift->value );?>
                                            @if (!empty($options_gift->list))
                                                @foreach ($options_gift->list as $key => $value)
                                                    <li>
                                                        <input type="radio" id="sale-{{ $loop->index + 1 }}-{{ $indexParent }}" name="radiosale[{{ $indexParent }}]" class="apply-gift" value="{{ $value->value }} " data-value="{{ $value->value }}">
                                                        <label for="sale-{{ $loop->index + 1 }}-{{ $indexParent }}">{{ $value->title }}</label>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    @else
                                        <li>{!! $gift->desc !!}</li>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="quantity-add">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <div class="quantity">
                                        <span class="mont">Số lượng:</span>
                                        <div class="number-spinner">
                                            <input type="text" class="pl-ns-value" value="10" maxlength="5">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="add-cart"><a href="">Thêm vào giỏ hàng</a></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
