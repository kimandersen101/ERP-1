<!-- Confirm Modal -->
<div class="modal fade custom-modal" id="shipping-modal" tabindex="-1" role="dialog" aria-labelledby="confirm" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header border-bottom-0">
				<h5 class="modal-title mx-auto" id="confirm">Edit Shipping Address</h5>
				<div class="has-close-btn">
					<i class="material-icons close-button" data-dismiss="modal">close</i>
				</div>
			</div>
			<div class="modal-body confirm-body p-4 text-center">
				<form method="post" id="shipping_address" role="form" data-toggle="validator">
					<input type="hidden" name="update_type" value="shipping">
					<div class="form-group">
						<input type="text" class="form-control" name="street_address" placeholder="Address*" value="{{$data->customer->street_address}}" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="appartment" placeholder="Apt/Suite/Unit #" value="{{$data->customer->appartment}}">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="city" placeholder="City*" value="{{$data->customer->city}}" required>
					</div>
					<div class="form-group">
						<select class="form-control" placeholder="State" name="state_id" id="states" required>
							<option value="" disabled selected hidden>State</option>
							@foreach( $data->states as $state){
							<option value="{{$state->id}}" {{$data->customer->state_id == $state->id ? 'selected' : ''}}>{{$state->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="zipcode" placeholder="Zipcode*" value="{{$data->customer->zipcode}}" required>
					</div>
					<div class="container px-0">
						<div class="row">
							<div class="col-md-6 mt-3">
								<input type="submit" class="btn btn-light btn-yes btn-lg btn-block" id="shipping_address" value="Save">
							</div>
							<div class="col-md-6 mt-3">
								<button type="button" class="btn btn-primary btn-blue btn-lg btn-block" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
