@if(count($combinations[0]) > 0)
<table class="table table-bordered aiz-table">
    <thead>
        <tr>
            <td class="text-center">
                {{translate('Variant')}}
            </td>
            <td class="text-center">
                {{translate('Variant Price')}}
            </td>
            <td class="text-center" data-breakpoints="lg">
                {{translate('SKU')}}
            </td>
            <td class="text-center" data-breakpoints="lg">
                {{translate('Quantity')}}
            </td>
            <td class="text-center" data-breakpoints="lg">
                {{translate('Photo')}}
            </td>
        </tr>
    </thead>
    <tbody>

        @foreach ($combinations as $key => $combination)
            @php
                $variation_available = false;
                $sku = '';
                $color_key = $colors_active ? ($combination[0] ?? '') : 'default';
                $first_color_combination = true;
                $color_group_count = 0;
                $color_group_index = 0;
                foreach ($combinations as $group_combination) {
                    if (($colors_active ? ($group_combination[0] ?? '') : 'default') === $color_key) {
                        $color_group_count++;
                    }
                }
                foreach (array_slice($combinations, 0, $key) as $previous_combination) {
                    if (($colors_active ? ($previous_combination[0] ?? '') : 'default') === $color_key) {
                        $first_color_combination = false;
                        $color_group_index++;
                    }
                }
                $middle_color_combination = $color_group_index === (int) floor(($color_group_count - 1) / 2);
                foreach (explode(' ', $product_name) as $key => $value) {
                    $sku .= substr($value, 0, 1);
                }

                $str = '';
                foreach ($combination as $key => $item){
                    if($key > 0 ) {
                        $str .= '-'.str_replace(' ', '', $item);
                        $sku .='-'.str_replace(' ', '', $item);
                    }
                    else {
                        if($colors_active == 1) {
                            $color_name = \App\Models\Color::where('code', $item)->first()->name;
                            $str .= $color_name;
                            $sku .='-'.$color_name;
                        }
                        else {
                            $str .= str_replace(' ', '', $item);
                            $sku .='-'.str_replace(' ', '', $item);
                        }
                    }
                    $stock = $product->stocks->where('variant', $str)->first();
                    // if($stock != null) {
                    //     $variation_available = true;
                    // }
                }
            @endphp
            @if(strlen($str) > 0)
            <tr class="variant @if($first_color_combination && $key > 0) color-group-start @endif" @if($first_color_combination && $key > 0) style="border-top: 2px solid #dee2e6;" @endif>
                <td>
                    <label for="" class="control-label">{{ $str }}</label>
					@if(!$middle_color_combination)
						<input type="hidden" name="img_{{ $str }}" class="selected-files color-variant-image-linked" data-color-key="{{ $color_key }}" value="">
					@endif
                </td>
                <td>
                    <input type="number" lang="en" name="price_{{ $str }}" value="@php
                            if ($product->unit_price == $unit_price) {
                                if($stock != null){
                                    echo $stock->price;
                                }
                                else {
                                    echo $unit_price;
                                }
                            }
                            else{
                                echo $unit_price;
                            }
                           @endphp" min="0" step="0.01" class="form-control" required>
                </td>
                <td>
                    <input type="text" name="sku_{{ $str }}" value="@php
                            if($stock != null) {
                                echo $stock->sku;
                            }
                            else {
                                echo $str;
                            }
                           @endphp" class="form-control">
                </td>
                <td>
                    <input type="number" lang="en" name="qty_{{ $str }}" value="@php
                            if($stock != null){
                                echo $stock->qty;
                            }
                            else{
                                echo '10';
                            }
                           @endphp" min="0" step="1" class="form-control" required>
                </td>
                @if($first_color_combination)
                <td rowspan="{{ $color_group_count }}" class="align-middle">
                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse') }}</div>
                            </div>
                            <div class="form-control file-amount text-truncate">{{ translate('Choose File') }}</div>
                            <input type="hidden" name="img_{{ $str }}" class="selected-files color-variant-image" data-color-key="{{ $color_key }}" value="@php
                                if($stock != null){
                                    echo $stock->image;
                                }
                            @endphp">
                        </div>
                        <div class="file-preview box sm"></div>
                </td>
                @endif
            </tr>
            @endif
        @endforeach

    </tbody>
</table>
@endif
