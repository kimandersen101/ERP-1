<!-- Confirm Modal -->
<div class="modal cart-modal addon-modal payment-learnmore-modal" id="bank-financing" tabindex="-1" role="dialog" aria-labelledby="confirm" aria-hidden="true">
    <div class="modal-dialog " role="document">

        <header>
            @if(Session::get('controlling_admin_id'))
            <div class="admin_control ">
                <span>Under Admin Control</span>
            </div>
            @endif

            <nav class="navbar navbar-expand-sm navbar-light bg-white custom-nav">
                <a class="navbar-brand m-auto" href="">
                    <img src="{{asset('images/logo.png')}}" width="140">
                </a>
                <div class="has-close-btn">
                    <i class="material-icons close-button" data-dismiss="modal">close</i>
                </div>
            </nav>
        </header>

        <div class="modal-content">

            <div class="modal-body p-0">
                <div class="container-fluid pt-4 px-0">
                    <div class="card custom-card payment-learnmore border border-0">
                        <div class="card-body p-3 pb-5">
                            <section class="row justify-content-center mt-4">
                                <div class="col-12">
                                    <article class="financing-modal">
                                        <h3 class="font-weight-bold mb-4"><u>Details of Renter Financing Plan</u></h3>
                                        <h5 class="font-weight-bold">One year 0% interest</h5>
                                        <ul>
                                            <li>0% Interest for 12 months</li>
                                            <li>17.99%-21.99% interest retro-active will charge from the original loan start date if balance has not been paid in full.</li>
                                            <li>No prepayment penalty</li>
                                            <li>No down payment required unless credit score is too low</li>
                                            <li>No start up financing fees</li>
                                            <li>Min estimated monthly payment: $100 - $130, this does not reflect the payment amount required to pay off the loan in the 12 month period.</li>
                                        </ul>

                                        <h5 class="font-weight-bold"> Monthly Payment Plan $80-$130</h5>
                                        <ul>
                                            <li>9.99% or 13,99%, or 17.99% pending credit approval</li>
                                            <li>Loan term: 60months</li>
                                            <li>No prepayment penalty</li>
                                            <li>No down payment required unless credit score is too low</li>
                                            <li>No start up financing fees</li>
                                            <li>Min estimated monthly payment: $100 - $130</li>
                                        </ul>

                                        <h5 class="font-weight-bold">If they choose the Home Owners Option on Top, then under the
                                            “Select a Financing Option” it should list</h5>
                                        <ul>
                                            <li>0% Interest for 6 Months</li>
                                            <li>0% Interest for 12 Months</li>
                                            <li>49/month + tax</li>
                                            <li>39/month + tax</li>
                                        </ul>

                                        <h3 class="font-weight-bold mb-4"><u>Details of Home Owners Financing Plans</u></h3>

                                        <h5 class="font-weight-bold">No interest for 6 months</h5>
                                        <ul>
                                            <li>0% Interest for 6 months</li>
                                            <li>24.99% interest retro-active will charge from the original loan start date if balance has not been paid in full. </li>
                                            <li>No prepayment penalty</li>
                                            <li>No down payment</li>
                                            <li>No start up financing fees</li>
                                            <li>Min estimated monthly payment: $110 - $135, this does not reflect the payment amount required to pay off the loan in the 6 month period. </li>
                                        </ul>

                                        <h5 class="font-weight-bold">No interest for 12 months</h5>
                                        <ul>
                                            <li>0% Interest for 12 months</li>
                                            <li>24.99% interest retro-active will charge from the original loan start date if balance has not been paid in full. </li>
                                            <li>No prepayment penalty</li>
                                            <li>No down payment</li>
                                            <li>No start up financing fees</li>
                                            <li>Min estimated monthly payment: $110 - $135, this does not reflect the payment amount required to pay off the loan in the 12 month period. </li>
                                        </ul>

                                        <h5 class="font-weight-bold">9.99% interest for 120 months</h5>
                                        <ul>
                                            <li>9.99% interest</li>
                                            <li>Term: 120 months </li>
                                            <li>No prepayment penalty</li>
                                            <li>No down payment</li>
                                            <li>No start up financing fees</li>
                                            <li>Min estimated monthly payment: $49/month + Tax</li>
                                        </ul>

                                        <h5 class="font-weight-bold">7.99% interest for 180 months</h5>
                                        <ul>
                                            <li>7.99% interest</li>
                                            <li>Term: 180 months </li>
                                            <li>No prepayment penalty</li>
                                            <li>No down payment</li>
                                            <li>$155 Financing Fee</li>
                                            <li>Min estimated monthly payment: $39/month + Tax</li>
                                        </ul>
                                    </article>
                                </div>

                            </section>
                        </div>
                    </div>
                </div>
                <div class="body-footer text-center">
                    <img src="{{asset('images/logo.png')}}" width="150">
                </div>
            </div>
        </div>
    </div>
</div>
