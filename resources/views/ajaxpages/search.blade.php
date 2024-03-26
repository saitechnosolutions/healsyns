@if (count($products) > 0)
    @foreach ($products as $product)
        <a href="/singleproducts/{{ $product->id }}/{{ $product->product_id }}" class="first_node" id="search_group">
            <img src="{{ env('MAIN_URL') }}images/{{ $product->product_image }}" class="img-fluid" width="70px" alt="">
            <div class="para_ht">
                <h5 class="gro1">{{ $product->product_name }}</h5>
                <h5 class="he_para11">₹{{ $product->offer_price }} <span class="he_para12">₹{{ $product->mrp_price }}</span> </h5>
            </div>
        </a>
    @endforeach
@else
    <div class="no-product-message">
        No products found.
    </div>
@endif
