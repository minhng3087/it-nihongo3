@if (count($filters))
    @foreach ($filters as $filter)
        <?php $indexLoop = $loop->index + 2; ?>
        <?php if(!empty($filter->content)) { 
            $content = json_decode($filter->content);
        } ?>
        <div class="box-bar">
            <div class="title-bar">{{ $filter->name }}</div>
            <div class="list-cate">
                <ul >
                @if (!empty($content->filter))
                    @foreach ($content->filter as $key => $value)
                        @if ($filter->type == 'price')
                            <li>
                                <input type="radio" id="filter-{{ $key }}" name="filter-{{ $indexLoop }}" value="{{ $value->min_value.'-'.$value->max_value }}" data-type="{{ $filter->type }}"
						 		class="filter-check-box {{ $filter->type }}" data-id="input-{{ $filter->type }}" data-name="{{ $value->name }}" >
                                <label for="filter-{{ $key }}">{{ $value->name }} </label>
                            </li>
                        @elseif($filter->type == 'brand')
                            <?php $brand = \App\Models\Categories::find($value->brand_id); ?>
                            <li>
                                <input type="checkbox" id="filter-{{ $key }}" name="filter-{{ $indexLoop }}" value="{{ $value->brand_id }}" data-type="{{ $filter->type }}"
							 	class="filter-check-box {{ $filter->type }}" data-id="input-{{ $filter->type }}" data-name="{{ $value->name }}" >
                                <label for="filter-{{ $key }}">{{ $value->name }}</label>
                            </li>
                        @else
                            <li>
                                <input type="checkbox" id="filter-{{ $key }}" name="filter-{{ $indexLoop }}" value="{{ @$value->value }}" data-type="{{ $filter->type }}"
							 	class="filter-check-box {{ $filter->type }}" data-id="input-{{ $filter->type }}" data-name="{{ @$value->name }}">
                                <label for="filter-{{ $key }}">{{ $value->name }} </label>
                            </li>
                        @endif
                    @endforeach
                @endif
                
                </ul>
                <input type="hidden" id="input-{{ $filter->type }}" value="" class="input-param" data-type="{{ $filter->type }}">
            </div>
        </div>
    
    @endforeach

@endif

