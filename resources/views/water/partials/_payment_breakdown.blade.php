<article class="payment-breakdown text-center">
	<div class="form-group mt-4">
		<label class="filter-labels name mb-0">Purchase Summary:</label>
		<hr class="divider">
	</div>
		<input type="hidden" id="promo_exist" value="{{$data->customer->promo_id}}">
	<div class="row">
		<div class="col-auto mr-auto title">Sub-Total</div>
		<div class="col-auto amount" id="sub_total" data-value="{{$data->customer_order->sub_total}}">${{number_format( $data->customer_order->sub_total, 2 )}}</div>
	</div>

	@if( !empty( $data->customer_order->financing_fee ) )
	<div class="row mt-2 d-none" id="financing_field">
		<div class="col-auto mr-auto title">Financing Fee</div>
		<div class="col-auto amount" id="financing_fee" data-value="{{$data->customer_order->financing_fee}}">${{number_format( $data->customer_order->financing_fee, 2 )}}</div>
	</div>
	@endif

	@if( !empty( $data->customer_order->event_promo ) )
	<div class="row mt-2" id="event_promo_field">
		<div class="col-auto mr-auto title">{{$data->customer_order->event_promo->name}}</div>
		<div class="col-auto amount" id="event_promo" data-value="{{$data->customer_order->event_promo->value}}">-${{number_format( $data->customer_order->event_promo->value , 2 )}}</div>
	</div>
	@endif

{{--	@if( !empty( \Illuminate\Support\Facades\Session::userdata( 'controlling_admin_id' ) ) )--}}
{{--		 <div class="row mt-2">--}}
{{--			<div class="col-auto mr-auto title">Discount</div>--}}
{{--			<div class="col-auto amount">$--}}
{{--				<input type="text" name="discount" id="discount" value="0">--}}
{{--			</div>--}}
{{--		</div>--}}
{{--	@endif--}}

	<div class="row mt-2">
		<div class="col-auto mr-auto title">Shipping</div>
		<div class="col-auto amount" id="shipping" data-value="{{$data->customer_order->shipping}}">${{number_format( $data->customer_order->shipping, 2 )}}</div>
	</div>

{{--	@if( !empty( \Illuminate\Support\Facades\Session::userdata( 'controlling_admin_id' ) ) )--}}
{{--		 <div class="row mt-2">--}}
{{--			<div class="col-auto mr-auto title">Shipping Discount</div>--}}
{{--			<div class="col-auto amount">$--}}
{{--				<input type="text" name="shipping_discount" id="shipping_discount" value="0">--}}
{{--			</div>--}}
{{--		</div>--}}
{{--	@endif--}}
	<div class="row mt-2">
		<div class="col-auto mr-auto title">Tax (<span id="tax_percent" data-value="{{number_format( $data->customer_order->tax_percent, 2 )}}">{{number_format( $data->customer_order->tax_percent, 2 )}}</span>%)
		</div>
		<div class="col-auto amount" id="tax">${{number_format( $data->customer_order->tax, 2 )}}</div>
	</div>
	<div class="row mt-4">
		<div class="col-auto mr-auto title">Total</div>
		<div class="col-auto amount" id="total">${{number_format( $data->customer_order->total, 2 )}}</div>
	</div>
{{--	@if( !empty( \Illuminate\Support\Facades\Session::userdata( 'controlling_admin_id' ) ) )--}}
{{--		<div class="row mt-4">--}}
{{--			<div class="col-12">--}}
{{--				<textarea class="form-control" name="admin_note" id="admin_note" placeholder="Add admin notes..." style="resize: none;"></textarea>--}}
{{--			</div>--}}
{{--		</div>--}}
{{--	@endif--}}
</article>
