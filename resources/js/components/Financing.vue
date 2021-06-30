<template>
    <div class="accordion" role="tablist">
        <b-card class="custom-card shadow-sm" v-if="!showThankYou" @blur="emitFinance">
            <div>
                <hr class="divider">
                <div class="d-flex flex-row justify-content-between" :class="[ !showFinancingOpts ? 'my-3': '' ]">
                    <p
                        class="d-inline-block mb-0 title font-23 accordian-title"
                        :class="[ showFinancingOpts ? 'my-2': '' ]">
                        Financing Options
                    </p>
                    <b-button
                        v-if="!showFinancingOpts"
                        @click="editcollapse('financing')"
                        class="mb-0 description font-23 bg-white border-0">Edit
                    </b-button>
                </div>
            </div>
            <b-collapse accordion="financing" role="tabpanel" v-model="showFinancingOpts" visible>
                <b-form v-if="showFinancingOpts">
                    <p class="font-22 font-weight-bold">Do you own or rent your home?</p>
                    <b-form-group>
                        <b-form-radio-group @change="change_home_status($event)"
                                            :options="financeRent"
                                            v-model="financing.own_home"
                                            :class="[ $v.financing.own_home.$dirty && $v.financing.own_home.$invalid ? 'is_invalid': '' ]"
                                            size="lg"
                                            stacked
                                            :disabled="isCoApplicant === 1"
                        ></b-form-radio-group>
                    </b-form-group>

                    <p class="font-22 font-weight-bold">Select a finance option</p>
                    <b-form-group>
                        <b-form-radio-group
                            :options="financeOptions"
                            v-model="financing.financing_type"
                            :class="[ $v.financing.financing_type.$dirty && $v.financing.financing_type.$invalid ? 'is_invalid': '' ]"
                            size="lg"
                            stacked
                            :disabled="isCoApplicant === 1"
                        ></b-form-radio-group>
                    </b-form-group>

                    <b-button @click="nextCollapse('applicant')" block variant="outline-primary"
                              class="my-4">
                        Continue
                    </b-button>
                </b-form>
            </b-collapse>
            <div>
                <hr class="divider">
                <div class="d-flex flex-row justify-content-between" :class="[ !showApplicant ? 'my-3': '' ]">
                    <p class="d-inline-block mb-0 title font-23 accordian-title"
                       :class="[ showApplicant ? 'my-2': '' ]">Applicant Information</p>
                    <b-button
                        v-if="!showApplicant && showApplicantEnabled"
                        @click="editcollapse('applicant')"
                        class="mb-0 description font-23 bg-white border-0">Edit
                    </b-button>
                </div>
            </div>
            <b-collapse accordion="financing" role="tabpanel" v-model="showApplicant">
                <b-form v-if="showApplicant">
                    <p class="font-18 color-dove-gray font-weight-bold">Is the applicant the same person as {{account.firstname}} {{account.lastname}}?</p>
                    <b-form-group class="mb-2">
                        <b-form-radio-group
                            :options="applicationRegister"
                            v-model="financing.is_applicant"
                            @change="isApplicant($event)"
                            :disabled="isCoApplicant === 1"
                            size="lg"
                            stacked
                        ></b-form-radio-group>
                    </b-form-group>

                    <p class="mt-4 font-22 font-weight-bold" v-if="isCoApplicant === 0">Applicant Details:</p>
                    <p class="mt-4 font-22 font-weight-bold" v-else>Co-Applicant Details:</p>
                    <b-form-group class="mb-2">
                        <b-form-input
                            type="text"
                            v-model="financing.firstname"
                            :class="[ $v.financing.firstname.$dirty && $v.financing.firstname.$invalid ? 'is_invalid': '' ]"
                            placeholder="First name"
                        ></b-form-input>
                    </b-form-group>
                    <b-form-group class="mb-2">
                        <b-form-input
                            type="text"
                            v-model="financing.lastname"
                            :class="[ $v.financing.lastname.$dirty && $v.financing.lastname.$invalid ? 'is_invalid': '' ]"
                            placeholder="Last name"
                        ></b-form-input>
                    </b-form-group>
                    <b-form-group class="mb-2">
                        <b-form-input
                            type="text"
                            v-model="financing.email"
                            :class="[ $v.financing.email.$dirty && $v.financing.email.$invalid ? 'is_invalid': '' ]"
                            placeholder="Email address"
                        ></b-form-input>
                    </b-form-group>
                    <b-form-group class="mb-2">
                        <b-form-input
                            type="text"
                            v-model="financing.confirmEmail"
                            :class="[ $v.financing.confirmEmail.$dirty && $v.financing.confirmEmail.$invalid ? 'is_invalid': '' ]"
                            placeholder="Confirm Email address"
                        ></b-form-input>
                    </b-form-group>
                    <b-form-group class="mb-2">
                        <masked-input
                            type="text"
                            :mask="['(', /[1-9]/, /\d/, /\d/, ')', ' ', /\d/, /\d/, /\d/, '-', /\d/, /\d/, /\d/, /\d/]"
                            class="form-control phone"
                            v-model="financing.phone"
                            :class="[ $v.financing.phone.$dirty && $v.financing.phone.$invalid ? 'is_invalid': '' ]"
                            placeholder="Primary Phone*"
                            required>
                        </masked-input>
                    </b-form-group>
                    <b-form-group class="mb-2">
                        <b-form-input
                            type="text"
                            v-model="financing.dob"
                            :class="[ $v.financing.dob.$dirty && $v.financing.dob.$invalid ? 'is_invalid': '' ]"
                            onfocus="(this.type='date')" max="2090-12-31"
                            placeholder="Date of birth"
                        ></b-form-input>
                    </b-form-group>
                    <b-form-group class="mb-2">
                        <masked-input
                            type="text"
                            :mask="[ /[1-9]/, /\d/, /\d/, '-', /\d/, /\d/, '-', /\d/, /\d/, /\d/, /\d/]"
                            class="form-control phone"
                            v-model="financing.ssn"
                            :class="[ $v.financing.ssn.$dirty && $v.financing.ssn.$invalid ? 'is_invalid': '' ]"
                            placeholder="Social security number"
                            required>
                        </masked-input>
                    </b-form-group>
                    <b-form-group class="mb-2">
                        <b-form-input
                            type="text"
                            v-model="financing.employer_name"
                            :class="[ $v.financing.employer_name.$dirty && $v.financing.employer_name.$invalid ? 'is_invalid': '' ]"
                            placeholder="Name of Current Employer*"
                        ></b-form-input>
                    </b-form-group>
                    <b-form-group class="mb-2" v-if="!isOwner">
                        <b-form-input
                            type="text"
                            v-model="financing.year_job"
                            :class="[ $v.financing.year_job.$dirty && $v.financing.year_job.$invalid ? 'is_invalid': '' ]"
                            placeholder="Years at Job*">
                        </b-form-input>
                    </b-form-group>
                    <b-form-group class="mb-2" v-if="!isOwner">
                        <b-form-input
                            type="text"
                            v-model="financing.month_job"
                            :class="[ $v.financing.month_job.$dirty && $v.financing.month_job.$invalid ? 'is_invalid': '' ]"
                            placeholder="Months at Job*">
                        </b-form-input>
                    </b-form-group>
                    <b-form-group class="mb-2" v-if="isOwner">
                        <b-form-input
                            type="text"
                            v-model="financing.annual_income"
                            :class="[ $v.financing.annual_income.$dirty && $v.financing.annual_income.$invalid ? 'is_invalid': '' ]"
                            data-annual_income="24000"
                            placeholder="Annual Income*">
                        </b-form-input>
                    </b-form-group>
                    <b-form-group class="mb-2" v-if="!isOwner">
                        <b-form-select
                            v-model="financing.income_type"
                            :class="[ $v.financing.income_type.$dirty && $v.financing.income_type.$invalid ? 'is_invalid': '' ]"
                            :options="incomeTypeOptions"
                            id="income_type">
                        </b-form-select>
                    </b-form-group>
                    <b-form-group class="mb-2" v-if="!isOwner">
                        <b-form-input
                            type="text"
                            v-model="financing.gross_monthly_income"
                            :class="[ $v.financing.gross_monthly_income.$dirty && $v.financing.gross_monthly_income.$invalid ? 'is_invalid': '' ]"
                            placeholder="Estimate monthly income"
                        ></b-form-input>
                    </b-form-group>

                    <div v-if="isOwner">
                        <div class="form-group text-center group-name identification_type">
                            <label class="filter-labels title mt-4">Identification details</label>
                        </div>
                        <b-form-group class="mb-2">
                            <b-form-select
                                class="form-control identification_type"
                                placeholder=""
                                :value="identificationType"
                                :class="[ $v.financing.identification_type.$dirty && $v.financing.identification_type.$invalid ? 'is_invalid': '' ]"
                                :options="identificationTypes"
                                name="identification_type"
                                @change="changeIdentificationType">
                            </b-form-select>
                        </b-form-group>

                        <div v-if="identificationTypeEnabled">
                            <b-form-group class="mb-2" v-if="driverLicenseOptions">
                                <b-form-input
                                    type="text"
                                    class="form-control is_identification"
                                    v-model="financing.driving_license_number"
                                    :class="[ $v.financing.driving_license_number.$dirty && $v.financing.driving_license_number.$invalid ? 'is_invalid': '' ]"
                                    placeholder="Driving License Number*">
                                </b-form-input>
                            </b-form-group>

                            <b-form-group class="mb-2" v-if="passportOptions">
                                <b-form-input
                                    type="text"
                                    class="form-control is_identification"
                                    v-model="financing.passport_number"
                                    :class="[ $v.financing.passport_number.$dirty && $v.financing.passport_number.$invalid ? 'is_invalid': '' ]"
                                    name="passport_number"
                                    id="passport_number"
                                    placeholder="Passport Number*"></b-form-input>
                            </b-form-group>

                            <b-form-group class="mb-2" v-if="stateIdOptions">
                                <b-form-input
                                    type="text"
                                    class="form-control is_identification"
                                    v-model="financing.state_id_number"
                                    :class="[ $v.financing.state_id_number.$dirty && $v.financing.state_id_number.$invalid ? 'is_invalid': '' ]"
                                    placeholder="State ID*"></b-form-input>
                            </b-form-group>

                            <b-form-group class="mb-2">
                                <b-form-input
                                    type="text"
                                    class="form-control is_identification"
                                    name="identification_issue_date"
                                    ref="issueDate"
                                    v-model="financing.identification_issue_date"
                                    :class="[ $v.financing.identification_issue_date.$dirty && $v.financing.identification_issue_date.$invalid ? 'is_invalid': '' ]"
                                    id="identification_issue_date"
                                    placeholder="Issue Date* (DD/MM/YYYY)"
                                    data-date-format="DD MM YYYY"
                                    max="2090-12-31"
                                    onfocus="(this.type='date')"></b-form-input>
                            </b-form-group>

                            <b-form-group class="mb-2">
                                <b-form-input
                                    type="text"
                                    class="form-control is_identification"
                                    name="identification_expiry_date"
                                    ref="expiryDate"
                                    v-model="financing.identification_expiry_date"
                                    :class="[ $v.financing.identification_expiry_date.$dirty && $v.financing.identification_expiry_date.$invalid ? 'is_invalid': '' ]"
                                    id="identification_expiry_date"
                                    placeholder="Exipry Date* (DD/MM/YYYY)"
                                    data-date-format="DD MM YYYY"
                                    max="2090-12-31"
                                    onfocus="(this.type='date')"></b-form-input>
                            </b-form-group>

                            <b-form-group class="mb-2" v-if="driverLicenseOptions || stateIdOptions">
                                <b-form-select
                                    class="form-control is_identification"
                                    placeholder="State"
                                    :class="[ $v.financing.identification_state_id.$dirty && $v.financing.identification_state_id.$invalid ? 'is_invalid': '' ]"
                                    v-model="financing.identification_state_id">
                                    <b-form-select-option value="" disabled selected>Identification State
                                    </b-form-select-option>
                                    <b-form-select-option v-for="state in states" :key="state.id" :value="state.id">{{state.name}}
                                    </b-form-select-option>
                                </b-form-select>
                            </b-form-group>

                            <b-form-group class="mb-2" v-if="passportOptions">
                                <b-form-select
                                    class="form-control is_identification"
                                    placeholder="State"
                                    :class="[ $v.financing.identification_country_id.$dirty && $v.financing.identification_country_id.$invalid ? 'is_invalid': '' ]"
                                    v-model="financing.identification_country_id">
                                    <b-form-select-option value="" disabled selected>Identification Country
                                    </b-form-select-option>
                                    <b-form-select-option v-for="country in countries" :key="country.id" :value="country.id">
                                        {{country.name}}
                                    </b-form-select-option>
                                </b-form-select>
                            </b-form-group>
                        </div>
                    </div>

                    <b-button @click="nextCollapse('property')" block variant="outline-primary" class="my-4">
                        Continue
                    </b-button>
                </b-form>
            </b-collapse>

            <div>
                <hr class="divider">
                <div class="d-flex flex-row justify-content-between" :class="[ !showProperty ? 'my-3': '' ]">
                    <p class="d-inline-block mb-0 title font-23 accordian-title">Property Address</p>
                    <b-button
                        v-if="!showProperty && showPropertyEnabled"
                        @click="editcollapse('property')"
                        class="mb-0 description font-23 bg-white border-0">Edit
                    </b-button>
                </div>
            </div>

            <b-collapse accordion="financing" role="tabpanel" v-model="showProperty">
                <b-form v-if="showProperty">
                    <p class="font-18 color-dove-gray font-weight-bold">What is the address of the home you (rent/own):</p>
                    <b-form-group class="mb-2">
                        <b-form-input
                            type="text"
                            v-model="financing.street"
                            :class="[ $v.financing.street.$dirty && $v.financing.street.$invalid ? 'is_invalid': '' ]"
                            placeholder="Street address"
                        ></b-form-input>
                    </b-form-group>
                    <b-form-group class="mb-2">
                        <b-form-input
                            type="text"
                            v-model="financing.apartment"
                            placeholder="Apt. Suit. Unit #"
                        ></b-form-input>
                    </b-form-group>
                    <b-form-group class="mb-2">
                        <b-form-input
                            type="text"
                            v-model="financing.city"
                            :class="[ $v.financing.city.$dirty && $v.financing.city.$invalid ? 'is_invalid': '' ]"
                            placeholder="City"
                        ></b-form-input>
                    </b-form-group>
                    <b-form-group class="mb-2">
                        <b-form-select
                            class="form-control is_identification"
                            placeholder="State"
                            :class="[ $v.financing.state_id.$dirty && $v.financing.state_id.$invalid ? 'is_invalid': '' ]"
                            v-model="financing.state_id">
                            <b-form-select-option value="" disabled selected>State
                            </b-form-select-option>
                            <b-form-select-option v-for="state in states" :key="state.id" :value="state.id">{{state.name}}
                            </b-form-select-option>
                        </b-form-select>
                    </b-form-group>
                    <b-form-group class="mb-2">
                        <b-form-input
                            type="text"
                            v-model="financing.zip"
                            :class="[ $v.financing.zip.$dirty && $v.financing.zip.$invalid ? 'is_invalid': '' ]"
                            placeholder="Zip Code"
                        ></b-form-input>
                    </b-form-group>
                    <b-form-group class="mb-2">
                        <b-form-input
                            type="text"
                            placeholder="Years lived at residence"
                        ></b-form-input>
                    </b-form-group>

                    <b-button @click="nextTab" v-if="isCoApplicant === 0" block variant="outline-primary" class="my-4">
                        Continue
                    </b-button>

                    <b-button @click="saveCoApplicant" :disabled="wait" v-else block variant="outline-primary" class="my-4">
                        Save
                    </b-button>
                </b-form>
            </b-collapse>

        </b-card>
    </div>
</template>

<script>
    import MaskedInput from 'vue-text-mask';
    import {required, minLength, sameAs, email, requiredIf} from 'vuelidate/lib/validators'
    import {validPhone, validSSN, validDOB} from '../validators/CustomValidation';

    export default {
        name: "Financing",
        props:['account','states','countries','finance','isCoApplicant'],
        components: {MaskedInput},
        data() {
            return {
                showFinancingOpts: true,
                showApplicant: false,
                showProperty: false,
                IndentificationShow: true,

                showApplicantEnabled: false,
                showPropertyEnabled: false,

                isOwner: true,
                identificationTypeEnabled: false,
                driverLicenseOptions: false,
                passportOptions: false,
                stateIdOptions: false,
                isCustomerApplicant: false,

                showThankYou: false,

                financeOptions: [],
                identificationTypes: [
                    {text: 'Select Identification Type', value: '', disabled: true },
                    {text: 'Driving License Number', value: 'Driving License Number'},
                    {text: 'Passport Number', value: 'Passport Number'},
                    {text: 'State ID', value: 'State ID'},
                ],
                incomeTypeOptions:[
                    {text: 'Select option', value: '', disabled: true },
                    {text: 'Full-time', value: 'Full-time'},
                    {text: 'Part-time', value: 'Part-time'},
                    {text: 'Self-employed', value: 'Self-employed'},
                    {text: 'Temporary', value: 'Temporary'},
                    {text: 'Seasonal', value: 'Seasonal'},
                    {text: 'Retired', value: 'Retired'},
                    {text: 'Military', value: 'Military'},
                ],
                applicationRegister: [
                    {text: 'Yes', value: 1},
                    {text: 'No', value: 0},
                ],
                ownOptions:[
                    {text: '0% Interest for 6 Months', value: '0% Interest for 6 Months'},
                    {text: '0% Interest for 12 Months', value: '0% Interest for 12 Months'},
                    {text: '49/month + tax', value: '49/month + tax'},
                    {text: '39/month + tax', value: '39/month + tax'}
                ],
                rentOptions: [
                    {text: 'Monthly payment $80 - $130', value: 'Monthly payment $80 - $130'},
                    {text: '1 Year Same as Cash, 0% interest', value: '1 Year Same as Cash, 0% interest'}
                ],
                financeRent:[
                    {text: 'Own', value: 1},
                    {text: 'Rent', value: 0},
                ],
                orderId: '',
                parentId: '',
                identificationType: '',
                wait: false,

                financing: {
                    own_home: '',
                    financing_type: '',
                    firstname: '',
                    lastname: '',
                    email: '',
                    confirmEmail: '',
                    phone: '',
                    dob: '',
                    ssn: '',
                    is_applicant:'',
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
                    identification_issue_date: '',
                    identification_expiry_date: '',
                    identification_state_id: '',
                    identification_country_id: '',
                    state_id: '',
                    street: '',
                    city: '',
                    apartment: '',
                    zip: '',
                },
            }
        },
        validations()
        {
            if(this.showFinancingOpts){
                return{
                    financing:{
                        own_home: {required},
                        financing_type: {required},
                    }
                }
            }
            else if(this.showApplicant){
                return{
                    financing:{
                        firstname: {required},
                        lastname: {required},
                        email: {required, email},
                        phone: {required, validPhone},
                        confirmEmail: {
                            sameAs: sameAs('email'),
                            email
                        },
                        dob: {required, validDOB},
                        ssn: {required, validSSN},
                        employer_name: {required},

                        gross_monthly_income: {
                            required: requiredIf(() => {
                                return this.isOwner === false;
                            })
                        },
                        income_type: {
                            required: requiredIf(() => {
                                return this.isOwner === false;
                            })
                        },
                        year_job: {
                            required: requiredIf(() => {
                                return this.isOwner === false;
                            })
                        },
                        month_job: {
                            required: requiredIf(() => {
                                return this.isOwner === false;
                            })
                        },
                        annual_income: {
                            required: requiredIf(() => {
                                return this.isOwner === true;
                            })
                        },
                        identification_type: {
                            required: requiredIf(() => {
                                return this.isOwner === true;
                            })
                        },
                        state_id_number: {
                            required: requiredIf(() => {
                                return this.isOwner === true && this.financing.identification_type === 'State ID';
                            })
                        },
                        driving_license_number: {
                            required: requiredIf(() => {
                                return this.isOwner === true && this.financing.identification_type === 'Driving License Number';
                            })
                        },
                        identification_issue_date: {
                            required: requiredIf(() => {
                                return this.isOwner === true && this.financing.identification_type !== '';
                            }),
                            validate(val, {identification_expiry_date}){
                                if(this.isOwner === true && this.financing.identification_type !== '')
                                {
                                    var current = new Date();
                                    var issue_date = new Date(val);
                                    var expiry_date = new Date(identification_expiry_date);

                                    if(issue_date.getTime() >= expiry_date.getTime() ||  issue_date.getTime() >= current.getTime())
                                        return false;
                                    return true;
                                }
                                return true;
                            },
                        },
                        identification_expiry_date: {
                            required: requiredIf(() => {
                                return this.isOwner === true && this.financing.identification_type !== '';
                            }),
                            validate(val, {identification_issue_date}){
                                if(this.isOwner === true && this.financing.identification_type !== '')
                                {
                                    var current = new Date();
                                    var issue_date = new Date(identification_issue_date);
                                    var expiry_date = new Date(val);

                                    if(issue_date.getTime() >= expiry_date.getTime() ||  issue_date.getTime() >= current.getTime())
                                        return false;
                                    else if( expiry_date.getTime() <= current.getTime() )
                                        return false;
                                    return true;
                                }
                                return true;
                            },
                        },
                        identification_state_id: {
                            required: requiredIf(() => {
                                return this.isOwner === true && (this.financing.identification_type === 'State ID' || this.financing.identification_type === 'Driving License Number');
                            })
                        },

                        passport_number: {
                            required: requiredIf(() => {
                                return this.isOwner === true && this.financing.identification_type === 'Passport Number';
                            })
                        },
                        identification_country_id: {
                            required: requiredIf(() => {
                                return this.isOwner === true && this.financing.identification_type === 'Passport Number';
                            })
                        },
                    }
                }
            }
            else if(this.showProperty){
                return{
                    financing:{
                        state_id: {required},
                        street: {required},
                        city: {required},
                        zip: {required},
                    }
                }
            }
        },
        methods:{
            editcollapse(value)
            {
                if (value === 'financing')
                {
                    this.showApplicant   =  false;
                    this.showProperty    =  false;
                    this.showFinancingOpts =  !this.showFinancingOpts;
                }
                else if(value === 'applicant')
                {
                    this.showFinancingOpts   =  false;
                    this.showProperty    =  false;
                    this.showApplicant   =  !this.showApplicant;
                }
                else
                {
                    this.showFinancingOpts   =  false;
                    this.showApplicant    =  false;
                    this.showProperty    =  !this.showProperty;
                }
            },
            change_home_status(event)
            {
                this.financing.financing_type = '';
                if( event === 0 ){
                    this.isOwner = false;
                    this.financeOptions = this.rentOptions;
                }
                else
                {
                    this.isOwner = true;
                    this.financeOptions = this.ownOptions;
                }
                this.gross_monthly_income = '';
                this.income_type = '';
                this.year_job = '';
                this.month_job = '';
                this.annual_income = '';
                this.identification_type = '';
                this.state_id_number = '';
                this.driving_license_number = '';
                this.identification_issue_date = '';
                this.identification_expiry_date = '';
                this.identification_state_id = '';
                this.passport_number = '';
                this.identification_country_id = '';
            },
            isApplicant(event)
            {
                if( event === 1 )
                {
                    this.financing.firstname = this.account.firstname;
                    this.financing.lastname = this.account.lastname;
                    this.financing.email = this.account.email;
                    this.financing.confirmEmail = this.account.email;
                }
                else
                {
                    this.financing.firstname = '';
                    this.financing.lastname = '';
                    this.financing.email = '';
                    this.financing.confirmEmail = '';
                }
            },
            emitFinance()
            {
                this.$emit('emitFinance',this.financing);
            },
            nextTab()
            {
                this.$v.$touch();
                if( !this.$v.$invalid )
                    this.$emit('emitData',this.financing);
            },
            nextCollapse(value) {
                if (value == 'applicant')
                {
                    this.$v.$touch();
                    if( !this.$v.$invalid )
                    {
                        this.showFinancingOpts = false;
                        this.showApplicantEnabled = true;
                        this.showApplicant = true;
                    }
                }
                else if (value == 'property')
                {
                    this.$v.$touch();
                    if( !this.$v.$invalid )
                    {
                        this.showApplicant = false;
                        this.showPropertyEnabled = true;
                        this.showProperty = true;
                    }
                }
            },
            changeIdentificationType(event) {
                this.$v.$reset();
                this.financing.driving_license_number = '';
                this.financing.passport_number = '';
                this.financing.state_id_number = '';
                this.financing.state_id = '';
                this.financing.identification_issue_date = '';
                this.financing.identification_expiry_date = '';
                this.financing.identification_state_id = '';
                this.financing.identification_country_id = '';

                if (event === '') {
                    this.identificationTypeEnabled = false;
                } else if (event === 'Driving License Number') {
                    this.identificationTypeEnabled = true;
                    this.passportOptions = false;
                    this.stateIdOptions = false;
                    this.driverLicenseOptions = true;
                } else if (event === 'Passport Number') {
                    this.identificationTypeEnabled = true;
                    this.driverLicenseOptions = false;
                    this.stateIdOptions = false;
                    this.passportOptions = true;
                } else {
                    this.identificationTypeEnabled = true;
                    this.driverLicenseOptions = false;
                    this.passportOptions = false;
                    this.stateIdOptions = true;
                }

                this.financing.identification_type = event;
            },
            saveCoApplicant()
            {
                this.wait = true;
                axios.post(`api/save-coapplicant`, {
                    uid: this.account.uid,
                    financing: this.financing,
                    orderId: this.orderId,
                    parentId: this.parentId,
                })
                    .then(response => {
                        if(response.data.status === 'Success')
                        {
                            this.showThankYou = true;
                            document.getElementById('content').classList.add('d-none');
                            document.getElementById('thank_you_message').classList.remove('d-none');
                        }
                        else
                            this.wait = false;
                    }).catch(error => {
                    console.log(error);
                });
            },
        },
        mounted(){
            if(this.isCoApplicant === 1)
            {
                this.showApplicantEnabled = true;
                this.showPropertyEnabled = true;

                this.financing.own_home = this.finance.own_home;

                this.isOwner = this.financing.own_home === 1;
                if(this.isOwner)
                    this.financeOptions = this.ownOptions;
                else {
                    this.financeOptions = this.rentOptions;
                }

                this.financing.is_applicant = this.finance.is_applicant;
                this.financing.financing_type = this.finance.financing_type;
                this.orderId = this.finance.order_id;
                this.parentId = this.finance.id;
            }
            else if(this.finance !== null)
            {
                this.financing = this.finance;
                this.showApplicantEnabled = true;
                this.showPropertyEnabled = true;

                this.isOwner = this.financing.own_home === 1;
                if(this.isOwner)
                    this.financeOptions = this.ownOptions;
                else {
                    this.financeOptions = this.rentOptions;
                }

                if(this.isOwner)
                {
                    this.identificationTypeEnabled = true;
                    this.identificationType = this.financing.identification_type;

                    if( this.financing.identification_type === 'Driving License Number' )
                    {
                        this.driverLicenseOptions = true;
                    }
                    else if( this.financing.identification_type === 'Passport Number' )
                    {
                        this.passportOptions = true;
                    }
                    else
                    {
                        this.stateIdOptions = true;
                    }
                }
            }
            else
            {
                this.financeOptions = this.ownOptions;
            }
        }
    }
</script>
