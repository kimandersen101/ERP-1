<!-- Confirm Modal -->
<div class="modal cart-modal loyalty-detail" id="loyalty_detail" tabindex="-1" role="dialog" aria-labelledby="confirm" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <header>
                @if(Session::get('controlling_admin_id'))
                <div class="admin_control ">
                    <span>Under Admin Control</span>
                </div>
                @endif

                <nav class="navbar navbar-expand-sm navbar-light bg-white custom-nav loyalty">
                    <a class="navbar-brand m-auto">
                        <p class="mb-0 nav-heading">software-demand.com Loyalty Program</p>
                    </a>

                    <div class="has-close-btn">
                        <i class="material-icons close-button" data-dismiss="modal">close</i>
                    </div>
                </nav>
            </header>

            <div class="modal-body p-0 text-center product-detail">
                <form id="subscription_details">
                    <div class="container pt-3 pb-5">
                        <p class="loyalty-modal-heading text-app-grey mb-3">Save {{$data->subscription_details->promo->discount_value_str}} on all future orders.</p>
                        <p class="loyalty-modal-offer text-app-grey mb-0">This is a one time offer, you can cancel at anytime.</p>
                        <div class="row my-3 justify-content-center">
                            <div class="col">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <h4 class="title text-truncate"><b>{{$data->subscription_bundlle->zone_title}} : Renewal Filters</b></h4>
                                    </div>
                                    <div class="card-body py-4">
                                        <div class="nickname text-center">
                                            <div class="edit-nick mb-3 {{empty( $data->subscription_bundlle->nickname ) ? 'd-none' : ''}} ">
                                                <div class="kitchen-btn text-center mb-3 mx-auto py-1 nickname_div">
                                                    {{$data->subscription_bundlle->nickname}}
                                                </div>
                                                <a href="javascript:void(0)" class="edit-nick-name">Edit Nick Name</a>
                                            </div>
                                            <div class="mb-3 hidden-nick-name {{!empty( $subscription_bundlle->nickname ) ? 'd-none' : ''}}">
                                                <div class="form-group text-center mb-3">
                                                    <input type="text" id="nick" class="form-control w-75 mx-auto custom-nick" value="{{$data->subscription_bundlle->nickname}}" name="nick" placeholder="Nickname your product" required>
                                                    <input type="hidden" id="customer_subscription_bundle_id" name="" value="{{$data->subscription_bundlle->id}}">
                                                </div>
                                                <a href="javascript:void(0)" class="save-nick-name">Save</a>
                                                <a class="custom-popover d-flex justify-content-center" href="javascript:void(0)"><span>Nickname this filter now!</span></a>
                                            </div>
                                        </div>
                                        <img src="{{asset('images/machine.png')}}" class="mx-auto d-block img-fluid mb-4">
                                        <p class="text-center tag-line1 mb-0">You are a customer loyalty member</p>
                                        <p class="text-center d-block tag-line2">{{$data->subscription_details->promo->discount_value_str}} discount / and up to 15 year warranty</p>

                                        @foreach( $data->subscription_details->products as  $product )
                                            @php
                                                $validity = $product->key == 'p1_filter' ? $subscription_bundlle->p1_filter_validity : $product->validity;
                                            @endphp
                                        <hr class="divider mt-4">

                                        <div class="filters mt-4">
                                            <p class="heading mb-4">{{$product->name}}</p>
                                            <div class="note-success mb-3 py-3 px-3 text-center">
                                                <p class="title mb-1">Good Standing: Nothing Due Today</p>
                                                <p class="tagline mb-0">Your renewal is set to renew on
                                                    (<span class="renewal_date_{{$product->customer_subscription_id}}">{{date( 'm.d.Y', strtotime("+$validity months" ) )}}</span>)
                                                </p>
                                            </div>
                                            <div class="filter_checkout mt-4">

                                                @if( $product->key == 'p1_filter' )
                                                <div class="form-group mt-5 mb-4">

                                                    <select class="form-control custom-select mb-0" id="p1_filter_validity" name="p1_filter_validity" data-customer_subscription_bundle_id="{{$subscription_bundlle->id}}" data-customer_subscription_id="{{$product->customer_subscription_id}}">
                                                        @for( $i = 1; $i <= 6; $i++ )
                                                            <option value="{{$i}}" {{$i == $subscription_bundlle->p1_filter_validity ? 'selected' : ''}}>{{$subscription_bundlle->zone_title}}: {{$i}} month cycle {{$i == $subscription_bundlle->recommended_cycle ? ' (recommended)' : ''}}</option>
                                                        @endfor

                                                    </select>
                                                </div>
                                                @if( $data->customer->is_loyalty_member == 1 )
                                                <p class="description">Based on your estimated water consumption,
                                                    we’ll send you a P1 filter every
                                                    (<span class="renewal_cycle_months">{{$subscription_bundlle->p1_filter_validity}}</span>) month(s)
                                                </p>
                                                @else
                                                <p class="description">Based on your estimated water consumption,
                                                    we’ll remind you to change your P1 filter every
                                                    (<span class="renewal_cycle_months">{{$subscription_bundlle->p1_filter_validity}}</span>) month(s)
                                                </p>
                                                @endif
                                                @endif

                                                <div class="fields text-left total_title">
                                                    <p class="mb-0">
                                                        Sub Total <span class="saving">( {{$subscription_details->promo->discount_value_str}} loyalty savings)</span>
                                                        <span class="float-right">

															@if( !empty( $product->actual_price ) )
																<strike>${{number_format( $product->actual_price, 2 )}}</strike>
															@endif

															${{number_format( $product->price, 2 )}}
														</span>
                                                    </p>
                                                    <hr class="divider my-2">
                                                    @if( !empty( $product->filters ) )

                                                    <p class="mb-0 total_title">
                                                        {{$data->subscription_bundlle->zone_title}} Filters
                                                        <span class="saving">({{$data->subscription_details->promo->discount_value_str}} loyalty savings)</span>
                                                        <span class="float-right">

															@if( !empty( $product->filters->actual_price ) )
																<strike>${{number_format( $product->filters->actual_price, 2 )}}</strike>
															@endif
															${{number_format( $product->filters->price, 2 )}}</span>
                                                    </p>
                                                    <hr class="divider my-2">

                                                    @endif

                                                    <p class="mb-0">Tax <span class="float-right">${{number_format( $product->tax, 2 )}}</span></p>
                                                    <hr class="divider my-2">
                                                    <p class="mb-0">Shipping & Handling <span class="float-right">${{number_format( $product->shipping, 2 )}}</span></p>
                                                </div>
                                                <div class="mt-3 total">
                                                    <p class="text-left">
                                                        Total
                                                        <span class="float-right">${{number_format( $product->total, 2 )}}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        @if( !empty( $data->subscription_details->addons ) )
                        @foreach( $data->subscription_details->addons as  $addon )

                        <div class="row my-5 justify-content-center">
                            <div class="col">
                                <div class="card custom-card">
                                    <div class="card-header">
                                        <h4 class="title text-truncate"><b>{{$addon->name}}</b></h4>
                                    </div>
                                    <div class="card-body py-4">

                                        <div class="nickname text-center">
                                            <div class="edit-nick mb-3 {{empty( $addon->nickname ) ? 'd-none' : ''}}">
                                                <div class="kitchen-btn text-center mb-3 mx-auto py-1 nickname_div">
                                                    {{$addon->nickname}}
                                                </div>
                                                <a href="javascript:void(0)" class="edit-nick-name">Edit Nick Name</a>
                                            </div>
                                            <div class="save mb-3 hidden-nick-name {{!empty( $addon->nickname ) ? 'd-none' : ''}}">
                                                <div class="form-group text-center mb-3">
                                                    <input type="text" id="nick" class="form-control w-75 mx-auto custom-nick" name="" placeholder="Nickname your product" value="{{$addon->nickname}}" required>
                                                    <input type="hidden" id="customer_subscription_id" name="" value="{{$addon->customer_subscription_id}}">
                                                    <input type="hidden" id="type" name="" value="addon">
                                                </div>
                                                <a href="javascript:void(0)" class="save-nick-name">Save</a>
                                                <a class="custom-popover d-flex justify-content-center" href="javascript:void(0)"><span>Nickname this filter now!</span></a>
                                            </div>
                                        </div>
                                        <img src="{{asset('images/product.png')}}" class="mx-auto d-block img-fluid mb-4">
                                        <p class="text-center tag-line1 mb-0">You are a customer loyalty member</p>
                                        <p class="text-center d-block tag-line2">{{$data->subscription_details->promo->discount_value_str}} discount</p>

                                        <hr class="divider mt-4">

                                        <div class="filters mt-4">
                                            <p class="heading mb-4">{{$addon->name}}</p>
                                            <div class="note-success mb-3 py-3 px-3 text-center">
                                                <p class="title mb-1">Good Standing: Nothing Due Today</p>
                                                <p class="tagline mb-0">Your renewal is set to renew on
                                                    <span>({{date( 'm.d.Y', strtotime("+$addon->validity months" ) )}})</span>
                                                </p>
                                            </div>
                                            <div class="filter_checkout mt-4">
                                                <div class="fields text-left total_title">
                                                    <p class="mb-0">
                                                        Sub Total <span class="saving">({{$subscription_details->promo->discount_value_str}} loyalty savings)</span>
                                                        <span class="float-right">

															@if( !empty( $addon->actual_price ) )
																<strike>${{number_format( $addon->actual_price, 2 )}}</strike>
															@endif

															${{number_format( $addon->price, 2 )}}
														</span>
                                                    </p>
                                                    <hr class="divider my-2">
                                                    <p class="mb-0">Tax <span class="float-right">${{number_format( $addon->tax, 2 )}}</span></p>
                                                    <hr class="divider my-2">
                                                    <p class="mb-0">Shipping & Handling <span class="float-right">${{number_format( $addon->shipping, 2 )}}</span></p>
                                                </div>
                                                <div class="mt-3 total">
                                                    <p class="text-left">
                                                        Total
                                                        <span class="float-right">${{number_format( $addon->total, 2 )}}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                        @endif
                        <div class="row my-5 justify-content-center">
                            <div class="col">
                                <div class="card custom-card border-0">

                                    <div class="card-body p-0">
                                        <div class="row justify-content-center">
                                            <div class="col-10">
                                                <button type="button" class="btn btn-primary btn-blue btn-lg btn-block" data-dismiss="modal" >Go back</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="pt-5"></div>
                <div class="body-footer text-center">
                    <img src="{{asset('images/logo.png')}}" width="150">
                </div>
            </div>
        </div>
    </div>

</div>
