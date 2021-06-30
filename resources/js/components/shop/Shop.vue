<template>
    <div class="container py-4">
        <section class="shop">
            <section class="custom-tab-nav">
                <div class="row justify-content-center no-gutters">
                    <div class="col">
                        <ul class="nav nav-tabs justify-content-center" role="tablist">
                            <li class="nav-item nav-item-1">
                                <a class=" active nav-link" id="model-tab" data-toggle="tab" href="#model" role="tab"
                                   aria-controls="model" aria-selected="true">Select Model</a>
                            </li>
                            <li class="nav-item nav-item-2">
                                <a class="nav-link disabled" id="personalize-tab" data-toggle="tab" href="#personalize"
                                   role="tab" aria-controls="personalize" aria-selected="false">Personalize</a>
                            </li>
                            <li class="nav-item nav-item-3">
                                <a class="nav-link disabled" id="Installation-tab" data-toggle="tab"
                                   href="#Installation" role="tab" aria-controls="Installation" aria-selected="false">Installation</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </section>

            <section class="tab-content custom-tab-content mt-4">

                <div class="tab-pane fade show active" id="model" role="tabpanel" aria-labelledby="model-tab">


                    <div class="container">
                        <div class="row justify-content-center no-gutters">
                            <div class="col col-md-7 col-lg-5">
                                <div class="card custom-card drinking-system shadow-sm">
                                    <div class="card-header">
                                        <h4 class="title text-truncate">Premium Drinking System</h4>
                                    </div>

                                    <div class="card-body">
                                        <img src="/images/machine.png" class="mx-auto d-block machine-img"><br>
                                        <p class="text-center mt-4 tag-line">
                                            From as low as $39/month with homeowners financing or buy today for $3700
                                        </p>
                                        <button type="button"
                                                class="btn btn-primary btn-blue btn-lg btn-block mt-4 btnNext"
                                                data-bundle-id="1" data-toggle="modal" data-tab="2">Next
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="personalize" role="tabpanel" aria-labelledby="personalize-tab">
                    <div class="container mb-5 personalize">
                        <div class="row justify-content-center no-gutters">
                            <div class="col col-md-7 col-lg-5">
                                <div class="card custom-card shadow-sm">
                                    <div class="card-header">
                                        <h4 class="title text-truncate">Personalize your filters</h4>
                                    </div>
                                    <div class="card-body py-4 text-center group-name">
                                        <form id="personalize_form" role="form" data-toggle="validator">
                                            <input type="hidden" name="product_bundle_id" id="bundle_id">

                                            <div class="form-group">
                                                <label for="zipcode" class="title mb-4">What is your zip code?</label>
                                                <input type="text" class="form-control" id="zipcode"
                                                       aria-describedby="emailHelp" name="zipcode"
                                                       placeholder="Zip code" required>
                                            </div>

                                            <div class="form-group mb-0">
                                                <input type="text" class="form-control" data-match="#zipcode"
                                                       name="confirm_zipcode" placeholder="Confirm your zip code"
                                                       required>
                                            </div>

                                            <label class="title mt-5 mb-4">Are you on well water?</label>
                                            <div class="py-2 mb-2 confirmation">
                                                <div class="form-group custom-checkbox rounded my-auto">
                                                    <div class="radio">
                                                        <input type="radio" class="form-check-input"
                                                               name="on_well_water" value="1" id="yes" required>
                                                        <label class="form-check-label mr-5" for="yes">Yes</label>
                                                        <input type="radio" class="form-check-input"
                                                               name="on_well_water" value="0" id="no" required>
                                                        <label class="form-check-label ml-5" for="no">No</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-5 has_softener_system_field d-none">
                                                <label class="title mb-4">Do you have a water softener<br/>or whole
                                                    house filtration system installed now?</label>
                                                <div class="py-2 mb-2 confirmation">
                                                    <div class="form-group custom-checkbox rounded my-auto">
                                                        <div class="radio">
                                                            <input type="radio" class="form-check-input"
                                                                   name="has_softener_system" value="1" id="yes2"
                                                                   required>
                                                            <label class="form-check-label mr-5" for="yes2">Yes</label>
                                                            <input type="radio" class="form-check-input"
                                                                   name="has_softener_system" value="0" id="no2"
                                                                   required>
                                                            <label class="form-check-label ml-5" for="no2">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <label class="title mt-5 mb-4">Do you have a whole house 5 micron
                                                system?</label>
                                            <div class="py-2 mb-2 confirmation">
                                                <div class="form-group custom-checkbox rounded my-auto">
                                                    <div class="radio">
                                                        <input type="radio" class="form-check-input"
                                                               name="has_micron_system" value="1"
                                                               id="yes_has_micron_system" required>
                                                        <label class="form-check-label mr-5"
                                                               for="yes_has_micron_system">Yes</label>
                                                        <input type="radio" class="form-check-input"
                                                               name="has_micron_system" value="0"
                                                               id="no_has_micron_system" required>
                                                        <label class="form-check-label ml-5" for="no_has_micron_system">No</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group mt-5">
                                                <label for="machine" class="title mb-4">Where will this machine
                                                    go?</label>
                                                <v-select :options="options" class="form-group mt-5"
                                                          placeholder="Nickname your filter"></v-select>
                                            </div>

                                            <div class="form-group mt-5">
                                                <label for="household" class="title mb-4">What is your household
                                                    size?</label>
                                                <select class="form-control" id="household" name="household_size"
                                                        required>
                                                    <option value="2">2 people drinking the water</option>
                                                    <option value="3">3+ people drinking the water</option>
                                                </select>
                                            </div>

                                            <button type="button"
                                                    class="btn btn-primary btn-blue btn-lg btn-block mt-5 btnNext"
                                                    id="btnSubmit" data-tab="3">Next
                                            </button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="Installation" role="tabpanel" aria-labelledby="Installation-tab">
                    <div class="container mb-5 Installation">
                        <div class="row justify-content-center no-gutters">
                            <div class="col col-md-7 col-lg-5">
                                <div class="card custom-card shadow-sm">
                                    <div class="card-header">
                                        <h5 class="title text-truncate">Installation</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="group-name"><p class="title text-center">Please select an option
                                            from below</p></div>

                                        <div class="installation-options shop mb-3">
                                            <div class="form-group custom-checkbox rounded my-auto">
                                                <div class="radio">
                                                    <input type="radio" class="form-check-input install-options"
                                                           name="installtion_type"
                                                           value="need-help" id="need-help" checked>
                                                    <label class="form-check-label float-left mr-2"
                                                           for="need-help"></label>
                                                    <div class="title">I need help finding a installer in my area</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="installation-options shop mb-3">
                                            <div class="form-group custom-checkbox rounded my-auto">
                                                <div class="radio">
                                                    <input type="radio" class="form-check-input install-options"
                                                           name="installtion_type"
                                                           value="have-contractor" id="have-contractor">
                                                    <label class="form-check-label float-left mr-2"
                                                           for="have-contractor"></label>
                                                    <div class="title">I have my own contractor to install</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="installation-options shop mb-3">
                                            <div class="form-group custom-checkbox rounded my-auto">
                                                <div class="radio">
                                                    <input type="radio" class="form-check-input install-options"
                                                           name="installtion_type" value="diy"
                                                           id="diy">
                                                    <label class="form-check-label float-left mr-2" for="diy"></label>
                                                    <div class="title">I will install the machine myself (DIY)</div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button"
                                                class="btn btn-primary btn-blue btn-lg btn-block mt-4 add-to-cart">Next
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </section>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                video: {},
                videos: [],
                options: [
                    'Main kitchen',
                    'Bathroom',
                    'Office'
                ]
            }
        },
        methods: {},
        mounted() {

        }
    }
</script>
