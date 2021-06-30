<section class="shop">
	<div class="container mb-5">
		<div class="row justify-content-center no-gutters">
			<div class="col col-md-7 col-lg-5">
				<h5 class="text-center pt-5 pb-4">What zone are you in?</h5>
				<div class="card custom-card">
					<div class="card-header">
						<h4 class="title text-truncate">Personalize your filters</h4>
					</div>
					<div class="card-body py-4 text-center group-name">
						<form id="zone_form" role="form" data-toggle="validator">
							<div class="form-group">
								<label for="zipcode" class="title mb-4">What is your zip code?</label>
								<input type="text" class="form-control zipcode" id="zipcode" aria-describedby="emailHelp" name="zipcode" placeholder="Zip code" required>
							</div>

							<div class="form-group mb-0">
								<input type="text" class="form-control confirm_zipcode" data-match="#zipcode" name="confirm_zipcode" placeholder="Confirm your zip code" required>
							</div>

							<label class="title mt-5 mb-4">Are you on well water?</label>
							<div class="py-2 mb-2 confirmation">
								<div class="form-group custom-checkbox rounded my-auto">
									<div class="radio">
										<input type="radio" class="form-check-input" name="on_well_water" value="1" id="yes" required>
										<label class="form-check-label mr-5" for="yes">Yes</label>
										<input type="radio" class="form-check-input" name="on_well_water" value="0" id="no" required>
										<label class="form-check-label ml-5" for="no">No</label>
									</div>
								</div>
							</div>

							<div class="mt-5 has_softener_system_field d-none">
								<label class="title mb-4">Do you have a water softener<br/>or whole house filtration system installed now?</label>
								<div class="py-2 mb-2 confirmation">
									<div class="form-group custom-checkbox rounded my-auto">
										<div class="radio">
											<input type="radio" class="form-check-input" name="has_softener_system" value="1" id="yes2" required>
											<label class="form-check-label mr-5" for="yes2">Yes</label>
											<input type="radio" class="form-check-input" name="has_softener_system" value="0" id="no2" required>
											<label class="form-check-label ml-5" for="no2">No</label>
										</div>
									</div>
								</div>
							</div>

							<label class="title mt-5 mb-4">Do you have a whole house 5 micron system?</label>
							<div class="py-2 mb-2 confirmation">
								<div class="form-group custom-checkbox rounded my-auto">
									<div class="radio">
										<input type="radio" class="form-check-input" name="has_micron_system" value="1" id="yes_has_micron_system" required>
										<label class="form-check-label mr-5" for="yes_has_micron_system">Yes</label>
										<input type="radio" class="form-check-input" name="has_micron_system" value="0" id="no_has_micron_system" required>
										<label class="form-check-label ml-5" for="no_has_micron_system">No</label>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-blue btn-lg btn-block mt-5 zone_btn">Next</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
