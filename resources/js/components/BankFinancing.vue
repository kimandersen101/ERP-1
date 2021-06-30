<template>
    <section class="financing">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 financing">

                    <section class="">

                        <div class="card custom-card shadow-sm">
                            <div class="card-header">
                                <h4 class="title text-truncate">Bank Financing</h4>
                            </div>
                            <div class="card-body text-center">
                                <form role="form" data-toggle="validator" id="purchase_bank_financing_form">

                                    <input type="hidden" name="customer_order_id" v-model="customer_order.id">
                                    <input type="hidden" name="payment_method" v-model="payment_method_key">

                                    <div class="form-group text-center group-name ">
                                        <label class="filter-labels title">Do you own or rent your home?</label>
                                    </div>
                                    <div class="py-2 mb-2">
                                        <div class="form-group my-auto">
                                            <select class="form-control"
                                                    :class="[ $v.form.own_home.$dirty && $v.form.own_home.$invalid ? 'is_invalid': '' ]"
                                                    v-model="form.own_home"
                                                    name="own_home"
                                                    id="own_or_rent"
                                                    @change="change_home_status($event)">
                                                <option value="" disabled selected hidden>Select option</option>
                                                <option value="1">Own</option>
                                                <option value="0">Rent</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group text-center group-name">
                                        <label class="filter-labels title mt-4">Select a financing option</label>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control"
                                                id="financing_type"
                                                :class="[ $v.form.finance_type.$dirty && $v.form.finance_type.$invalid ? 'is_invalid': '' ]"
                                                v-model="form.finance_type"
                                                name="financing_type">
                                            <option value="" disabled selected hidden>Select a Plan</option>
                                            <option v-for="option in financeOptions" v-model="option.text">
                                                {{option.text}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group text-center group-name">
                                        <label class="filter-labels title mt-4">Will {{customer.firstname}} be the
                                            applicant?</label>
                                    </div>
                                    <div class="py-2 mb-2 confirmation">
                                        <div class="form-group custom-checkbox rounded my-auto">
                                            <div class="radio">
                                                <input type="radio"
                                                       class="form-check-input"
                                                       name="is_applicant"
                                                       id="is_applicant_yes"
                                                       v-model="is_customer_applicant"
                                                       v-bind:value="1"
                                                       v-on:change="is_applicant($event)">
                                                <label class="form-check-label mr-5" for="is_applicant_yes">Yes</label>
                                                <input type="radio"
                                                       class="form-check-input"
                                                       name="is_applicant"
                                                       id="is_applicant_no"
                                                       v-model="is_customer_applicant"
                                                       v-bind:value="0"
                                                       v-on:change="is_applicant($event)">
                                                <label class="form-check-label ml-5" for="is_applicant_no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center group-name ">
                                        <label class="filter-labels title mt-4">Applicant Information</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                               :class="[ $v.form.firstname.$dirty && $v.form.firstname.$invalid ? 'is_invalid': '' ]"
                                               v-model="form.firstname"
                                               id="firstname" placeholder="First Name*"
                                               @blur="$v.form.firstname.$touch()">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                               v-model="form.lastname"
                                               :class="[ $v.form.lastname.$dirty && $v.form.lastname.$invalid ? 'is_invalid': '' ]"
                                               @blur="$v.form.lastname.$touch()"
                                               id="lastname"
                                               placeholder="Last Name*">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control"
                                               v-model="form.email"
                                               :class="[ $v.form.email.$dirty && $v.form.email.$invalid ? 'is_invalid': '' ]"
                                               @blur="$v.form.email.$touch()"
                                               name="email"
                                               id="email"
                                               placeholder="Email Address*">
                                    </div>
                                    <div class="form-group">
                                        <input type="email"
                                               class="form-control"
                                               v-model="form.confirm_email"
                                               id="confirm_email"
                                               :class="[ $v.form.confirm_email.$dirty && $v.form.confirm_email.$invalid ? 'is_invalid': '' ]"
                                               @blur="$v.form.confirm_email.$touch()"
                                               placeholder="Confirm Email Address*"
                                               data-match="#email" required>
                                    </div>
                                    <div class="form-group">
                                        <masked-input
                                            type="text"
                                            :mask="['(', /[1-9]/, /\d/, /\d/, ')', ' ', /\d/, /\d/, /\d/, '-', /\d/, /\d/, /\d/, /\d/]"
                                            class="form-control phone"
                                            v-model="form.phone"
                                            :class="[ $v.form.phone.$dirty && $v.form.phone.$invalid ? 'is_invalid': '' ]"
                                            @blur="$v.form.phone.$touch()"
                                            name="phone"
                                            id="phone"
                                            placeholder="Primary Phone*"
                                            minlength="14" required>
                                        </masked-input>
                                    </div>
                                    <div class="form-group">
                                        <input type="text"
                                               class="form-control"
                                               id="birthday_date"
                                               data-date-format="DD MM YYYY"
                                               name="dob"
                                               v-model="form.dob"
                                               :class="[ $v.form.dob.$dirty && $v.form.dob.$invalid ? 'is_invalid': '' ]"
                                               @blur="$v.form.dob.$touch()"
                                               placeholder="Date Of Birth*  (DD/MM/YYYY)"
                                               onfocus="(this.type='date')" max="2090-12-31" required>
                                    </div>
                                    <div class="form-group">
                                        <masked-input
                                            type="text"
                                            :mask="[/[1-9]/, /\d/, /\d/, '-', /\d/, /\d/, /\d/, '-', /\d/, /\d/, /\d/, /\d/]"
                                            class="form-control ssn"
                                            v-model="form.ssn"
                                            :class="[ $v.form.ssn.$dirty && $v.form.ssn.$invalid ? 'is_invalid': '' ]"
                                            @blur="$v.form.ssn.$touch()"
                                            name="ssn"
                                            placeholder="SSN*" required>
                                        </masked-input>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                               v-model="form.employer_name"
                                               :class="[ $v.form.employer_name.$dirty && $v.form.employer_name.$invalid ? 'is_invalid': '' ]"
                                               @blur="$v.form.employer_name.$touch()"
                                               name="employer_name"
                                               placeholder="Name of Current Employer*">
                                    </div>
                                    <div class="form-group">
                                        <input type="text"
                                               class="form-control year_job"
                                               :class="[ $v.form.year_job.$dirty && $v.form.year_job.$invalid ? 'is_invalid': '' ]"
                                               @blur="$v.form.year_job.$touch()"
                                               v-model="form.year_job"
                                               v-if="!is_owner"
                                               name="year_job"
                                               placeholder="Years at Job*">
                                    </div>
                                    <div class="form-group">
                                        <input type="text"
                                               class="form-control month_job"
                                               :class="[ $v.form.month_job.$dirty && $v.form.month_job.$invalid ? 'is_invalid': '' ]"
                                               @blur="$v.form.month_job.$touch()"
                                               v-model="form.month_job"
                                               v-if="!is_owner"
                                               name="month_job"
                                               placeholder="Months at Job*">
                                    </div>
                                    <div class="form-group annual_income_field is_owner" v-if="is_owner">
                                        <input type="text"
                                               class="form-control is_owner"
                                               id="annual_income"
                                               :class="[ $v.form.annual_income.$dirty && $v.form.annual_income.$invalid ? 'is_invalid': '' ]"
                                               @blur="$v.form.annual_income.$touch()"
                                               v-model="form.annual_income"
                                               name="annual_income"
                                               data-annual_income="24000"
                                               placeholder="Annual Income*">
                                        <div class="help-block with-errors pl-2"></div>
                                    </div>
                                    <div class="form-group income_type is_rental" v-if="!is_owner">
                                        <select class="form-control is_rental"
                                                name="income_type"
                                                :class="[ $v.form.income_type.$dirty && $v.form.income_type.$invalid ? 'is_invalid': '' ]"
                                                @blur="$v.form.income_type.$touch()"
                                                v-model="form.income_type"
                                                id="income_type">
                                            <option value="" disabled selected hidden>Select option</option>
                                            <option value="Full-time">Full-Time</option>
                                            <option value="Part-time">Part-Time</option>
                                            <option value="Self-employed">Self-Employed</option>
                                            <option value="Temporary">Temporary</option>
                                            <option value="Seasonal">Seasonal</option>
                                            <option value="Retired">Retired</option>
                                            <option value="Military">Military</option>
                                        </select>
                                    </div>
                                    <div class="form-group gross_monthly_income_field is_rental" v-if="!is_owner">
                                        <input type="text"
                                               class="form-control is_rental"
                                               id="gross_monthly_income"
                                               :class="[ $v.form.gross_monthly_income.$dirty && $v.form.gross_monthly_income.$invalid ? 'is_invalid': '' ]"
                                               @blur="$v.form.gross_monthly_income.$touch()"
                                               v-model="form.gross_monthly_income"
                                               name="gross_monthly_income"
                                               placeholder="Gross Monthly Income*">
                                        <div class="help-block with-errors pl-2"></div>
                                    </div>
                                    <div v-if="is_owner">
                                        <div class="form-group text-center group-name identification_type">
                                            <label class="filter-labels title mt-4">Identification details</label>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control identification_type"
                                                    placeholder=""
                                                    id="identification_type"
                                                    :class="[ $v.form.identification_type.$dirty && $v.form.identification_type.$invalid ? 'is_invalid': '' ]"
                                                    @blur="$v.form.identification_type.$touch()"
                                                    v-model="form.identification_type"
                                                    name="identification_type"
                                                    @change="change_identification_type($event)">
                                                <option value="" disabled selected hidden>Select Identification Type
                                                </option>
                                                <option value="Driving License Number">Driving License Number</option>
                                                <option value="Passport Number">Passport Number</option>
                                                <option value="State ID">State ID</option>
                                            </select>
                                        </div>
                                        <div v-if="identification_type_enabled">
                                            <div class="form-group">
                                                <input type="text"
                                                       class="form-control is_identification"
                                                       v-model="form.driving_license_number"
                                                       v-if="driver_license_options"
                                                       :class="[ $v.form.driving_license_number.$dirty && $v.form.driving_license_number.$invalid ? 'is_invalid': '' ]"
                                                       @blur="$v.form.driving_license_number.$touch()"
                                                       name="driving_license_number"
                                                       id="driving_license_number"
                                                       placeholder="Driving License Number*">
                                            </div>
                                            <div class="form-group">
                                                <input type="text"
                                                       class="form-control is_identification"
                                                       v-if="passport_options"
                                                       v-model="form.passport_number"
                                                       :class="[ $v.form.passport_number.$dirty && $v.form.passport_number.$invalid ? 'is_invalid': '' ]"
                                                       @blur="$v.form.passport_number.$touch()"
                                                       name="passport_number"
                                                       id="passport_number"
                                                       placeholder="Passport Number*">
                                            </div>
                                            <div class="form-group">
                                                <input type="text"
                                                       class="form-control is_identification"
                                                       v-if="state_id_options"
                                                       v-model="form.state_id_number"
                                                       :class="[ $v.form.state_id_number.$dirty && $v.form.state_id_number.$invalid ? 'is_invalid': '' ]"
                                                       @blur="$v.form.state_id_number.$touch()"
                                                       name="state_id_number"
                                                       id="state_id_number"
                                                       placeholder="State ID*">
                                            </div>
                                            <div class="form-group">
                                                <input type="text"
                                                       class="form-control is_identification"
                                                       name="identification_issue_date"
                                                       v-model="form.identification_issue_date"
                                                       :class="[ $v.form.identification_issue_date.$dirty && $v.form.identification_issue_date.$invalid ? 'is_invalid': '' ]"
                                                       @blur="$v.form.identification_issue_date.$touch()"
                                                       id="identification_issue_date"
                                                       placeholder="Issue Date* (DD/MM/YYYY)"
                                                       data-date-format="DD MM YYYY"
                                                       max="2090-12-31"
                                                       onfocus="(this.type='date')">
                                            </div>
                                            <div class="form-group">
                                                <input type="text"
                                                       class="form-control is_identification"
                                                       name="identification_expiry_date"
                                                       v-model="form.identification_expiry_date"
                                                       :class="[ $v.form.identification_expiry_date.$dirty && $v.form.identification_expiry_date.$invalid ? 'is_invalid': '' ]"
                                                       @blur="$v.form.identification_expiry_date.$touch()"
                                                       id="identification_expiry_date"
                                                       placeholder="Exipry Date* (DD/MM/YYYY)"
                                                       data-date-format="DD MM YYYY"
                                                       max="2090-12-31"
                                                       onfocus="(this.type='date')">
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control is_identification"
                                                        placeholder="State"
                                                        v-if="driver_license_options || state_id_options"
                                                        v-model="form.identification_state_id"
                                                        :class="[ $v.form.identification_state_id.$dirty && $v.form.identification_state_id.$invalid ? 'is_invalid': '' ]"
                                                        @blur="$v.form.identification_state_id.$touch()"
                                                        name="identification_state_id"
                                                        id="identification_state_id">
                                                    <option value="" disabled selected hidden>Identification State
                                                    </option>
                                                    <option v-for="state in states" v-model="state.id">{{state.name}}
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control is_identification"
                                                        placeholder="State"
                                                        v-if="passport_options"
                                                        v-model="form.identification_country_id"
                                                        :class="[ $v.form.identification_country_id.$dirty && $v.form.identification_country_id.$invalid ? 'is_invalid': '' ]"
                                                        @blur="$v.form.identification_country_id.$touch()"
                                                        name="identification_country_id"
                                                        id="identification_country_id">
                                                    <option value="" disabled selected hidden>Identification Country
                                                    </option>
                                                    <option v-for="country in countries" v-model="country.id">
                                                        {{country.name}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center group-name ">
                                        <label class="filter-labels title mt-4">Property details</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text"
                                               class="form-control"
                                               v-model="form.street_address"
                                               :class="[ $v.form.street_address.$dirty && $v.form.street_address.$invalid ? 'is_invalid': '' ]"
                                               @blur="$v.form.street_address.$touch()"
                                               name="street_address"
                                               id="street_address"
                                               placeholder="Permanent Address*">
                                    </div>
                                    <div class="form-group">
                                        <input type="text"
                                               class="form-control"
                                               v-model="form.appartment"
                                               :class="[ $v.form.appartment.$dirty && $v.form.appartment.$invalid ? 'is_invalid': '' ]"
                                               @blur="$v.form.appartment.$touch()"
                                               name="appartment"
                                               id="appartment"
                                               placeholder="Apt. Suite,Bldg. (opt)">
                                    </div>
                                    <div class="form-group">
                                        <input type="text"
                                               class="form-control"
                                               v-model="form.city"
                                               :class="[ $v.form.city.$dirty && $v.form.city.$invalid ? 'is_invalid': '' ]"
                                               @blur="$v.form.city.$touch()"
                                               name="city"
                                               id="city"
                                               placeholder="City*">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control"
                                                placeholder="State"
                                                v-model="form.state_id"
                                                :class="[ $v.form.state_id.$dirty && $v.form.state_id.$invalid ? 'is_invalid': '' ]"
                                                @blur="$v.form.state_id.$touch()"
                                                id="state_id"
                                                name="state_id">
                                            <option value="" disabled selected hidden>State</option>
                                            <option v-for="state in states" v-model="state.id">{{state.name}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text"
                                               class="form-control"
                                               v-model="form.zipcode"
                                               :class="[ $v.form.zipcode.$dirty && $v.form.zipcode.$invalid ? 'is_invalid': '' ]"
                                               @blur="$v.form.zipcode.$touch()"
                                               name="zipcode"
                                               id="zipcode"
                                               placeholder="Zip Code*">
                                    </div>
                                </form>
                            </div>
                        </div>

                    </section>

                </div>
            </div>
        </div>
        <section class="bg-white">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 ">
                        <div class="card custom-card border-0">
                            <div class="card-body">

                                <shipping-address :customer="customer"></shipping-address>

                                <payment-breakdown :customer_order="customer_order" :customer="customer" :session="{controlling_admin_id: null}"></payment-breakdown>

                                <input type="hidden" id="loyal_exist" v-model="customer.is_loyalty_member">

                                <div v-if="!customer.is_loyalty_member">

                                    <loyalty
                                        :subscription_details="subscription_details"
                                        @changed="handleloyalty"></loyalty>

                                    <div v-show="join_loyalty">
                                        <article class="valid-card text-center cc_field mt-4">
                                            <div class="title">Enter valid debit or credit card below</div>
                                        </article>
                                        <article class="dev-note mt-4 text-center cc_field">
                                            <div class="form-group mb-0">
                                                <stripe :isTest="_customer.is_test"></stripe>
                                            </div>
                                            <div v-if="_customer.is_test" class="text-left">
                                                <strong>Test Card:</strong> 4242 4242 4242 4242<br>
                                                <strong>Date:</strong> Any Future Date<br>
                                                <strong>CVC:</strong> Any Three Digit Number
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-blue btn-lg btn-block mt-14"
                                        form="purchase_bank_financing_form" id="purchase_button"
                                        @click.prevent="submitForm">Apply Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-5"></div>
        </section>
        <shipping-address-modal></shipping-address-modal>
    </section>
</template>

<script>
    import MaskedInput from 'vue-text-mask';
    import {required, minLength, sameAs, email} from 'vuelidate/lib/validators';

    export default {
        name: "BankFinancing",
        components: {MaskedInput},
        props: ['payment_method_key', 'customer', '_customer', 'customer_order', 'states', 'countries', 'subscription_details'],
        data() {
            return {
                ownOptions: [
                    {text: '0% Interest for 6 Months'},
                    {text: '0% Interest for 12 Months'},
                    {text: '49/month + tax'},
                    {text: '39/month + tax'}
                    ],
                rentOptions: [
                    {text: 'Monthly payment $80 - $130'},
                    {text: '1 Year Same as Cash, 0% interest'}
                    ],
                financeOptions: [],
                is_owner: true,
                join_loyalty: false,
                identification_type_enabled: false,
                driver_license_options: false,
                passport_options: false,
                state_id_options: false,
                is_customer_applicant: false,
                form: {
                    own_home: '',
                    finance_type: '',
                    firstname: '',
                    lastname: '',
                    email: '',
                    confirm_email: '',
                    phone: '',
                    dob: '',
                    ssn: '',
                    employer_name: '',
                    year_job: '',
                    month_job: '',
                    annual_income: '',
                    income_type: '',
                    gross_monthly_income: '',
                    identification_type: '',
                    driving_license_number: '',
                    passport_number: '',
                    state_id_number: '',
                    state_id: '',
                    zipcode: '',
                    identification_issue_date: '',
                    identification_expiry_date: '',
                    identification_state_id: '',
                    identification_country_id: '',
                    street_address: '',
                    city: '',
                    appartment: '',
                }
            }
        },
        validations() {
            if (this.is_owner && this.form.identification_type == 'Driving License Number') {
                return {
                    form: {
                        own_home: {required},
                        finance_type: {required},
                        firstname: {required},
                        lastname: {required},
                        email: {required, email},
                        phone: {required},
                        confirm_email: {
                            sameAs: sameAs('email'),
                            email
                        },
                        dob: {required},
                        ssn: {required},
                        employer_name: {required},
                        annual_income: {required},
                        identification_type: {required},
                        driving_license_number: {required},
                        identification_issue_date: {required},
                        identification_expiry_date: {required},
                        identification_state_id: {required},
                        street_address: {required},
                        appartment: {required},
                        city: {required},
                        zipcode: {required},
                        state_id: {required},
                    }
                }
            } else if (this.is_owner && this.form.identification_type == 'Passport Number') {
                return {
                    form: {
                        own_home: {required},
                        finance_type: {required},
                        firstname: {required},
                        lastname: {required},
                        email: {required, email},
                        phone: {required},
                        confirm_email: {
                            sameAs: sameAs('email'),
                            email
                        },
                        dob: {required},
                        ssn: {required},
                        employer_name: {required},
                        annual_income: {required},
                        identification_type: {required},
                        passport_number: {required},
                        identification_issue_date: {required},
                        identification_expiry_date: {required},
                        identification_country_id: {required},
                        street_address: {required},
                        appartment: {required},
                        city: {required},
                        zipcode: {required},
                        state_id: {required},
                    }
                }
            } else if (this.is_owner && this.form.identification_type == 'State ID') {
                return {
                    form: {
                        own_home: {required},
                        finance_type: {required},
                        firstname: {required},
                        lastname: {required},
                        email: {required, email},
                        phone: {required},
                        confirm_email: {
                            sameAs: sameAs('email'),
                            email
                        },
                        dob: {required},
                        ssn: {required},
                        employer_name: {required},
                        annual_income: {required},
                        identification_type: {required},
                        state_id_number: {required},
                        identification_issue_date: {required},
                        identification_expiry_date: {required},
                        identification_state_id: {required},
                        street_address: {required},
                        appartment: {required},
                        city: {required},
                        zipcode: {required},
                        state_id: {required},
                    }
                }
            } else if (this.is_owner) {
                return {
                    form: {
                        own_home: {required},
                        finance_type: {required},
                        firstname: {required},
                        lastname: {required},
                        email: {required, email},
                        phone: {required},
                        confirm_email: {
                            sameAs: sameAs('email'),
                            email
                        },
                        dob: {required},
                        ssn: {required},
                        employer_name: {required},
                        annual_income: {required},
                        identification_type: {required},
                        street_address: {required},
                        appartment: {required},
                        city: {required},
                        zipcode: {required},
                        state_id: {required},
                    }
                }
            } else {
                return {
                    form: {
                        own_home: {required},
                        finance_type: {required},
                        firstname: {required},
                        lastname: {required},
                        email: {required, email},
                        phone: {required},
                        confirm_email: {
                            sameAs: sameAs('email'),
                            email
                        },
                        dob: {required},
                        ssn: {required},
                        employer_name: {required},
                        year_job: {required},
                        month_job: {required},
                        street_address: {required},
                        appartment: {required},
                        city: {required},
                        zipcode: {required},
                        state_id: {required},
                        income_type: {required},
                        gross_monthly_income: {required},
                    }
                }
            }
        },
        methods: {
            is_applicant($event) {
                if (this.is_customer_applicant) {
                    this.form.firstname = this.customer.firstname;
                    this.form.lastname = this.customer.lastname;
                    this.form.email = this.customer.email;
                    this.form.phone = this.customer.phone;
                    this.form.street_address = this.customer.street_address;
                    this.form.city = this.customer.city;
                    this.form.appartment = this.customer.appartment;
                    this.form.zipcode = this.customer.zipcode;
                } else {
                    this.form.firstname = '';
                    this.form.lastname = '';
                    this.form.email = '';
                    this.form.phone = '';
                    this.form.street_address = '';
                    this.form.city = '';
                    this.form.appartment = '';
                    this.form.zipcode = '';
                }
            },
            handleloyalty(value) {
                this.join_loyalty = value;
            },
            submitForm() {
                this.$v.$touch();
                console.log(this.$el.querySelector('.stripe-card'));
                console.log(this.$v)
                if (this.$v.$invalid) {
                    console.log("form is invalid");
                } else {
                    console.log("form is valid");
                    console.log(this.form);
                }
            },
            change_home_status: function (event) {
                this.form.finance_type = '';
                if (event.target.value == 0) {
                    this.financeOptions = this.rentOptions;
                    this.is_owner = false;
                } else if (event.target.value == 1) {
                    this.financeOptions = this.ownOptions;
                    this.is_owner = true;
                    this.identification_type_enabled = false;
                }
            },
            change_identification_type: function (event) {
                if (event.target.value == '') {
                    this.identification_type_enabled = false;
                } else if (event.target.value == 'Driving License Number') {
                    this.identification_type_enabled = true;
                    this.driver_license_options = true;
                    this.passport_options = false;
                    this.state_id_options = false;
                } else if (event.target.value == 'Passport Number') {
                    this.identification_type_enabled = true;
                    this.driver_license_options = false;
                    this.passport_options = true;
                    this.state_id_options = false;
                } else {
                    this.identification_type_enabled = true;
                    this.driver_license_options = false;
                    this.passport_options = false;
                    this.state_id_options = true;
                }
            },
        },
    }
</script>
