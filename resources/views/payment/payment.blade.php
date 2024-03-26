<h4 style="color: white;">Hai - {{$order_details->order_id}}</h4>
<h4 style="color: white;">Total Amount - {{$order_details->total_amount}}</h4>

<style type="text/css">
	body
	{
		background-color:black;
		background-size:cover;
		background-position: center;
		background-repeat: no-repeat;
		height:100vh;

	}
	.razorpay-payment-button
	{
		position: absolute;
		background-color:pink;
		top:50%;
		left:50%;
		transform:translate(-50%,-50%);
		width:200px;
		height:70px;
		font-size:25px;
		  background-color: #f5821f; /* Green */
		  border: none;
		  color: white;
		  padding: 15px 32px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 20px;
		  border-radius:5px;
}

</style>

{{-- <input type="text" name="order_id" value="{{$order_details->order_id}}" readonly/></td> --}}
{{-- <form method="POST" action="updatepaymentstatus">
    @csrf

    @if( $order_details = App\Models\ProductOrderUserAddress::where('order_id',$order_details->order_id)->first())
    <script src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="{{ env('RAZORPAY_KEY') }}"
    data-amount="{{ $order_details->total_amount *100}}"
    data-buttontext="PAY NOW"
    data-name="Healsyns"
    data-description="Healsyns Payment"
    data-image="./assets/img/logo.png"
    data-prefill.name="{{ $order_details->us_id }}"
    data-prefill.email="{{ $order_details->email}}"
    data-theme.color="#ff7529">
 </script>
 <input type="hidden" name="order_id" value="{{ order_id }}">

    @endif

</form> --}}

<form method="POST" action="updatepaymentstatus">
    @csrf

    @if($order_details)
    <script src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="{{ env('RAZORPAY_KEY') }}"
    data-amount="{{ $order_details->total_amount * 100 }}"
    data-buttontext="PAY NOW"
    data-name="Healsyns"
    data-description="Healsyns Payment"
    data-image="./assets/img/logo.png"
    data-prefill.name="{{ $order_details->us_id }}"
    data-prefill.email="{{ $order_details->email}}"
    data-theme.color="#ff7529">
 </script>
 <input type="hidden" name="order_id" value="{{ $order_details->order_id }}">
@endif
</form>
