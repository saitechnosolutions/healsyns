<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <script>
    	window.onload = function() {
    		var d = new Date().getTime();
    		document.getElementById("tid").value = d;
    	};
    </script>
<?php
// include("db.php");
?>
</head>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0 20px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.web-logo{
    text-align: center;
}

img{
    margin: 20px 0 30px 0px;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 10px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

label{
    maring-bottom: 10px;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  /*background-color: #f2f2f2;*/
  padding: 20px;
}
</style>
<body>
        <!-- web logo -->
        <div class="web-logo">
            <img src="./assets/img/logo.png" class="white-logo  img-fluid" alt="">
        </div>
        <form method="post" name="customerData" action="/payment_request">
            @csrf
		<!--<table width="40%" height="100" border='1' align="center"><caption><font size="4" color="blue"><b></b></font></caption></table>-->
			<table align="center">
				<!--<tr>-->
				<!--	<td>Parameter Name:</td><td>Parameter Value:</td>-->
				<!--</tr>-->
				<!--<tr>-->
				<!--	<td colspan="2"> Compulsory information</td>-->
				<!--</tr>-->
				<tr>
					<td>
					    <input type="hidden" name="tid" id="tid" readonly />
					    <input type="hidden" name="user_id" value="{{$order_details->user_id}}" readonly />
					</td>
					<!--<td>TID	:</td><td><input type="text" name="tid" id="tid" value="" /></td>-->
				</tr>
				<tr>
					<td><input type="hidden" name="merchant_id" value="3085675"/></td>
				</tr>
				<tr>
					<td>
					    <label>Order ID</label>
					    <input type="text" name="order_id" value="{{$order_details->order_id}}" readonly/></td>
				</tr>
				<tr>
					<td><label>Amount</label>
					    <input type="text" name="amount" value="{{$order_details->total_amount}}" readonly/></td>
					    <input type="hidden" name="grand_total_amount" value="{{$order_details->grand_total_amount}}" readonly/></td>
					    <input type="hidden" name="gst_amount" value="{{$order_details->gst_amount}}" readonly/></td>
					    <input type="hidden" name="discount_amount" value="{{$order_details->discount_amount}}" readonly/></td>
					      <input type="hidden" name="delivery_amt" value="{{$delivery_amt}}" readonly/></td>
				</tr>

				<tr>
				    <input type="hidden" name="currency" value="INR"/>
					<td><input type="hidden" name="redirect_url" value="https://homegrow.co.in/payment_response_web"/></td>
					<input type="hidden" name="cancel_url" value="https://homegrow.co.in/payment_response_web"/>
					<input type="hidden" name="language" value="EN"/>

				</tr>

		        <tr>
		        	<td><label>Customer Name</label>
		        	      <input type="text" name="billing_name" value="{{$order_details->us_id}}" readonly/>
		        	    <input type="hidden" name="billing_address" value="{{$order_details->address}}"/>
		        	    <input type="hidden" name="billing_city" value="{{$order_details->city}}"/>
		        	    <input type="hidden" name="billing_state" value="{{$order_details->state}}"/>

		        	    @php
                            $myArray = $order_details->slots; // Your array
                            $serializedArray = json_encode($myArray); // Serialize array to JSON
                        @endphp
		        	    <input type="hidden" name="product_slots" value="{{$serializedArray}}"/>



		        	    <input type="hidden" name="proweight" value=""/>
		        	    <input type="hidden" name="proname" value=""/>
		        	    <input type="hidden" name="proqty" value=""/>
		        	    <input type="hidden" name="unitprice" value=""/>
		        	    <input type="hidden" name="subtotal" value=""/>
		        	    <input type="hidden" name="discount" value=""/>
		        	    <input type="hidden" name="shippingamt" value=""/>
		        	    <input type="hidden" name="paymethod" value=""/>

		        	    <input type="hidden" name="billing_zip" value=""/>
		        	    <input type="hidden" name="billing_country" value="India"/>
		        	    </td>


		        <tr>
		        	<td><label>Phone Number</label>
		        	    <input type="text" name="billing_tel" value="{{$order_details->phone_number}}" readonly/>
		        	    <!--<input type="text" name="billing_tel" value=""/>-->
		        	</td>
		        </tr>
		        <tr>
		        	<td><label>E-mail ID</label>
		        	 <input type="text" name="billing_email" value="{{$order_details->email}}" readonly />
		        	    <!--<input type="text" name="billing_email" value=""/>-->
		        	    <input type="hidden" name="delivery_name" value=""/>
		        	    <input type="hidden" name="delivery_address" value=""/>
		        	    <input type="hidden" name="delivery_city" value=""/>
		        	    <input type="hidden" name="delivery_state" value=""/>
		        	    <input type="hidden" name="delivery_zip" value=""/>
		        	    <input type="hidden" name="delivery_country" value=""/>
		        	    </td>
		        </tr>
		        	<tr>
					<td>
					    <label>Pincode</label>
					    <input type="text" name="billing_zip" value="{{$order_details->pincode}}" readonly/>
					</td>
				</tr>


		        <tr>
		        	<td><input type="hidden" name="delivery_tel" value="{{$order_details->phone_number}}"/></td>
		        </tr>
		        <tr>
		        	<td><input type="hidden" name="merchant_param1" value=""/></td>
		        </tr>
		        <tr>
		        	<td><input type="hidden" name="merchant_param2" value="additional Info."/></td>
		        </tr>
				<tr>
					<td><input type="hidden" name="merchant_param3" value="additional Info."/></td>
				</tr>
				<tr>
					<td><input type="hidden" name="merchant_param4" value="additional Info."/></td>
				</tr>
				<tr>
					<td><input type="hidden" name="merchant_param5" value="additional Info."/></td>
				</tr>
				<tr>
					<td><input type="hidden" name="promo_code" value=""/></td>
				</tr>
				<tr>
					<td><input type="hidden" name="customer_identifier" value=""/></td>
				</tr>
		        <tr>
		        	<td><INPUT TYPE="submit" name="paynow"  value="PayNow"></td>
		        </tr>
	      	</table>
	      </form>

	</body>
</html>
