<!-- Confirm Modal -->
<div class="modal cart-modal addon-modal payment-learnmore-modal" id="sa-financing" tabindex="-1" role="dialog" aria-labelledby="confirm" aria-hidden="true">
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
                        <img src="{{asset('images/logo.png')}}" width="140">
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
                                        <h5 class="font-weight-bold">software-demand.com Financing Option Details</h5>
                                        <ul>
                                            <li>Purchase Price for Unit: $3700</li>
                                        </ul>

                                        <h5 class="font-weight-bold">Money Down Requirement</h5>
                                        <ul>
                                            <li>$1995.00 (+ sales tax) Down Payment</li>
                                            <li>$75 shipping</li>
                                        </ul>

                                        <h5 class="font-weight-bold">Financed Amount</h5>
                                        <ul>
                                            <li>$1705 balanced left over</li>
                                            <li>$45 financing fee</li>
                                            <li>$50 insurance</li>
                                            <li>Total: $1800 financed</li>
                                        </ul>

                                        <h5 class="font-weight-bold">Terms</h5>
                                        <ul>
                                            <li>9.95% interest</li>
                                            <li>15 months</li>
                                            <li>$127.76/month + Tax</li>
                                            <li>No Pre-payment Penalty</li>
                                            <li>No Credit Check</li>
                                            <li>No Background Check</li>
                                            <li>Have it immediately</li>
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
