<template>
    <div class="container py-4 shop product-detail">
        <div class="row justify-content-center">
            <div class="col my-4 shop-card">
                <b-tabs ref="tabs" content-class="mt-4" v-model="tabIndex" @activate-tab="activate" justified>
                    <b-tab title="Create Account" :disabled="registerDisabled" active>
                        <div class="accordion" role="tablist" v-if="!this.userLogged && tabIndex === 0">
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
                                            @click="toggleRegister"
                                            class="mb-0 description font-23 bg-white border-0">Edit
                                        </b-button>
                                    </div>
                                </div>

                                <b-collapse accordion="my-accordion" v-model="showRegister" role="tabpanel" visible>
                                    <div class="shop my-3" v-if="showRegister">
                                        <div class="form-group custom-checkbox cross my-auto">
                                            <div class="radio">
                                                <input type="radio"
                                                       class="form-check-input install-options"
                                                       v-model="account.isNewUser"
                                                       value="0"
                                                       @click="switchUser($event)"
                                                       id="oldCustomer">
                                                <label
                                                    :class="[ $v.account.isNewUser.$dirty && $v.account.isNewUser.$invalid ? 'is_invalid': '' ]"
                                                    class="font-18 color-dove-gray font-weight-bold"
                                                    for="oldCustomer">Already a customer? Login below</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center" role="alert" v-if="errorMessage">
                                        <p v-text="errorMessage" class="text-danger mb-0"></p>
                                    </div>
                                    <b-form class="mt-2">
                                        <b-form-group class="mb-2">
                                            <b-form-input
                                                type="text"
                                                @input="watchInput($event)"
                                                v-model="user.email"
                                                :class="[ $v.user != undefined ? $v.user.email.$dirty && $v.user.email.$invalid ? 'is_invalid': '': '' ]"
                                                placeholder="Email address"
                                                :disabled="account.isNewUser === '1'"
                                            ></b-form-input>
                                        </b-form-group>
                                        <b-form-group class="mb-2" v-if="!forgotPass">
                                            <b-form-input
                                                type="password"
                                                @input="watchInput($event)"
                                                v-model="user.password"
                                                :class="[ $v.user != undefined ? $v.user.password.$dirty && $v.user.password.$invalid ? 'is_invalid': '': '' ]"
                                                placeholder="Password"
                                                :disabled="account.isNewUser === '1'"
                                            ></b-form-input>
                                        </b-form-group>
                                        <b-form-group class="mb-2" v-else>
                                            <b-button variant="primary" block @click="resetPassword">Reset password
                                            </b-button>
                                        </b-form-group>
                                        <p
                                            v-if="!forgotPass"
                                            class="credential-link"
                                            @click="toggleForgotPassword">
                                            Forgot password? click here
                                        </p>
                                        <p
                                            v-else
                                            class="credential-link"
                                            :disabled="account.isNewUser ===0"
                                            @click='toggleForgotPassword'>Login?</p>
                                    </b-form>

                                    <div class="shop my-3" v-if="showRegister">
                                        <div class="form-group custom-checkbox cross my-auto">
                                            <div class="radio">
                                                <input type="radio"
                                                       class="form-check-input install-options"
                                                       v-model="account.isNewUser"
                                                       value="1"
                                                       @click="switchUser($event)"
                                                       id="newCustomer">
                                                <label
                                                    :class="[ $v.account.isNewUser.$dirty && $v.account.isNewUser.$invalid ? 'is_invalid': '' ]"
                                                    class="font-18 color-dove-gray font-weight-bold"
                                                    for="newCustomer">Register as a new user</label>
                                            </div>
                                        </div>
                                    </div>

                                    <b-form class="mt-2" v-if="showRegister && tabIndex === 0">
                                        <div class="text-center" role="alert" v-if="emailError">
                                            <p v-text="emailError" class="text-danger mb-0"></p>
                                        </div>
                                        <b-form-group class="mb-2">
                                            <b-form-input
                                                type="text"
                                                v-model="account.firstname"
                                                :class="[ $v.account.firstname.$dirty && $v.account.firstname.$invalid ? 'is_invalid': '' ]"
                                                placeholder="First name"
                                                :disabled="account.isNewUser === '0'"
                                            ></b-form-input>
                                        </b-form-group>
                                        <b-form-group class="mb-2">
                                            <b-form-input
                                                type="text"
                                                v-model="account.lastname"
                                                :class="[ $v.account.lastname.$dirty && $v.account.lastname.$invalid ? 'is_invalid': '' ]"
                                                placeholder="Last name"
                                                :disabled="account.isNewUser === '0'"
                                            ></b-form-input>
                                        </b-form-group>
                                        <b-form-group class="mb-2">
                                            <b-form-input
                                                type="text"
                                                v-model="account.email"
                                                :class="[ $v.account.email.$dirty && $v.account.email.$invalid ? 'is_invalid': '' ]"
                                                placeholder="Email address"
                                                :disabled="account.isNewUser === '0'"
                                            ></b-form-input>
                                        </b-form-group>
                                        <b-form-group class="mb-2">
                                            <b-form-input
                                                type="text"
                                                v-model="account.confirmEmail"
                                                :class="[ $v.account.confirmEmail.$dirty && $v.account.confirmEmail.$invalid ? 'is_invalid': '' ]"
                                                placeholder="Confirm email address"
                                                :disabled="account.isNewUser === '0'"
                                            ></b-form-input>
                                        </b-form-group>
                                        <b-form-group class="mb-2">
                                            <masked-input
                                                type="text"
                                                :mask="['(', /[1-9]/, /\d/, /\d/, ')', ' ', /\d/, /\d/, /\d/, '-', /\d/, /\d/, /\d/, /\d/]"
                                                class="form-control phone"
                                                v-model="account.phone"
                                                :class="[ $v.account.phone.$dirty && $v.account.phone.$invalid ? 'is_invalid': '' ]"
                                                placeholder="Phone*"
                                                :disabled="account.isNewUser === '0'"
                                                minlength="14"
                                                required>
                                            </masked-input>
                                        </b-form-group>
                                        <b-button @click="validateUser" :disabled="wait" block variant="outline-primary"
                                                  class="my-4">
                                            Continue
                                        </b-button>
                                    </b-form>
                                </b-collapse>

                                <div :class="[ showPassword ? '' : 'mt-4' ]">
                                    <hr class="divider">
                                    <div>
                                        <p class="d-inline-block mb-0 title font-23 accordian-title">Password</p>
                                    </div>
                                </div>

                                <b-collapse id="installation" accordion="my-accordion" v-model="showPassword"
                                            role="tabpanel">
                                    <b-form class="mt-4" v-if="showPassword && tabIndex === 0">
                                        <b-form-group class="mb-2">
                                            <b-form-input
                                                type="password"
                                                v-model="account.password"
                                                :class="[ tabIndex === 0 ? $v.account.password.$dirty && $v.account.password.$invalid ? 'is_invalid': '': '' ]"
                                                placeholder="Password"
                                            ></b-form-input>
                                        </b-form-group>
                                        <b-form-group class="mb-2">
                                            <b-form-input
                                                type="password"
                                                v-model="account.confirmPassword"
                                                :class="[ tabIndex === 0 ? $v.account.confirmPassword.$dirty && $v.account.confirmPassword.$invalid ? 'is_invalid': '': '' ]"
                                                placeholder="Confirm Password"
                                            ></b-form-input>
                                        </b-form-group>
                                    </b-form>
                                    <b-button @click="validatePassword" block variant="outline-primary" class="my-4">
                                        Continue
                                    </b-button>
                                </b-collapse>

                                <hr class="divider">
                            </b-card>
                        </div>
                    </b-tab>

                    <b-tab title="Payment Method" :disabled="firstTabDisabled">
                        <b-card class="custom-card shadow-sm mw-100">
                            <hr class="divider">
                            <p class="d-inline-block mb-0 title font-26">Payment Method</p>
                            <b-button @click="nextTab('CARD')" block variant="outline-primary"
                                      class="my-4">
                                Pay by Card
                            </b-button>
                            <b-button @click="nextTab('BANK_FINANCING')" block variant="outline-primary"
                                      class="my-4">
                                Financing
                            </b-button>
                            <b-button @click="nextTab('CHECK')" block variant="outline-primary"
                                      class="my-4">
                                Check or Cash
                            </b-button>
                        </b-card>
                    </b-tab>

                    <b-tab title="Payment Details" :disabled="secondTabDisabled">
                        <div v-if="financingShow && tabIndex === 2">
                            <financing
                                :account="account"
                                :states="states"
                                :countries="countries"
                                :finance="checkoutData.financing"
                                :isCoApplicant="0"
                                @emitFinance="emitFinance"
                                @emitData="financeData">
                            </financing>
                        </div>
                        <!-- Pay by Card -->
                        <div class="accordion" role="tablist" v-if="payByCardShow && tabIndex === 2">
                            <b-card class="custom-card shadow-sm">
                                <div>
                                    <hr class="divider">
                                    <div class="d-flex flex-row justify-content-between">
                                        <p class="mb-0 title font-33">Pay by Card</p>
                                        <p class="mb-0 color-light-gray font-weight-bold">Payment method</p>
                                    </div>
                                </div>
                                <b-form class="mt-4">
                                    <b-form-group>
                                        <b-form-group class="mb-2" v-if="stripe.sources !== null">
                                            <b-form-select
                                                :class="[ $v.stripe.cardSourceId.$dirty && $v.stripe.cardSourceId.$invalid ? 'is_invalid': '' ]"
                                                v-model="stripe.cardSourceId">
                                                <b-form-select-option value="" disabled hidden>
                                                    Select card for Payment
                                                </b-form-select-option>
                                                <b-form-select-option
                                                    v-for="source in stripe.sources"
                                                    :key="source.id"
                                                    :value="source.id">
                                                    {{source.brand}} {{source.last4}}
                                                </b-form-select-option>
                                                <b-form-select-option value="new">
                                                    Use another card
                                                </b-form-select-option>
                                            </b-form-select>
                                        </b-form-group>
                                        <stripe
                                            :isTest="_customer.is_test"
                                            :error.sync="stripeErrorMessage"
                                            v-show="stripe.sources === null || stripe.cardSourceId  === 'new'"
                                            v-if="tabIndex === 2">
                                        </stripe>
                                    </b-form-group>
                                    <b-button @click="generateStripeToken" :disabled="wait" block
                                              variant="outline-primary"
                                              class="my-4">
                                        Continue
                                    </b-button>
                                </b-form>
                            </b-card>
                        </div>
                        <!-- Pay by Check -->
                        <div class="accordion" role="tablist" v-if="payByCheckShow">
                            <pay-by-check @checkdata="checkData"
                                          :payByCheck="this.checkoutData.payByCheck"></pay-by-check>
                        </div>

                    </b-tab>

                    <b-tab title="Final Summary" :disabled="thirdTabDisabled">
                        <b-card class="custom-card shadow-sm" v-if="tabIndex === 3">
                            <div class="accordion" role="tablist">
                                <div>
                                    <hr class="divider">
                                    <div class="d-flex flex-row justify-content-between"
                                         :class="[ !showFilter ? 'my-3': '' ]">
                                        <p
                                            class="d-inline-block mb-0 title font-23 accordian-title"
                                            :class="[ showFilter ? 'my-2': '' ]">
                                            Filter renewals
                                        </p>
                                        <b-button
                                            v-if="!showFilter"
                                            @click="editCollapse('filter')"
                                            class="mb-0 description font-23 bg-white border-0">Edit
                                        </b-button>
                                    </div>
                                </div>

                                <b-collapse accordion="filter" role="tabpanel" v-model="showFilter" visible>
                                    <b-form>
                                        <div v-if="account.is_loyalty_member === null">
                                            <div v-if="checkoutData.payment_method !== 'CARD'">
                                                <p class="color-light-gray font-weight-bold">
                                                    Add payment method for filter renewals
                                                </p>
                                                <b-form-group class="mb-2" v-if="stripe.sources !== null">
                                                    <b-form-select
                                                        :class="[ $v.stripe.cardSourceId.$dirty && $v.stripe.cardSourceId.$invalid ? 'is_invalid': '' ]"
                                                        v-model="stripe.cardSourceId">
                                                        <b-form-select-option value="" disabled hidden>
                                                            Select card for Payment
                                                        </b-form-select-option>
                                                        <b-form-select-option
                                                            v-for="source in stripe.sources"
                                                            :key="source.id"
                                                            :value="source.id">
                                                            {{source.brand}} {{source.last4}}
                                                        </b-form-select-option>
                                                        <b-form-select-option value="new">
                                                            Use another card
                                                        </b-form-select-option>
                                                    </b-form-select>
                                                </b-form-group>
                                                <stripe
                                                    :isTest="_customer.is_test"
                                                    :error.sync="stripeErrorMessage"
                                                    v-show="(stripe.sources === null || stripe.cardSourceId  === 'new') && isLoyaltyMember"
                                                    v-if="tabIndex === 3">
                                                </stripe>
                                            </div>

                                            <div class="installation-options shop product-detail mt-3 mb-3 bg-yellow">
                                                <div class="form-group custom-checkbox cross my-auto">
                                                    <div class="radio d-flex">
                                                        <input type="checkbox"
                                                               class="form-check-input install-options"
                                                               id="confirm_renewal"
                                                               v-model="isLoyaltyMember"
                                                               :checked="true">
                                                        <label class="form-check-label float-left mr-2"
                                                               for="confirm_renewal"></label>
                                                        <div class="title">
                                                            <span class="font-22">Auto renewal is on resulting in 10% savings on all future renewals. Cancel at anytime.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div v-else class="dotted-border bg-yellow">
                                            <p class="color-light-gray font-weight-bold text-center py-4 mb-0">
                                                {{ account.is_loyalty_member ?
                                                "You are already a loyalty member":
                                                "You are not a loyalty member" }}
                                            </p>
                                        </div>

                                        <b-button @click="validateRenewal" block variant="outline-primary"
                                                  class="my-4">
                                            Continue
                                        </b-button>
                                    </b-form>
                                </b-collapse>

                                <div>
                                    <hr class="divider">
                                    <div class="d-flex flex-row justify-content-between"
                                         :class="[ !showSummary ? 'my-3': '' ]">
                                        <p
                                            class="d-inline-block mb-0 title font-23 accordian-title"
                                            :class="[ showSummary ? 'my-2': '' ]">
                                            Purchase Summary
                                        </p>
                                        <b-button
                                            v-if="!showSummary && showSummaryEnabled"
                                            @click="editCollapse('summary')"
                                            class="mb-0 description font-23 bg-white border-0">
                                            Edit
                                        </b-button>
                                    </div>
                                </div>

                                <b-collapse accordion="summary" role="tabpanel" v-model="showSummary">
                                    <div>
                                        <div v-for="(item, index ) in cart.items" :key="index"
                                             :class="[ index !== 0 ? 'mt-5': '' ]">
                                            <div class="dotted-border">
                                                <p class="title text-center mt-4">{{item.name}}</p>
                                                <div class="text-center">
                                                    <b-img class="product-img" :src="item.image" fluid></b-img>
                                                </div>
                                                <div class="text-center my-2">
                                                    <p class="description font-22 mb-0">
                                                        {{ item.includes_total | toCurrency }}</p>
                                                    <p class="description font-20 mb-0">
                                                        {{ item.tech_gen }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div v-for="product in item.accessories" :key="product.key">
                                                <p class="title mb-0 mt-4">{{ product.name }}</p>
                                                <div class="installation-options shop product-detail mt-2">
                                                    <div class="form-group custom-checkbox cross my-auto">
                                                        <div class="radio d-flex">
                                                            <input type="checkbox"
                                                                   class="form-check-input install-options"
                                                                   id="confirm_accessory"
                                                                   :checked="true"
                                                                   :disabled="true">
                                                            <label class="form-check-label float-left mr-2"
                                                                   for="confirm_accessory"></label>
                                                            <div class="title">
                                                                <span class="font-22">
                                                                    {{ product.name }}
                                                                    <span v-if="product.key == 'shower-filter'">({{product.quantity}})</span>
                                                                </span>
                                                                <span class="description font-18 mb-0 d-block">${{ product.price  }}</span>

                                                                <span v-if="product.key=='traveling-kit'"
                                                                      class="color-black font-16">
                                                                    <span>- 1 Additional Faucet 316L medical grade</span><br>
                                                                    <span>- 1 Blue Pipe</span><br>
                                                                    <span>- 1 White Pipe</span><br>
                                                                    <span>- 1 John Guest Spl</span>
                                                                </span>

                                                                <span v-else-if="product.key=='shower-filter'"
                                                                      class="color-black font-16">
                                                                    <span>- Featuress</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="title mb-0 mt-4">Shipping and Zone</p>
                                                <p class="description font-18 mb-0">
                                                    Zone {{item.zone}}<br>
                                                    {{addresses[item.address_index].street}}<br>
                                                    {{addresses[item.address_index].city}}
                                                    {{getStateAbbr(addresses[item.address_index].state_id)}}
                                                    {{addresses[item.address_index].zip}}<br>
                                                    {{addresses[item.address_index].apartment}}
                                                </p>
                                            </div>

                                            <div>
                                                <p class="title mb-0 mt-4">Installation</p>
                                                <p class="description font-18 mb-0">
                                                    {{getInstallationValue(item.install_option).text}}
                                                </p>
                                            </div>

                                            <div class="payment-breakdown mt-4">
                                                <section>
                                                    <div class="row">
                                                        <div class="col-auto mr-auto title">Sub-Total</div>
                                                        <div class="col-auto amount">
                                                            {{ item.subtotal | toCurrency(2) }}
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-auto mr-auto title">Shipping</div>
                                                        <div class="col-auto amount">
                                                            {{ item.shipping_price | toCurrency(2) }}
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-auto mr-auto title">Tax
                                                            ({{item.tax_percent}}%)
                                                        </div>
                                                        <div class="col-auto amount">{{ item.tax | toCurrency(2) }}
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-auto mr-auto title">Total</div>
                                                        <div class="col-auto amount">
                                                            {{ item.total | toCurrency(2) }}
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>

                                        <div class="payment-breakdown bg-gray mt-4">
                                            <section class="p-4">
                                                <div class="row">
                                                    <div class="col-auto mr-auto title">Sub-Total
                                                    </div>
                                                    <div class="col-auto amount">
                                                        {{ cart.subtotal | toCurrency(2) }}
                                                    </div>
                                                </div>

                                                <div class="row" v-if="cart.promo">
                                                    <div class="col-auto mr-auto title">Promo Discount
                                                    </div>
                                                    <div class="col-auto amount">
                                                        - {{ cart.promo.amount | toCurrency(2) }}
                                                    </div>
                                                </div>

                                                <div class="row" v-if="cart.discount">
                                                    <div class="col-auto mr-auto title">Discount
                                                    </div>
                                                    <div class="col-auto amount">
                                                        - {{ cart.discount | toCurrency(2) }}
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-auto mr-auto title">Shipping
                                                    </div>
                                                    <div class="col-auto amount">
                                                        {{ cart.shipping_price | toCurrency(2) }}
                                                    </div>
                                                </div>

                                                <div class="row" v-if="cart.shipping_discount">
                                                    <div class="col-auto mr-auto title">Shipping Discount
                                                    </div>
                                                    <div class="col-auto amount">
                                                        - {{ cart.shipping_discount | toCurrency(2) }}
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-auto mr-auto title">Tax
                                                    </div>
                                                    <div class="col-auto amount">
                                                        {{ cart.tax | toCurrency(2) }}
                                                    </div>
                                                </div>

                                                <div class="row mt-2">
                                                    <div class="col-auto mr-auto title">Grand Total</div>
                                                    <div class="col-auto amount">{{ cart.total | toCurrency(2) }}</div>
                                                </div>
                                            </section>
                                        </div>
                                        <b-button @click="placeOrder" :disabled="wait" block variant="outline-primary"
                                                  class="my-4">
                                            <b-spinner variant="primary" v-if="wait" class="spinner-button"></b-spinner>
                                            {{ wait ? 'Please wait...': 'Complete purchase' }}
                                        </b-button>
                                    </div>
                                </b-collapse>

                            </div>

                        </b-card>
                    </b-tab>

                </b-tabs>
            </div>
        </div>
    </div>
</template>

<script>
    import {required, minLength, sameAs, email, numeric, requiredIf} from 'vuelidate/lib/validators';
    import {createToken} from 'vue-stripe-elements-plus';
    import MaskedInput from 'vue-text-mask';
    import {validPhone} from '../validators/CustomValidation';

    export default {
        name: "Checkout",
        components: {MaskedInput},
        props: ['_customer', 'states', 'countries', 'cart', 'addresses', 'loggedUser'],
        watch: {
            'checkoutData.payment_method': function (newVal, oldVal) {
                this.clearData();
            },
            'account.isNewUser': function (newVal, oldVal) {
                if (oldVal === '1') {
                    this.account.firstname = '';
                    this.account.lastname = '';
                    this.account.email = '';
                    this.account.confirmEmail = '';
                    this.account.phone = '';
                } else {
                    this.user.email = '';
                    this.user.passwords = '';
                    if (this.forgotPass)
                        this.resetForgotPassword();
                }
                this.errorMessage = '';
                this.emailError = '';
                newVal === '1' ? this.account.userStatus = "new" : this.account.userStatus = "existing";
            },
            'account.email': function (newVal, oldVal) {
                this.emailError = '';
                this.isEmailVerified = false;
            },
            'account.confirmEmail': function (newVal, oldVal) {
                this.emailError = '';
                this.isEmailVerified = false;
            },
        },
        data() {
            return {
                tabIndex: 0,
                firstTabDisabled: true,
                secondTabDisabled: true,
                thirdTabDisabled: true,
                showRegister: true,
                showPassword: false,

                showFilter: true,
                showSummary: false,

                showSummaryEnabled: false,
                registerDisabled: false,

                payByCardShow: false,
                financingShow: false,
                payByCheckShow: false,

                forgotPass: false,
                userLogged: false,

                errorMessage: '',
                emailError: '',

                wait: false,

                payBycardOption: [
                    {text: 'Yes', value: 'yes'},
                    {text: 'No', value: 'no'},
                ],
                installationOptions: [
                    {text: 'I need help finding a installer in my area', value: 'NEED_INSTALLER'},
                    {text: 'I have my own contractor to install', value: 'HAS_CONTRACTOR'},
                    {text: 'I will install the machine myself (DIY)', value: 'DIY'}
                ],
                user: {
                    email: '',
                    password: '',
                },

                stripe: {
                    sources: null,
                    cardSourceId: '',
                },

                isLoyaltyMember: true,
                selectedSourceIndex: null,
                isEmailVerified: false,

                account: {
                    isNewUser: '',
                    userStatus: '',
                    uid: '',
                    firstname: '',
                    lastname: '',
                    email: '',
                    confirmEmail: '',
                    phone: '',
                    password: '',
                    confirmPassword: '',
                    is_loyalty_member: null,
                },

                checkoutData: {
                    payment_method: '',
                    financing: null,
                    stripeToken: '',
                    payByCheck: null,
                },
                stripeErrorMessage: ''
            }
        },
        validations() {
            if (this.tabIndex === 0) {
                if (this.showRegister === true) {
                    return {
                        account: {
                            isNewUser: {required},
                            firstname: {
                                required: requiredIf(() => {
                                    return this.account.isNewUser === "1";
                                })
                            },
                            lastname: {
                                required: requiredIf(() => {
                                    return this.account.isNewUser === "1";
                                })
                            },
                            email: {
                                required: requiredIf(() => {
                                    return this.account.isNewUser === "1";
                                }),
                                email
                            },
                            confirmEmail: {
                                required: requiredIf(() => {
                                    return this.account.isNewUser === "1";
                                }),
                                sameAs: sameAs('email'),
                            },
                            phone: {
                                required: requiredIf(() => {
                                    return this.account.isNewUser === "1";
                                }),
                                validatePhone(val) {
                                    if (this.account.isNewUser === '1') {
                                        return validPhone(val);
                                    }
                                    return true;
                                },
                            },
                        },
                        user: {
                            email: {
                                required: requiredIf(() => {
                                    return this.account.isNewUser === "0";
                                }),
                                email,
                            },
                            password: {
                                required: requiredIf(() => {
                                    return this.account.isNewUser === "0" && this.forgotPass !== true;
                                })
                            },
                        }
                    }
                } else if (this.showPassword === true) {
                    return {
                        account: {
                            password: {required},
                            confirmPassword: {
                                required,
                                sameAs: sameAs('password'),
                            }
                        }
                    }
                }
            } else if (this.tabIndex === 2 && this.stripe.sources !== null && this.checkoutData.payment_method === "CARD") {
                return {
                    stripe: {
                        cardSourceId: {required},
                    }
                }
            } else if (this.tabIndex === 3) {
                return {
                    stripe: {
                        cardSourceId: {
                            required: requiredIf(() => {
                                return this.checkoutData.payment_method !== "CARD" && this.showFilter === true;
                            })
                        },
                    }
                }
            }
        },

        methods: {
            activate(next, prev, event) {
                if (!this.isEmailVerified && !this.userLogged) {
                    event.preventDefault();
                    this.$v.$touch();
                    if (!this.$v.$invalid) {
                        this.verifyEmail(next);
                    }
                }
                this.errorMessage = '';
            },
            switchUser(event) {
                this.$v.$reset();
            },
            getStateAbbr(state_id) {
                let state = this.states.find(state => state.id == state_id);
                return state.abbr;
            },
            clearData() {
                this.checkoutData.payByCheck = null;
                this.checkoutData.payByCard = null;
                this.checkoutData.financing = null;
                this.stripeToken = '';
                this.thirdTabDisabled = true;
                this.stripe.cardSourceId = '';
            },
            resetPassword() {
                this.$v.$touch();
                if (!this.$v.$invalid) {
                    axios.post('api/recover-password', {
                        'email': this.user.email,
                    }).then(response => {
                        if (response.data.status === 'Success')
                        {
                            this.makeToast('success','Success', response.data.message);
                            this.toggleForgotPassword();
                        }
                        else
                            this.makeToast('danger','Error', response.data.message);
                    });
                }
            },
            nextTab(value) {
                if (this.tabIndex === 0) {
                    this.firstTabDisabled = false;
                } else if (this.tabIndex === 1) {
                    this.secondTabDisabled = false;
                    this.checkoutData.payment_method = value;
                    if (value == 'CARD') {
                        this.payByCardShow = true;
                        this.financingShow = false;
                        this.payByCheckShow = false;
                    } else if (value == 'BANK_FINANCING') {
                        this.financingShow = true;
                        this.payByCardShow = false;
                        this.payByCheckShow = false;
                    } else {
                        this.payByCheckShow = true;
                        this.payByCardShow = false;
                        this.financingShow = false;
                    }
                } else {
                    this.thirdTabDisabled = false;
                }

                this.scrollTop();
                setTimeout(() => this.tabIndex += 1, 500);
            },
            scrollTop() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            },
            toggleForgotPassword() {
                if (this.account.isNewUser === '0') {
                    this.$v.$reset();
                    this.errorMessage = '';
                    this.user.email = '';
                    this.user.password = '';
                    this.forgotPass = !this.forgotPass;
                }
            },
            resetForgotPassword() {
                this.$v.$reset();
                this.errorMessage = '';
                this.user.email = '';
                this.user.password = '';
                this.forgotPass = !this.forgotPass;
            },
            watchInput(event) {
                this.errorMessage = '';
            },
            toggleRegister() {
                this.showRegister = true;
                this.showPassword = false;
            },
            togglePassword() {
                this.$v.$reset();
                this.scrollTop();
                this.showRegister = false;
                this.showPassword = true;
            },
            validateUser() {
                if (this.account.isNewUser === '0') {
                    this.$v.$touch();
                    if (!this.$v.$invalid) {
                        this.errorMessage = "";
                        this.wait = true;
                        axios.post(`api/validate-user`, {
                            uid: this.account.uid,
                            email: this.user.email,
                            password: this.user.password,
                        })
                            .then(response => {
                                if (response.data.status === "Success") {

                                    let customer = response.data.customer;
                                    this.stripe.sources = customer.cardSources;
                                    this.account.uid = customer.lead.uid;
                                    this.account.firstname = customer.firstname;
                                    this.account.lastname = customer.lastname;
                                    this.account.email = customer.email;
                                    this.account.phone = customer.phone;
                                    this.account.is_loyalty_member = customer.is_loyalty_member;

                                    this.userLogged = true;
                                    this.nextTab();
                                    this.registerDisabled = true;
                                } else
                                    this.errorMessage = "Incorrect email or password";
                                this.wait = false;
                            }).catch(error => {
                            console.log(error);
                        });
                    }
                } else {
                    this.$v.$touch();
                    if (!this.$v.$invalid) {
                        this.verifyEmail(this.tabIndex);
                    }
                }
            },
            verifyEmail(tabIndex) {
                this.wait = true;
                axios.post(`api/validate-email`, {
                    uid: this.account.uid,
                    email: this.account.email,
                })
                    .then(response => {
                        if (response.data.status === "Success") {
                            this.account.userStatus = response.data.type;

                            if (tabIndex === 0)
                                this.togglePassword();
                            else
                                this.tabIndex = tabIndex;
                            this.isEmailVerified = true;
                        } else
                            this.emailError = "Email already exists";
                        this.wait = false;
                    }).catch(error => {
                    console.log(error);
                });
            },
            validatePassword() {
                this.$v.$touch();
                if (!this.$v.$invalid) {
                    this.nextTab();
                }
            },
            editCollapse(value) {
                this.showFilter = value == 'filter' ? true : false;
                this.showSummary = value == 'summary' ? true : false;
            },
            validateRenewal() {
                if (this.checkoutData.payment_method !== 'CARD' && this.account.is_loyalty_member === null && this.isLoyaltyMember)
                    this.generateStripeToken();
                else
                    this.nextCollapse('summary');
            },
            nextCollapse(value) {
                if (value == 'summary') {
                    this.showFilter = false;
                    this.showSummary = true;
                    this.showSummaryEnabled = true;
                } else {
                    this.showSummary = false;
                    this.showAgreement = true;
                }
            },
            checkData(value) {
                this.checkoutData.payByCheck = value;
                this.nextTab();
            },
            emitFinance(value) {
                this.checkoutData.financing = value;
            },
            financeData(value) {
                this.checkoutData.financing = value;
                this.nextTab();
            },
            getInstallationValue(value) {
                return this.installationOptions[this.installationOptions.findIndex(x => x.value === value)];
            },
            placeOrder() {
                this.$v.$touch();
                if (!this.$v.$invalid) {
                    this.wait = true;
                    this.emailError = "";
                    this.errorMessage = "";
                    delete this.account['confirmEmail'];
                    delete this.account['confirmPassword'];

                    if (this.stripe.cardSourceId === 'new')
                        this.stripe.cardSourceId = '';

                    this.account.is_loyalty_member = this.account.is_loyalty_member !== null ? this.account.is_loyalty_member : this.isLoyaltyMember;

                    axios.post(`api/order/place-order`, {
                        customer: this.account,
                        payment_method: this.checkoutData.payment_method,
                        payment: this.checkoutData.payment_method === 'CHECK' ? this.checkoutData.payByCheck : this.checkoutData.payment_method === 'BANK_FINANCING' ? this.checkoutData.financing : '',
                        stripe_token_id: this.checkoutData.stripeToken,
                        stripe_source_id: this.stripe.cardSourceId,
                    })
                        .then(response => {
                            if (response.data.status === "Success")
                                window.location.href = `${response.data.redirect}`;
                            else if (response.data.status === 'Error') {
                                if (response.data.hasOwnProperty('uid')) {
                                    this.account.uid = response.data.uid;
                                    this.account.isNewUser = 0;
                                    this.account.userStatus = 'existing';
                                }
                                this.account.confirmEmail = this.account.email;
                                this.account.confirmPassword = this.account.Password;
                                this.errorMessage = response.data.message;
                                this.makeToast('danger',response.data.status,response.data.message);
                            }
                            this.wait = false;
                        }).catch(error => {
                        console.log(error);
                    });
                }
            },
            generateStripeToken() {
                if (this.stripe.sources !== null)
                    this.$v.$touch();
                if (this.stripe.sources === null || !this.$v.$invalid) {
                    if (this.stripe.cardSourceId === '' || this.stripe.cardSourceId === 'new') {
                        this.stripeErrorMessage = '';
                        this.wait = true;
                        createToken().then(response => {
                            if (response.error && response.error.message) {
                                this.stripeErrorMessage = response.error.message;
                            } else {
                                this.checkoutData.stripeToken = response.token.id;
                                var source = {
                                    'id': response.token.card.id,
                                    'brand': response.token.card.brand,
                                    'last4': response.token.card.last4
                                };
                                setTimeout(() => this.addSource(source), 1000);
                                if (this.checkoutData.payment_method !== 'CARD') {
                                    this.openSummaryTab();
                                } else {
                                    if (this.stripe.sources !== null)
                                        this.$v.$reset();
                                    this.nextTab();
                                }
                            }
                            this.wait = false;
                        });
                    } else {
                        if (this.checkoutData.payment_method !== 'CARD') {
                            this.openSummaryTab();
                        } else {
                            if (this.stripe.sources !== null)
                                this.$v.$reset();
                            this.nextTab();
                        }
                    }
                }
            },
            addSource(source) {
                this.stripe.sources = [];
                this.stripe.sources.push(source);
            },
            openSummaryTab() {
                if (this.stripe.sources !== null)
                    this.$v.$reset();
                this.nextCollapse('summary');
            },
            makeToast(variant, title, message) {
                this.$bvToast.toast(message, {
                    title: title,
                    variant: variant,
                    toaster: 'b-toaster-top-right',
                    solid: true
                })
            }
        },

        mounted() {
            if (typeof this.loggedUser !== 'undefined' && this.loggedUser !== null) {
                this.userLogged = true;
                this.account.isNewUser = 0;
                this.account.uid = this.loggedUser.lead.uid;
                this.account.firstname = this.loggedUser.firstname;
                this.account.lastname = this.loggedUser.lastname;
                this.account.email = this.loggedUser.email;
                this.account.phone = this.loggedUser.phone;
                this.account.is_loyalty_member = this.loggedUser.is_loyalty_member;
                this.stripe.sources = this.loggedUser.cardSources;

                this.nextTab();
                this.registerDisabled = true;
            } else
                this.account.uid = this._customer.uid;
        }
    }
</script>
