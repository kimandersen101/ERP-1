<template>
    <div>
        <b-tabs ref="tabs" content-class="mt-4" v-model="tabIndex" justified>
            <b-tab title="Create Account" active>
                <div class="accordion" role="tablist">
                    <b-card class="custom-card shadow-sm mw-100">
                        <div>
                            <hr class="divider">
                            <div class="d-flex flex-row justify-content-between"
                                 :class="[ !showRegister ? 'my-3': '' ]">
                                <p class="d-inline-block mb-0 title font-23 accordian-title"
                                   :class="[ showRegister ? 'my-2': '' ]">
                                    Register
                                </p>
                                <b-button
                                    v-if="!showRegister"
                                    @click="openCollapse('register')"
                                    class="mb-0 description font-23 bg-white border-0">
                                    Edit
                                </b-button>
                            </div>
                        </div>
                        <b-collapse accordion="register" v-model="showRegister" role="tabpanel" visible>
                            <p class="mb-0 color-light-gray font-weight-bold">
                                Affiliate Detail
                            </p>
                            <b-form class="mt-2" v-if="showRegister && tabIndex === 0">
                                <b-form-group class="mb-2">
                                    <b-form-input
                                        type="text"
                                        placeholder="First name"
                                        v-model="user.firstname"
                                        :class="[ $v.user.firstname.$dirty && $v.user.firstname.$invalid ? 'is_invalid': '' ]"
                                    ></b-form-input>
                                </b-form-group>
                                <b-form-group class="mb-2">
                                    <b-form-input
                                        type="text"
                                        placeholder="Last name"
                                        v-model="user.lastname"
                                        :class="[ $v.user.lastname.$dirty && $v.user.lastname.$invalid ? 'is_invalid': '' ]"
                                    ></b-form-input>
                                </b-form-group>
                                <b-form-group class="mb-2">
                                    <b-form-input
                                        type="text"
                                        placeholder="Email address"
                                        v-model="user.email"
                                        :class="[ $v.user.email.$dirty && $v.user.email.$invalid ? 'is_invalid': '' ]"
                                    ></b-form-input>
                                </b-form-group>
                                <b-form-group class="mb-2">
                                    <b-form-input
                                        type="text"
                                        placeholder="Confirm email address"
                                        v-model="user.confirmEmail"
                                        :class="[ $v.user.confirmEmail.$dirty && $v.user.confirmEmail.$invalid ? 'is_invalid': '' ]"
                                    ></b-form-input>
                                </b-form-group>
                                <b-form-group class="mb-2">
                                    <masked-input
                                        type="text"
                                        :mask="['(', /[1-9]/, /\d/, /\d/, ')', ' ', /\d/, /\d/, /\d/, '-', /\d/, /\d/, /\d/, /\d/]"
                                        class="form-control phone"
                                        placeholder="Phone*"
                                        v-model="user.phone"
                                        :class="[ $v.user.phone.$dirty && $v.user.phone.$invalid ? 'is_invalid': '' ]"
                                        minlength="14">
                                    </masked-input>
                                </b-form-group>
                                <b-button @click="validateUser" block variant="outline-primary"
                                          class="my-4">
                                    Continue
                                </b-button>
                            </b-form>
                        </b-collapse>

                        <div :class="[ showPassword ? '' : 'mt-4' ]">
                            <hr class="divider">
                            <div class="d-flex flex-row justify-content-between"
                                 :class="[ !showPassword ? 'my-3': '' ]">
                                <p class="d-inline-block mb-0 title font-23 accordian-title"
                                   :class="[ showPassword ? 'my-2': '' ]">
                                    Password
                                </p>
                                <b-button
                                    v-if="!showPassword && showPasswordEnabled"
                                    @click="openCollapse('password')"
                                    class="mb-0 description font-23 bg-white border-0">
                                    Edit
                                </b-button>
                            </div>
                        </div>

                        <b-collapse id="password" accordion="my-accordion" v-model="showPassword"
                                    role="tabpanel">
                            <b-form v-if="showPassword && tabIndex === 0">
                                <b-form-group class="mb-2">
                                    <b-form-input
                                        type="password"
                                        placeholder="Password"
                                        v-model="user.password"
                                        :class="[ $v.user.password.$dirty && $v.user.password.$invalid ? 'is_invalid': '' ]"
                                    ></b-form-input>
                                </b-form-group>
                                <b-form-group class="mb-2">
                                    <b-form-input
                                        type="password"
                                        placeholder="Confirm Password"
                                        v-model="user.confirmPassword"
                                        :class="[ $v.user.confirmPassword.$dirty && $v.user.confirmPassword.$invalid ? 'is_invalid': '' ]"
                                    ></b-form-input>
                                </b-form-group>
                            </b-form>
                            <b-button @click="validatePassword" block variant="outline-primary" class="my-4">
                                Continue
                            </b-button>
                        </b-collapse>

                        <div :class="[ showPassword ? '' : 'mt-4' ]">
                            <hr class="divider">
                            <div class="d-flex flex-row justify-content-between"
                                 :class="[ !showAddress ? 'my-3': '' ]">
                                <p class="d-inline-block mb-0 title font-23 accordian-title"
                                   :class="[ showAddress ? 'my-2': '' ]">
                                    Address
                                </p>
                                <b-button
                                    v-if="!showAddress && showAddressEnabled"
                                    @click="openCollapse('address')"
                                    class="mb-0 description font-23 bg-white border-0">
                                    Edit
                                </b-button>
                            </div>
                        </div>

                        <b-collapse id="address" accordion="my-accordion" v-model="showAddress"
                                    role="tabpanel">
                            <b-form>
                                <b-form-group class="mb-2">
                                    <b-form-input
                                        type="text"
                                        placeholder="Street address"
                                        v-model="address.street"
                                        :class="[ $v.address.street.$dirty && $v.address.street.$invalid ? 'is_invalid': '' ]"
                                    ></b-form-input>
                                </b-form-group>
                                <b-form-group class="mb-2">
                                    <b-form-input
                                        type="text"
                                        placeholder="Apt. Suit. Unit #"
                                        v-model="address.apartment"
                                        :class="[ $v.address.apartment.$dirty && $v.address.apartment.$invalid ? 'is_invalid': '' ]"
                                    ></b-form-input>
                                </b-form-group>
                                <b-form-group class="mb-2">
                                    <b-form-input
                                        type="text"
                                        placeholder="City"
                                        v-model="address.city"
                                        :class="[ $v.address.city.$dirty && $v.address.city.$invalid ? 'is_invalid': '' ]"
                                    ></b-form-input>
                                </b-form-group>
                                <b-form-group class="mb-2">
                                    <b-form-select
                                        class="form-control is_identification"
                                        placeholder="State"
                                        v-model="address.state_id"
                                        :class="[ $v.address.state_id.$dirty && $v.address.state_id.$invalid ? 'is_invalid': '' ]"
                                    >
                                        <b-form-select-option value="" disabled selected>State
                                        </b-form-select-option>
                                        <b-form-select-option v-for="state in states" :key="state.id" :value="state.id">
                                            {{state.name}}
                                        </b-form-select-option>
                                    </b-form-select>
                                </b-form-group>
                                <b-form-group class="mb-2">
                                    <b-form-input
                                        type="text"
                                        placeholder="Zip Code"
                                        v-model="address.zip"
                                        :class="[ $v.address.zip.$dirty && $v.address.zip.$invalid ? 'is_invalid': '' ]"
                                    ></b-form-input>
                                </b-form-group>

                                <b-button @click="validateAddress" :disabled="wait" block variant="outline-primary"
                                          class="my-4">
                                    <b-spinner variant="primary" v-if="wait" class="spinner-button"></b-spinner>
                                    {{ wait ? 'Please wait...': 'Continue' }}
                                </b-button>
                            </b-form>
                        </b-collapse>

                        <hr class="divider">

                    </b-card>
                </div>
            </b-tab>
            <b-tab title="Finalize" :disabled="finalizeTabDisabled">
                <b-card class="custom-card shadow-sm mw-100">

                    <div>
                        <hr class="divider">
                        <div class="d-flex flex-row justify-content-between"
                             :class="[ !showPaymentDetails ? 'my-3': '' ]">
                            <p class="d-inline-block mb-0 title font-23 accordian-title"
                               :class="[ showPaymentDetails ? 'my-2': '' ]">
                                Payment Information
                            </p>
                            <b-button
                                v-if="!showPaymentDetails && showPaymentDetailsEnabled"
                                @click="openFirstCollapse('paymentDetails')"
                                class="mb-0 description font-23 bg-white border-0">
                                Edit
                            </b-button>
                        </div>
                    </div>

                    <b-collapse id="payment" accordion="payment" v-model="showPaymentDetails"
                                role="tabpanel">
                        <p class="mb-0 color-light-gray font-weight-bold">Enter valid debit or credit card below</p>

                        <div class="mt-4">
                            <div class="form-group mb-0">
                                <stripe :isTest="_customer.is_test" :error.sync="stripeErrorMessage"></stripe>
                            </div>
                            <div class="text-left mt-4" v-if="_customer.is_test">
                                <strong>Test Card:</strong> 4242 4242 4242 4242<br>
                                <strong>Date:</strong> Any Future Date<br>
                                <strong>CVC:</strong> Any Three Digit Number
                            </div>
                        </div>

                        <div v-if="tabIndex === 1" class="my-4">
                            <p class="title mb-0">Shipping and Zone</p>
                            <p class="description font-18 mb-0">
                                {{address.street}}<br>
                                {{address.city}}
                                {{getStateAbbr(address.state_id)}}
                                {{address.zip}}<br>
                                {{address.apartment}}
                            </p>
                        </div>

                        <div class="payment-breakdown mt-4">
                            <section>
                                <div class="row" v-for="product in products" :key="product.id">
                                    <div class="col-auto mr-auto title">{{product.name}}</div>
                                    <div class="col-auto amount">
                                        <span>${{numberFormat(product.price)}}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-auto mr-auto title">Sub-Total</div>
                                    <div class="col-auto amount">
                                        ${{ numberFormat(subTotal) }}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-auto mr-auto title">Shipping</div>
                                    <div class="col-auto amount">
                                        ${{numberFormat(totalShipping)}}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-auto mr-auto title">Tax
                                        ({{taxPercent}}%)
                                    </div>
                                    <div class="col-auto amount">${{numberFormat(totalTax)}}
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-auto mr-auto title">Total</div>
                                    <div class="col-auto amount">
                                        ${{numberFormat(totalPrice)}}
                                    </div>
                                </div>
                            </section>
                        </div>

                        <b-button @click="generateStripeToken" block variant="outline-primary"
                                  class="my-4">
                            continue
                        </b-button>
                    </b-collapse>

                    <div>
                        <hr class="divider">
                        <div class="d-flex flex-row justify-content-between"
                             :class="[ !showAgreement ? 'my-3': '' ]">
                            <p class="d-inline-block mb-0 title font-23 accordian-title"
                               :class="[ showAgreement ? 'my-2': '' ]">
                                software-demand.com Agreement
                            </p>
                            <b-button
                                v-if="!showAgreement && showAgreementEnabled"
                                @click="openFirstCollapse('agreement')"
                                class="mb-0 description font-23 bg-white border-0">
                                Edit
                            </b-button>
                        </div>
                    </div>

                    <b-collapse id="finalize" accordion="finalize" v-model="showAgreement"
                                role="tabpanel">
                        <terms-conditions></terms-conditions>

                        <div class="form-group custom-checkbox cross my-auto" v-if="tabIndex === 1">
                            <div class="radio d-flex">
                                <input type="checkbox"
                                       @change="agreement($event)"
                                       class="form-check-input install-options"
                                       id="agrement">
                                <label
                                    class="form-check-label float-left mt-0 mr-2"
                                    :class="[ $v.agree.$dirty && $v.agree.$invalid ? 'is_invalid': '' ]"
                                    for="agrement"></label>
                                <div class="title">
                                    <span class="description font-18 mb-0 d-block">I agree</span>
                                </div>
                            </div>
                        </div>
                        <b-button @click="saveAffiliate" :disabled="wait" block variant="outline-primary"
                                  class="my-4">
                            <b-spinner variant="primary" v-if="wait" class="spinner-button"></b-spinner>
                            {{ wait ? 'Please wait...': 'Complete purchase' }}
                        </b-button>
                    </b-collapse>

                </b-card>
            </b-tab>
        </b-tabs>
    </div>
</template>

<script>

    import {required, requiredIf, sameAs, email, numeric} from 'vuelidate/lib/validators';
    import {createToken} from 'vue-stripe-elements-plus';
    import MaskedInput from 'vue-text-mask';
    import {validPhone} from '../validators/CustomValidation';

    export default {
        name: "Affiliate",
        components: {MaskedInput},
        props: ['states', '_customer', 'products'],
        data() {
            return {
                tabIndex: 0,
                finalizeTabDisabled: true,
                showRegister: true,
                showPassword: false,
                showAddress: false,

                showPaymentDetails: true,
                showAgreement: false,

                showPasswordEnabled: false,
                showAddressEnabled: false,
                showPaymentDetailsEnabled: false,
                showAgreementEnabled: false,

                user: {
                    firstname: '',
                    lastname: '',
                    email: '',
                    confirmEmail: '',
                    phone: '',
                    password: '',
                    confirmPassword: '',
                },
                address: {
                    zip: '',
                    state_id: '',
                    street: '',
                    apartment: '',
                    city: '',
                },
                cart: {
                    tax: 0,
                    tax_percent: null,
                    shipping_price: 0,
                    subtotal: 0,
                    total: 0,
                    items: [],
                },
                agree: '',
                stripeToken: '',
                stripeErrorMessage: '',
                wait: false,
                taxPercent: 0,
                totalPrice: 0,
                subTotal: 0,
                totalTax: 0,
                totalShipping: 0,
                freeShipping: null,
            }
        },
        validations() {
            return {
                user: {
                    firstname: {
                        required: requiredIf(() => {
                            return this.showRegister === true;
                        })
                    },
                    lastname: {
                        required: requiredIf(() => {
                            return this.showRegister === true;
                        })
                    },
                    phone: {
                        required: requiredIf(() => {
                            return this.showRegister === true;
                        }),
                        validatePhone(val) {
                            if (this.showRegister === true) {
                                return validPhone(val);
                            }
                            return true;
                        }
                    },
                    email: {
                        required: requiredIf(() => {
                            return this.showRegister === true;
                        }),
                        email: requiredIf(() => {
                            return this.showRegister === true;
                        }),
                    },
                    confirmEmail: {
                        required: requiredIf(() => {
                            return this.showRegister === true;
                        }),
                        validate(val, {email}) {
                            if (this.showRegister === true) {
                                return val === email ? true : false;
                            }
                            return true;
                        }
                    },
                    password: {
                        required: requiredIf(() => {
                            return this.showPassword === true;
                        })
                    },
                    confirmPassword: {
                        required: requiredIf(() => {
                            return this.showPassword === true;
                        }),
                        validate(val, {password}) {
                            if (this.showPassword === true) {
                                return val === password ? true : false;
                            }
                            return true;
                        }
                    },
                },
                address: {
                    street: {
                        required: requiredIf(() => {
                            return this.showAddress === true;
                        })
                    },
                    zip: {
                        required: requiredIf(() => {
                            return this.showAddress === true;
                        })
                    },
                    state_id: {
                        required: requiredIf(() => {
                            return this.showAddress === true;
                        })
                    },
                    city: {
                        required: requiredIf(() => {
                            return this.showAddress === true;
                        })
                    },
                },
                agree: {
                    required: requiredIf(() => {
                        return this.showAgreement === true;
                    })
                }
            }
        },
        methods: {
            agreement(event) {
                if (event.target.checked)
                    this.agree = true;
                else
                    this.agree = "";
            },
            getStateAbbr(state_id) {
                let state = this.states.find(state => state.id == state_id);
                return state.abbr;
            },
            numberFormat(number) {
                return parseFloat(number).toLocaleString('en', {maximumFractionDigits: 2});
            },
            nextTab() {
                if (this.tabIndex === 0) {
                    this.finalizeTabDisabled = false;
                }
                this.scrollTop();
                setTimeout(() => this.tabIndex += 1, 500);
            },
            scrollTop() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            },
            openCollapse(value) {
                if (value === 'register') {
                    this.showRegister = true;
                    this.showPassword = false;
                    this.showAddress = false;
                } else if (value === 'password') {
                    this.showRegister = false;
                    this.showPassword = true;
                    this.showAddress = false;
                } else {
                    this.showRegister = false;
                    this.showPassword = false;
                    this.showAddress = true;
                }
            },
            openFirstCollapse(value) {
                if (value === 'paymentDetails') {
                    this.showPaymentDetails = true;
                    this.showAgreement = false;
                }
                if (value === 'agreement') {
                    this.showPaymentDetails = false;
                    this.showAgreement = true;
                }
            },
            toggleRegister() {
                this.showRegister = true;
                this.showPassword = false;
            },
            validateUser() {
                this.$v.$touch();
                if (!this.$v.$invalid) {
                    this.$v.$reset();
                    this.showRegister = false;
                    this.showPassword = true;
                    this.showPasswordEnabled = true;
                }
            },
            validatePassword() {
                this.$v.$touch();
                if (!this.$v.$invalid) {
                    this.$v.$reset();
                    this.openCollapse('address');
                    this.showAddressEnabled = true;
                }
            },
            validateAddress() {
                this.$v.$touch();
                if (!this.$v.$invalid) {
                    this.$v.$reset();
                    this.getTax();
                }
            },
            generateStripeToken() {
                this.stripeErrorMessage = '';
                createToken().then(response => {
                    if (response.error && response.error.message) {
                        this.stripeErrorMessage = response.error.message;
                    } else {
                        this.stripeToken = response.token.id;
                        this.showPaymentDetails = false;
                        this.showPaymentDetailsEnabled = true;
                        this.showAgreement = true;
                        this.showAgreementEnabled = true;
                    }
                });
            },
            saveAffiliate() {
                this.$v.$touch();
                if (!this.$v.$invalid) {
                    this.wait = true;
                    axios.post(`api/save-affiliate`, {
                        address: this.address,
                        user: this.user,
                        stripeToken: this.stripeToken,
                        cart: this.cart,
                    }).then(response => {
                        if (response.data.status === "Success") {
                            window.location.href = response.data.redirect_url;
                        } else {
                            this.makeToast('danger', response.data.status, response.data.message);
                            this.generateStripeToken();
                        }
                        this.wait = false;
                    });
                }
            },
            makeToast(variant = null, title, message) {
                this.$bvToast.toast(message, {
                    title: title,
                    toaster: 'b-toaster-top-right',
                    variant: variant,
                    solid: true
                })
            },
            getTax() {
                this.wait = true;
                axios.post(`api/get-tax`, {
                    address: this.address,
                }).then(response => {
                    if (response.data.status === "Success") {
                        this.taxPercent = response.data.tax;
                        this.freeShipping = response.data.shipping;
                        this.calculatePrices();
                        this.nextTab();
                    }
                    this.wait = false;
                });
            },
            calculatePrices() {
                this.totalShipping = 0;
                this.subTotal = 0;
                this.totalTax = 0;
                this.totalPrice = 0;
                this.products.forEach(product => {
                    this.subTotal += product.price;
                    let shipping = this.freeShipping === null ? product.shipping_price : this.freeShipping;
                    this.totalShipping += shipping;
                    this.totalTax += this.taxPercent / 100 * (product.price + shipping);
                });

                this.totalPrice = (this.totalShipping + this.subTotal + this.totalTax);

                this.cart.total = this.totalPrice;
                this.cart.shipping_price = this.totalShipping;
                this.cart.subtotal = this.subTotal;
                this.cart.tax = this.totalTax;
                this.cart.tax_percent = this.taxPercent;
            },
        },
        mounted() {
            this.cart.items = this.products;
            this.user.uid = this._customer.uid;
        },
        beforeMount() {
            this.calculatePrices();
        }
    }
</script>
