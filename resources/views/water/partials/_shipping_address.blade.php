<article class="shipping-address text-center">
	<div class="form-group">
		<label class="filter-labels name mb-0">Shipping address:</label>
		<hr class="divider">
	</div>
	<div class="shipping-address-content px-5 py-4 mb-3 mt-4">
		<div class="address" id="payment_shipping_address">
			{{$data->customer->address_string}}
		</div>

		<a href="#" class="edit mt-3" data-toggle="modal" data-target="#shipping-modal" >Edit <i class="material-icons right-arrow">keyboard_arrow_right</i></a>
	</div>
</article>
