@extends('layout.default')
@section('content')
<section class="blog about-blog">
    <div class="container">
        <div class="blog-bradcrum">
            <span><a href="/">Home</a></span>
            <span class="devider">/</span>
            <span><a href="#">Refunds/Cancellations</a></span>
        </div>
        <div class="blog-heading about-heading">
            <h1 class="heading">Refunds/Cancellations</h1>
        </div>
    </div>
</section>
<!--------------- blog-tittle-section-end---------------->

<!--------------- terms-section --------------->
<section class="product privacy footer-padding">
    <div class="container">
        <div class="image-left">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/HumanRightsLogo.svg/230px-HumanRightsLogo.svg.png" alt="Human Rights Logo"/>
            <div class="policy">
                <h5 class="intro-heading">Cancellation before shipment
                </h5>
                <br>
                <p class="policy-details">If the order or the item(s) that you want to cancel have not been shipped yet, you can write to our customer support team on contact@Healthsyns.in</p>
                <br>
                <p class="policy-details">In such cases, the order will be cancelled and the money will be refunded to you within 7-14 business days after the cancellation request.</p>
            </div>
        </div>

        <div class="image-right">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/HumanRightsLogo.svg/230px-HumanRightsLogo.svg.png" alt="Human Rights Logo"/>
            <div class="policy">
                <h5 class="intro-heading">Cancellation post shipment</h5><br>
                <p class="policy-details">If you wish to cancel an order that has been shipped but has not yet been delivered, please get in touch with our Customer Support team on contact@Healthsyns.in

                </p><br>
                <p class="policy-inner-text">
                    In case you have cancelled an order, which has already been handed over to the courier company on our end, they may still attempt delivery. Kindly do not accept the delivery of the order.
                </p><br>
                <p class="policy-inner-text">
                    Once we receive the product(s) back and verify its packaging/condition, we will refund your money within 7-14 business days.
                </p>
            </div>
        </div>

        <div class="privacy-section">
            {{-- <div class="policy">
                <h5 class="intro-heading">Cancellation before shipment
                </h5>
                <p class="policy-details">If the order or the item(s) that you want to cancel have not been shipped yet, you can write to our customer support team on contact@Healthsyns.in</p>
                <p class="policy-details">In such cases, the order will be cancelled and the money will be refunded to you within 7-14 business days after the cancellation request.</p>
            </div> --}}
            <div class="policy">
                {{-- <h5 class="intro-heading">Cancellation post shipment</h5>
                <p class="policy-details">If you wish to cancel an order that has been shipped but has not yet been delivered, please get in touch with our Customer Support team on contact@Healthsyns.in


                    <span class="policy-inner-text">
                        In case you have cancelled an order, which has already been handed over to the courier company on our end, they may still attempt delivery. Kindly do not accept the delivery of the order.
                    </span>
                    <span class="policy-inner-text">
                    Once we receive the product(s) back and verify its packaging/condition, we will refund your money within 7-14 business days.
                </span>

                </p> --}}
                <div class="policy-features">
                    <h5 class="intro-heading">How will I get refunded for the cancelled orders and how long will this process take?</h5>
                    <ul>
                        <li><p>In case of cancellation before shipment, we process the refund within 7-14 business days after receiving the cancellation request.
                        </p> </li>
                        <li><p>In case of cancellation once the shipment has already been dispatched or if it is being returned, we process the refund once the products have been received and verified at our warehouse.
                        </p> </li>
                        <li><p> For payments done through credit/debit cards or net banking, the refund will be processed to the same account from which the payment was made within 7-14 business days of us receiving the products back. It may take 2-3 additional business days for the amount to reflect in your account.
                        </p> </li>
                        <li><p>For cash on delivery transactions, we will initiate a bank transfer against the refund amount against the billing details shared by you. This process will be completed within 7-14 business days of us receiving the products back and your bank details on email. It will take an additional 2-3 business days for the amount to reflect in your account.</p>
                        </li>
                        <li><p>Discount vouchers are intended for one-time use only and shall be treated as used even if you cancel the order.</p>
                        </li>
                        <li><p>If you had redeemed loyalty points for an order, the same will be credited back to your account in the case of a cancellation.</p>
                        </li>

                    </ul>
                </div>
            </div>


            <div class="policy">
                <h5 class="intro-heading">Need help?</h5>
                <p class="policy-details">Contact us at {narmatha.doc@gmail.com} for questions related to refunds and returns.


                </p>
            </div>
            {{-- <div class="policy">
                <h5 class="intro-heading">05.Pricing and Payment Terms</h5>
                <p class="policy-details">Lorem Ipsum is essentially the typeset and printing industry's dummy text.
                    Since an unidentified printer jumbled a galley of type to create a type specimen book in the
                    1500s, Lorem Ipsum has been the industry standard sham text. It has remained virtually constant
                    for five centuries, and it has even withstood the transition to electronic typesetting. It
                    didn't become widely known until the 1960s, when Letraset sheets with sections from Lorem Ipsum
                    were released. More recently, desktop publishing programs like Aldus PageMaker have included
                    renditions of Lorem Ipsum to create type specimen books.

                    <span class="policy-inner-text">
                        five centuries but also the on leap into electronic typesetting, remaining essentially
                        unchanged. It wasn’t popularised in the 1960s with the release of Letraset sheets containing
                        Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus
                        PageMaker including versions of Lorem Ipsum to make a type specimen book. It wasn’t
                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                        passages, andei more recently with desktop publishing software like Aldus PageMaker
                        including versions of Lorem Ipsum to make a type specimen book.
                    </span>
                    <span class="policy-inner-text">
                        It has remained virtually constant for five centuries, and it has even withstood the
                        transition to electronic typesetting. It didn't become widely known until the 1960s, when
                        Letraset sheets with sections from Lorem Ipsum were released. More recently, desktop
                        publishing programs like Aldus PageMaker have included renditions of Lorem Ipsum to create
                        type specimen books.
                    </span>
                </p>
            </div> --}}
        </div>
    </div>
</section>
@endsection
