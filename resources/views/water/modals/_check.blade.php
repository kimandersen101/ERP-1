<!-- Confirm Modal -->
<div class="modal cart-modal addon-modal payment-learnmore-modal" id="check" tabindex="-1" role="dialog" aria-labelledby="confirm" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <header>
                @if(Session::get('controlling_admin_id'))
                <div class="admin_control ">
                    <span>Under Admin Control</span>
                </div>
                @endif

                <nav class="navbar navbar-expand-sm navbar-light bg-white custom-nav">
                    <a class="navbar-brand m-auto" href="">
                        <img src="{{asset('images/logo.png')}}"  width="140">
                    </a>
                    <div class="has-close-btn">
                        <i class="material-icons close-button" data-dismiss="modal">close</i>
                    </div>
                </nav>
            </header>

            <div class="modal-body p-0">
                <div class="container pt-4">
                    <div class="card custom-card payment-learnmore border border-0">
                        <div class="card-body p-3 pb-5">
                            <section class="row justify-content-center mt-4">
                                <div class="col-12">
                                    <article class="financing-modal">
                                        <h3 class="font-weight-bold mb-4"><u>software-demand.com Water System Ownership Options</u></h3>
                                        <ul>
                                            <li>Unit Price: $3700.00</li>
                                            <li>Sales Tax Not Included Yet</li>
                                            <li>Shipping $75-$90</li>
                                        </ul>

                                        <h5 class="font-weight-bold">Accepted Payment Methods:</h5>
                                        <ul>
                                            <li>Cash/Check</li>
                                            <li>Credit Card VISA, MASTER, AMEX, DISC.</li>
                                        </ul>
                                        <h5 class="font-weight-bold mb-4"><u>FINANCING OPTIONS</u></h5>

                                        <h3 class="font-weight-bold"><u>Non-Home Owners Financing Plan</u></h3>
                                        <h5 class="font-weight-bold">A: One year 0% interest</h5>
                                        <ul>
                                            <li>0% (same as cash) for 12 months</li>
                                            <li>17.99%-21.99% interest retro-active will charge from the original loan start date if balance has not been paid in full. </li>
                                            <li>No prepayment penalty</li>
                                            <li>No down payment required unless credit score is too low</li>
                                            <li>No start up financing fees</li>
                                            <li>Min estimated monthly payment: $100 - $130, this does not reflect the payment amount required to pay off the loan in the 12 months promo period.</li>
                                        </ul>
                                        <h5 class="font-weight-bold">B: Monthly Payment Plan $80-$130</h5>
                                        <ul>
                                            <li>9.99% or 13,99%, or 17.99% pending credit approval</li>
                                            <li>90 day deferred payment (1st monthly payment starts 90 days after loan has been signed)</li>
                                            <li>Loan term: 60months</li>
                                            <li>No prepayment penalty</li>
                                            <li>No down payment required unless credit score is too low</li>
                                            <li>No start up financing fees</li>
                                            <li>Min estimated monthly payment: $100 - $130</li>
                                        </ul>
                                        <h3 class="font-weight-bold"><u>Home Owners Financing Plans</u></h3>
                                        <h5 class="font-weight-bold">C: No interest for 6 months</h5>
                                        <ul>
                                            <li>0% (same as cash) for 6 months</li>
                                            <li>24.99% interest retro-active will charge from the original loan start date if balance has not been paid in full. </li>
                                            <li>No prepayment penalty</li>
                                            <li>No down payment</li>
                                            <li>No start up financing fees</li>
                                            <li>Min estimated monthly payment: $110 - $135, this does not reflect the payment amount required to pay off the loan in the 6 months promo period. </li>
                                        </ul>
                                        <h5 class="font-weight-bold">D: No interest for 12 months</h5>
                                        <ul>
                                            <li>0% (same as cash) for 12 months</li>
                                            <li>24.99% interest retro-active will charge from the original loan start date if balance has not been paid in full. </li>
                                            <li>No prepayment penalty</li>
                                            <li>No down payment</li>
                                            <li>No start up financing fees</li>
                                            <li>Min estimated monthly payment: $110 - $135, this does not reflect the payment amount required to pay off the loan in the 12 months promo period.</li>
                                        </ul>
                                        <h5 class="font-weight-bold">E: 9.99% interest for 120 months (No Financing Fees, No Prepayment Penalty, great for customers planning to Pay it off in 2-5 years)</h5>
                                        <ul>
                                            <li>09.99% interest</li>
                                            <li>Term: 120 months </li>
                                            <li>No prepayment penalty</li>
                                            <li>No down payment</li>
                                            <li>No start up financing fees</li>
                                            <li>Min estimated monthly payment: $49/month + Tax</li>
                                        </ul>

                                        <h5 class="font-weight-bold">F: 7.99% interest for 180 months (very low monthly payment, but comes with financing fee)</h5>
                                        <ul>
                                            <li>7.99% interest</li>
                                            <li>Term: 180 months </li>
                                            <li>No prepayment penalty</li>
                                            <li>No down payment</li>
                                            <li>$155 Financing Fee Additional</li>
                                            <li>Min estimated monthly payment: $39/month + Tax</li>
                                        </ul>
                                    </article>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                <div class="pt-5"></div>
                <div class="body-footer text-center">
                    <img src="{{asset('images/logo.png')}}" width="150">
                </div>
            </div>
        </div>
    </div>
</div>
