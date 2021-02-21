<div class="box_filter">
    <div class="price-range-block">
        <div class="sliderText">Lọc theo giá</div>
        <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
        <div class="wp_dflex d-flex">
            <div class="box_value d-flex">
                <button class="price-range-search" id="filter-products">Lọc</button>
                <div class="text">
                    <span>Giá:</span>
                </div>
                <div class="input d-flex">
                    <input type="text" min=0 max="3900000" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field" />đ
                </div>
                <span>&nbsp;-&nbsp;</span>
                <div class="input d-flex">
                    <input type="text" min=0 max="4000000" oninput="validity.valid||(value='4000000');" id="max_price" class="price-range-field" />đ
                </div>
            </div>
        </div>
        <input type="hidden" name="curent_url" value="{{url()->current()}}">
        <input type="hidden" name="price_from">
        <input type="hidden" name="price_to">
    </div>
</div>