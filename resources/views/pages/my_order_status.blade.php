@extends('layout.default')
@section('content')
    <style>
        .ber {
            font-size: 16px;
            font-weight: 500;
        }

        :root {
            --line-border-fill: #5CA904;
            --line-border-empty: rgba(205, 205, 180, 1);
            --text-empty: rgba(175, 175, 150, 1);
            --text-fill: rgba(74, 54, 50, 1);
            --background-color: #5CA904;
        }

        .port .progress-container {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 30px;
            max-width: 100%;
            width: 100%;
            margin-left: 10px;
        }

        .port .progress-container::before {
            content: '';
            background-color: var(--line-border-empty);
            position: absolute;
            top: 18px;
            left: 20px;
            transform: translateY(-50%);
            height: 4px;
            width: 100%;
            z-index: -1;
        }

        .port .progress {
            background-color: #5CA904;
            position: absolute;
            top: 7px;
            left: 27px;
            transform: translateY(-50%);
            height: 4px;
            max-width: 100%;
            width: 0%;
            z-index: 1;
            transition: 400ms ease;
        }

        .port .text-wrap {
            display: inline-block;
            text-align: center;
            width: 75px;
        }

        .port .text-wrap p {
            color: var(--text-fill);
            transition: 400ms ease;
            padding-top: 16px;
            margin: 0px;
        }

        .port .text-wrap.active p {
            font-weight: 400;
            color: var(--text-fill);
            transition: 400ms ease;
        }

        .port .circle {
            background-color: #5CA904;
            border: 3px solid var(--line-border-empty);
            color: var(--text-empty);
            font-weight: 700;
            border-radius: 50%;
            height: 15px;
            width: 15px;
            position: relative;
            /* Position the child element */
            left: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 400ms ease;
        }

        .port .text-wrap.active div.circle {
            border-color: #5CA904;
            color: var(--text-fill);
        }

        .port .btn {
            background-color: #5CA904;
            color: white;
            border: 0;
            border-radius: 5px;
            cursor: pointer;
            font-family: inherit;
            padding: 10px 30px;
            margin: 5px;
            font-size: 14px;
        }

        .port .btn:active {
            transform: scale(0.98);
        }


        .port .btn:focus {
            outline: 0;
        }

        .port .btn:disabled {
            background-color: var(--line-border-empty);
            cursor: not-allowed;
            color: #5CA904;
            transform: none;
        }
    </style>

    <section class="delivery_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="deliver_status">
                        <div class="row">
                            <div class="col-lg-6">
                                <h5 class="stroy"><strong>Delivery</strong> Address</h5>
                                @if (Auth::check())
                                    <p class="loosuiku"><strong>{{ Auth::user()->name }}</strong></p>
                                    @php
                                        $dh = App\Models\user_addres::where('id', Auth::user()->user_default_address_id)->first();
                                    @endphp
                                    @if ($adre = App\Models\product_order_user_adress::where('order_id', $order_id->order_id)->first())
                                        <p>Delivery at <strong>{{ $adre->address_line_one }}, {{ $dh->area_name }},
                                                {{ $adre->city }}- {{ $dh->pincode }}, {{ $dh->state }}</strong></p>

                                        <p><strong>Contact :</strong> {{ $adre->address_phone_number }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 pt-3 pb-3">
                    <div class="row orders">
                        <div class="col-lg-5">
                            @if ($orders = App\Models\ProductSlot::where('order_id', $order_id->order_id)->get())
                                {{-- @dd($orders); --}}
                                @foreach ($orders as $order_id1)
                                    <div class="">
                                        <div>
                                            <div class="coco  acoun">
                                                <div class="car1">
                                                    <div class="car1">

                                                        {{-- @dd($orders); ioio --}}

                                                        @if ($vrs = App\Models\product::where('id', $order_id1->product_id)->first())
                                                            <img src="{{ env('MAIN_URL') }}images/{{ $vrs->product_image }}"
                                                                class="img-fluid" alt="">
                                                        @endif
                                                        <div class="ioio">
                                                            @if ($vrs = App\Models\product::where('id', $order_id1->product_id)->first())
                                                                <h5>{{ $vrs->product_name }}</h5>
                                                            @endif
                                                            @if ($vrs = App\Models\product::where('id', $order_id1->product_id)->first())
                                                                <p>{{ $vrs->product_description }}</p>
                                                            @endif
                                                            @if ($mart = App\Models\product_varient::where('id', $order_id1->product_varient_id)->first())
                                                                @if ($mart->varient == 1)
                                                                    <h5>{{ $mart->value }}Liter</h5>
                                                                @elseif ($mart->varient == 2)
                                                                    <h5>{{ $mart->value }}ml</h5>
                                                                @elseif ($mart->varient == 3)
                                                                    <h5>{{ $mart->value }}grm</h5>
                                                                @elseif ($mart->varient == 4)
                                                                    <h5>{{ $mart->value }}kg</h5>
                                                                @elseif ($mart->varient == 5)
                                                                    <h5>{{ $mart->value }}nos</h5>
                                                                @endif
                                                            @endif
                                                            <div class="whole-ru">
                                                                @if ($vrs = App\Models\product_varient::where('id', $order_id1->product_varient_id)->first())
                                                                    {{-- @dd($vrs) --}}
                                                                    <div class="ret">₹{{ $vrs->offer_price }}</div>
                                                                @endif
                                                                <div class="ret1">Qty: {{ $order_id1->quantity }}</div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                                {{-- href="/my_order_status/{{ $order_id1->id }}" --}}

                                                @php
                                                $order_id_track11 = App\Models\ProductOrder::where('order_id', $order_id->order_id)->first()
                                                @endphp
                                                @if ($order_id_track11->delivery_status < 2)
                                                @if ($order_id1->is_cancelled == 1)
                                                    <a data-bs-toggle="modal" class="btn home-btn6  cancellatiomodel123">
                                                        Product Cancelled</a>
                                                @endif
                                                @if ($order_id1->is_cancelled == 2)
                                                    <a data-bs-toggle="modal" class="btn home-btn6  cancellatiomodel123">
                                                        Processing</a>
                                                @endif
                                                @if ($order_id1->is_cancelled == 0)
                                                    <a data-bs-toggle="modal" data-bs-target="#cancellmodel"
                                                        data-id="{{ $order_id1->id }}"
                                                        class="btn home-btn6  cancellatiomodel123"
                                                        id="cancellatiomodel">Cancel
                                                        Order</a>
                                                @endif
                                                  @endif



                                            </div>
                                            {{-- @if ($order_id1->is_cancelled == 2)
                                            <p>Product Cancelled</p>
                                        @endif
                                        @if ($order_id1->is_cancelled == 1)
                                            <p>Processing</p>
                                        @endif
                                        @if ($order_id1->is_cancelled == 0)
                                            <p>Product Not Cancelled</p>
                                        @endif --}}
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            @if ($delivery = App\Models\ProductOrder::where('order_id', $order_id->order_id)->first())
                                <div class="text">
                                    @if ($delivery->delivery_charge == 0)
                                        <h5 class="ber">Delivery Charge: Free</h5>
                                    @else
                                        <h5 class="ber">Delivery Charge: ₹{{ $delivery->delivery_charge }}</h5>
                                    @endif

                                    <!--@if ($delivery->discount_amount == 0)-->
                                    <!--    <h5 class="ber ">Coupon: Free</h5>-->
                                    <!--@else-->
                                    <!--    <h5 class="ber ">Coupon: <span class="text-danger">-->
                                    <!--            -₹{{ $delivery->discount_amount }}</span></h5>-->
                                    <!--@endif-->

                                   @if ($delivery->discount_amount)
                                          <h5 class="ber ">Coupon: <span class="text-danger">
                                                -₹{{ $delivery->discount_amount }}</span></h5>
                                    @endif

                                    <h5 class="ber">Total: ₹{{ $delivery->total_amount }}</h5>


                                </div>
                            @endif
                        </div>
                        <div class="col-lg-7  port">
                            <div class="total_track">
                                <p class="vere">Order Confirmed</p>
                                <p class="vere">Shipped</p>
                                <p class="vere">Out of delivery</p>
                                <p class="vere">Delivered</p>
                            </div>
                            <div class="track_order_bar">
                                <div class="progress-container">
                                    <div class="progress" id="progress"></div>
                                    <div class="text-wrap active">
                                        <div class="circle"></div>
                                        {{-- <p class="text">18-10-2023</p>
                                    <p>01:15</p> --}}
                                    </div>
                                    <div class="text-wrap">
                                        <div class="circle"></div>
                                        {{-- <p class="text">20-10-2023</p>
                                    <p>01:15</p> --}}
                                    </div>
                                    <div class="text-wrap">
                                        <div class="circle"></div>
                                        {{-- <p class="text">22-10-2023</p>
                                    <p>01:15</p> --}}
                                    </div>
                                    <div class="text-wrap">
                                        <div class="circle"></div>
                                        {{-- <p class="text">23-10-2023</p>
                                    <p>01:15</p> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="total_track1">
                                @if ($order_id_track = App\Models\ProductTracking::where('order_id', $order_id->order_id)->get())
                                    @foreach ($order_id_track as $ter)
                                        @if ($ter->delivery_status == 0)
                                            <div class="vertio">
                                                <p class="text">{{ optional($ter->created_at)->format('d-m-Y') }}</p>
                                                <p>{{ optional($ter->created_at)->format('H:i') }}</p>
                                            </div>
                                        @endif
                                        @if ($ter->delivery_status == 1)
                                            <div class="vertio">
                                                <p class="text">{{ optional($ter->created_at)->format('d-m-Y') }}</p>
                                                <p>{{ optional($ter->created_at)->format('H:i') }}</p>
                                            </div>
                                        @endif
                                        @if ($ter->delivery_status == 2)
                                            <div class="vertio">
                                                <p class="text">{{ optional($ter->created_at)->format('d-m-Y') }}</p>
                                                <p>{{ optional($ter->created_at)->format('H:i') }}</p>
                                            </div>
                                        @endif
                                        @if ($ter->delivery_status == 4)
                                            <div class="vertio">
                                                <p class="text">{{ optional($ter->created_at)->format('d-m-Y') }}</p>
                                                <p>{{ optional($ter->created_at)->format('H:i') }}</p>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <button class="btn" id="back" disabled hidden>&larr; Back</button>
                            <button class="btn next" hidden data-triggerval="{{ $order_id1->delivery_status }}">Next
                                &rarr;</button>



                            {{-- @dd($order_id->delivery_status); --}}
                            @if ($order_id->delivery_status == 0)
                                <h5 class="last_h" hidden><i class="fa fa-circle  cret1" aria-hidden="true"></i>pending</h5>
                            @elseif ($order_id->delivery_status == 1)
                                <h5 class="last_h" hidden><i class="fa fa-circle  cret1" aria-hidden="true"></i>Packing</h5>
                            @elseif ($order_id->delivery_status == 2)
                                <h5 class="last_h" hidden><i class="fa fa-circle  cret1" aria-hidden="true"></i>Dispatched
                                </h5>
                            @elseif ($order_id->delivery_status == 3)
                                <h5 class="last_h" hidden><i class="fa fa-circle  cret1" aria-hidden="true"></i>Delivery
                                </h5>
                            @elseif ($order_id->delivery_status == 4)
                                <h5 class="last_h" hidden><i class="fa fa-circle  cret" aria-hidden="true"></i>
                                    Delivered on </h5>
                            @endif


                        </div>
                        <div class="col-lg-12 pt-3">
                            @if ($delivery->payment_status == 1)
                            <h5 class="ber ">Payment Method: Online(Paid) </h5>
                        @endif
                        @if ($delivery->payment_status == 2)
                            <h5 class="ber">Payment Method: Cash on delivery(Unpaid) </h5>
                        @endif
                        @if ($delivery->payment_status == 3)
                            <h5 class="ber">Payment Method: Cash on delivery(Paid) </h5>
                        @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>




    {{-- ================Cancel modal  ===================== --}}
    <div class="modal fade  loginform" id="cancellmodel" tabindex="-1" aria-labelledby="loginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container reg_container">
                        <div class="row  align-items-center ">
                            <div class="col-lg-12 loher">
                                <div class="logses_ful restedq">
                                    {{-- forpin --}}
                                    <h5 class="wel_log">Cancel Product<img src="/assets/images/forpin.png"
                                            class="img-fluid" width="25px" alt=""></h5>
                                    {{-- <p class="groce">Enter your mobile number to change
                                your password</p> --}}
                                    <form action="" class="cancel_product_class">
                                        <div class="row">
                                            <input type="text" hidden name="product_slot_id" class="productslot_id">
                                            <div class="col-lg-12">
                                                <label for="PhoneNumber" class="fdsfddfd pt-1 pb-1">Comments</label>
                                                <textarea name="reason_for_cancel" class="form-control" id="" cols="100" rows="5"></textarea>
                                            </div>
                                            <div class="col-lg-4 pt-2">
                                                <div class="tree text-center">
                                                    <button type="button" class="btn  home-btn3" id="cancel_productses">
                                                        submit</button>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 pt-2">
                                                <button type="button" class="btn killer_cop"
                                                    data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{-- <div class="col-lg-6">
                        <img src="/assets/images/for.png" class="img-fluid  logs_img" alt="">
                    </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var triggerval = parseInt($(".btn.next").data("triggerval"));

            function triggerClickWithDelay() {
                $(".btn.next").trigger("click");
            }

            for (var i = 1; i < triggerval; i++) {
                setTimeout(triggerClickWithDelay, i *
                    1500);
            }
        });
    </script>

    <script>
        $(document).on('click', '#cancellatiomodel', function() {
            var id = $(this).data('id');
            $('.productslot_id').val(id);
        });
    </script>
@endsection
