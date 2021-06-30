<template>
    <div class="container py-4 shop product-detail">
        <div class="row justify-content-center">
            <div class="col my-4 shop-card">
                <b-tabs ref="tabs" content-class="mt-4" v-model="tabIndex" justified>
                    <b-tab title="Model" active>
                        <b-card class="custom-card shadow-sm mw-100">
                            <div v-for="product in products" :key="product.key" class="shop-product mb-4">
                                <shop-product v-bind="product" :_customer="_customer"></shop-product>
                                <b-button href="#" @click="selectProduct(product)" v-if="_customer.firstname"
                                          class="d-block mb-1"
                                          variant="outline-primary">Select
                                </b-button>
                                <hr v-else>
                            </div>

                            <div v-if="!_customer.firstname">
                                <div class="description text-center font-22">Starting at $1795 - $3795</div>
                                <div class="description text-center font-22">Call for pricing</div>
                                <b-button @click="bookAppointment"
                                          class="d-block mb-1 mt-4 w-100"
                                          variant="outline-primary">
                                    Book appointment
                                </b-button>
                            </div>
                        </b-card>
                    </b-tab>
                    <b-tab title="Setup" :disabled="firstTabDisabled">
                        <div class="accordion" role="tablist">
                            <b-card class="custom-card shadow-sm mw-100">
                                <div>
                                    <hr class="divider">
                                    <div class="d-flex flex-row justify-content-between"
                                         :class="[ !showWaterZone ? 'my-3': '' ]">
                                        <p class="d-inline-block mb-0 title font-23 accordian-title"
                                           :class="[ showWaterZone ? 'my-2': '' ]">Water Zone</p>
                                        <b-button v-if="!showWaterZone" @click="toggleWaterZone"
                                                  class="mb-0 description font-23 bg-white border-0">Edit
                                        </b-button>
                                    </div>
                                </div>

                                <b-collapse accordion="my-accordion" v-model="showWaterZone"
                                            role="tabpanel" v-if="tabIndex == 1 && !showInstallation">
                                    <p class="mb-0 color-light-gray font-weight-bold">
                                        Based on where this machine will be installed will determine your zone and
                                        filter setup
                                    </p>

                                    <div class="installation-options shop my-3 d-flex"
                                         v-for="(address, index) in addresses">
                                        <div class="form-group custom-checkbox cross my-auto">
                                            <div class="radio">
                                                <input type="radio"
                                                       class="form-check-input install-options"
                                                       @click="selectAddress($event, index)"
                                                       v-model="item.address_index"
                                                       :value="index"
                                                       :id="'address'+index">
                                                <label class="form-check-label float-left mr-2 mt-0"
                                                       :for="'address'+index"></label>
                                                <div class="title font-16 font-weight-bold">
                                                    {{address.street}} {{address.apartment}} {{address.city}} {{getStateAbbr(address.state_id)}} {{address.zip}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <b-form class="mt-4">
                                        <div>
                                            <b-form-group class="mb-2">
                                                <b-form-input
                                                    type="text"
                                                    :disabled="item.address_index !== ''"
                                                    placeholder="Street Address"
                                                    v-model="address.street"
                                                    :class="[ $v.address !== undefined ?  $v.address.street.$dirty && $v.address.street.$invalid ? 'is_invalid': '': '' ]"
                                                ></b-form-input>
                                            </b-form-group>
                                            <b-form-group class="mb-2">
                                                <b-form-input
                                                    type="text"
                                                    :disabled="item.address_index !== ''? true: false"
                                                    placeholder="Apt. Suite. Unit #"
                                                    v-model="address.apartment"
                                                ></b-form-input>
                                            </b-form-group>
                                            <b-form-group class="mb-2">
                                                <b-form-input
                                                    type="text"
                                                    :disabled="item.address_index !== ''? true: false"
                                                    placeholder="City"
                                                    v-model="address.city"
                                                    :class="[ $v.address !== undefined ? $v.address.city.$dirty && $v.address.city.$invalid ? 'is_invalid': '' : '' ]"
                                                ></b-form-input>
                                            </b-form-group>

                                            <b-form-group class="mb-2">
                                                <b-form-select v-model="address.state_id"
                                                               :disabled="item.address_index !== ''? true: false"
                                                               :class="[ $v.address !== undefined ? $v.address.state_id.$dirty && $v.address.state_id.$invalid ? 'is_invalid': '': '' ]">
                                                    <b-form-select-option value="" disabled hidden>State
                                                    </b-form-select-option>
                                                    <b-form-select-option v-for="state in states" :key="state.id"
                                                                          :value="state.id">{{state.name}}
                                                    </b-form-select-option>
                                                </b-form-select>
                                            </b-form-group>

                                            <b-form-group class="mb-2">
                                                <b-form-input
                                                    type="number"
                                                    :disabled="item.address_index !== ''? true: false"
                                                    placeholder="Zipcode"
                                                    v-model="address.zip"
                                                    :class="[ $v.address !== undefined ? $v.address.zip.$dirty && $v.address.zip.$invalid ? 'is_invalid': '': '' ]">
                                                </b-form-input>
                                            </b-form-group>
                                            <b-form-group class="mb-2">
                                                <b-form-input
                                                    type="number"
                                                    :disabled="item.address_index !== ''? true: false"
                                                    placeholder="Confirm Zipcode"
                                                    v-model="address.confirmZip"
                                                    :class="[ $v.address != undefined ? $v.address.confirmZip.$dirty && $v.address.confirmZip.$invalid ? 'is_invalid': '' : '' ]"
                                                ></b-form-input>
                                            </b-form-group>
                                        </div>
                                        <p class="mt-4 font-18 color-dove-gray font-weight-bold">How many people will be
                                            drinking the
                                            water?</p>
                                        <b-form-group>
                                            <b-form-select
                                                v-model="item.household_size"
                                                :class="[ $v.item.household_size.$dirty && $v.item.household_size.$invalid ? 'is_invalid': '' ]"
                                                :options="householdSizeOptions">
                                            </b-form-select>
                                        </b-form-group>
                                        <p class="mt-4 font-18 color-dove-gray font-weight-bold">Where will your system
                                            be
                                            installed?</p>
                                        <b-form-group>
                                            <b-form-input
                                                list="nickname"
                                                v-model="item.nickname"
                                                placeholder="Type here or select an option from drop down."
                                                :class="[ $v.item.nickname.$dirty && $v.item.nickname.$invalid ? 'is_invalid': '' ]"
                                            ></b-form-input>

                                            <datalist id="nickname">
                                                <option
                                                    v-for="nickname in nicknameOptions"
                                                    :value="nickname.value"
                                                >{{ nickname.text }}
                                                </option>
                                            </datalist>
                                        </b-form-group>
                                        <p class="mt-4 font-18 color-dove-gray font-weight-bold">Are you currently on
                                            well water?</p>
                                        <b-form-group>
                                            <b-form-radio-group
                                                :options="options"
                                                v-model="item.is_well_water"
                                                :class="[ $v.item.is_well_water.$dirty && $v.item.is_well_water.$invalid ? 'is_invalid': '' ]"
                                                size="lg"
                                                stacked
                                            ></b-form-radio-group>
                                        </b-form-group>
                                        <div v-if="item.is_well_water === '1'">
                                            <p class="mt-4 font-18 color-dove-gray font-weight-bold">Do you have a water
                                                softener or whole house filtration system installed now?</p>
                                            <b-form-group>
                                                <b-form-radio-group
                                                    v-model="item.has_filtration_system"
                                                    :class="[ $v.item.has_filtration_system.$dirty && $v.item.has_filtration_system.$invalid ? 'is_invalid': '' ]"
                                                    :options="options"
                                                    size="lg"
                                                    stacked
                                                ></b-form-radio-group>
                                            </b-form-group>
                                        </div>
                                        <p class="mt-4 font-18 color-dove-gray font-weight-bold">Do you have a whole
                                            house 5 micron system?</p>
                                        <b-form-group>
                                            <b-form-radio-group
                                                v-model="item.has_micron_system"
                                                :class="[ $v.item.has_micron_system.$dirty && $v.item.has_micron_system.$invalid ? 'is_invalid': '' ]"
                                                :options="options"
                                                size="lg"
                                                stacked
                                            ></b-form-radio-group>
                                        </b-form-group>
                                        <b-button @click="toggleInstallation" block variant="outline-primary"
                                                  class="my-4">
                                            Continue
                                        </b-button>
                                    </b-form>
                                </b-collapse>

                                <div :class="[ showInstallation ? '' : 'mt-4' ]">
                                    <hr class="divider">
                                    <div>
                                        <p class="d-inline-block mb-0 title font-23 accordian-title"
                                           :class="[ showInstallation ? 'my-2' : '' ]">
                                            Installation
                                        </p>
                                    </div>
                                </div>
                                <b-collapse id="installation"
                                            accordion="my-accordion"
                                            v-model="showInstallation"
                                            role="tabpanel">
                                    <div class="installation-options shop my-3">
                                        <div class="form-group custom-checkbox cross my-auto">
                                            <div class="radio">
                                                <input type="radio"
                                                       class="form-check-input install-options"
                                                       v-model="item.install_option"
                                                       value="NEED_INSTALLER"
                                                       id="need-help"
                                                       checked>
                                                <label class="form-check-label float-left mr-2 mt-0"
                                                       for="need-help"></label>
                                                <div class="title font-16 font-weight-bold">I need help finding a
                                                    installer in my area
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="installation-options shop mb-3">
                                        <div class="form-group custom-checkbox cross my-auto">
                                            <div class="radio">
                                                <input type="radio" class="form-check-input install-options"
                                                       v-model="item.install_option"
                                                       value="HAS_CONTRACTOR"
                                                       id="have-contractor">
                                                <label class="form-check-label float-left mr-2 mt-0"
                                                       for="have-contractor"></label>
                                                <div class="title font-16 font-weight-bold">I have my own contractor to
                                                    install
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="installation-options shop mb-3">
                                        <div class="form-group custom-checkbox cross my-auto">
                                            <div class="radio">
                                                <input type="radio" class="form-check-input install-options"
                                                       name="installtion_type"
                                                       v-model="item.install_option"
                                                       value="DIY"
                                                       id="diy">
                                                <label class="form-check-label float-left mr-2 mt-0" for="diy"></label>
                                                <div class="title font-16 font-weight-bold">I will install the machine
                                                    myself (DIY)
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <b-button @click="validateInstallation" block variant="outline-primary"
                                              class="my-4">
                                        Continue
                                    </b-button>
                                </b-collapse>
                                <hr class="divider">
                            </b-card>
                        </div>
                    </b-tab>
                    <b-tab title="Accessories" :disabled="secondTabDisabled">
                        <div class="accordion" role="tablist">
                            <b-card class="custom-card shadow-sm">
                                <div>
                                    <hr class="divider">
                                    <div class="d-flex flex-row justify-content-between"
                                         :class="[ !showTravelingKit ? 'my-3': '' ]">
                                        <p class="d-inline-block mb-0 title font-23 accordian-title"
                                           :class="[ showTravelingKit ? 'my-2': '' ]">Traveling Kit</p>
                                        <b-button v-if="!showTravelingKit" @click="toggleAccessories"
                                                  class="mb-0 description font-23 bg-white border-0">Edit
                                        </b-button>
                                    </div>
                                </div>
                                <b-collapse accordion="accessory" v-model="showTravelingKit"
                                            role="tabpanel">
                                    <div class="my-2">
                                        <div class="installation-options shop product-detail">
                                            <div class="form-group custom-checkbox cross my-auto">
                                                <div class="radio d-flex">
                                                    <input type="checkbox"
                                                           class="form-check-input install-options"
                                                           v-model="item.traveling_kit.add_to_cart"
                                                           id="accessory">
                                                    <label class="form-check-label float-left mr-2"
                                                           for="accessory"></label>
                                                    <div class="title">
                                                        <span class="font-22">{{traveling_kit.name}}</span>
                                                        <span
                                                            class="description font-18 mb-0 d-block">{{ traveling_kit.price | toCurrency }}</span>
                                                        <span class="color-black font-16">- 1 Additional Faucet 316L medical grade</span><br>
                                                        <span class="color-black font-16">- 1 Blue Pipe</span><br>
                                                        <span class="color-black font-16">- 1 White Pipe</span><br>
                                                        <span class="color-black font-16">- 1 John Guest Spl</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="py-3">
                                        <b-button @click="toggleAccessories" block variant="outline-primary">
                                            Continue
                                        </b-button>
                                    </div>
                                </b-collapse>
                                <div>
                                    <hr class="divider">
                                    <div class="d-flex flex-row justify-content-between"
                                         :class="[ !showShowerFilter ? 'my-3': '' ]">
                                        <p class="d-inline-block mb-0 title font-23 accordian-title"
                                           :class="[ showShowerFilter ? 'my-2': '' ]">Shower Filter</p>
                                        <b-button v-if="!showShowerFilter && showShowerFilterEnabled"
                                                  @click="toggleAccessories"
                                                  class="mb-0 description font-23 bg-white border-0">Edit
                                        </b-button>
                                    </div>
                                </div>
                                <b-collapse accordion="showerfilter" v-model="showShowerFilter"
                                            role="tabpanel">
                                    <p class="mb-0 color-light-gray font-weight-bold">
                                        With the purchase get a one offer time offer of 1/2 off all shower filters.
                                    </p>
                                    <div class="my-2">
                                        <div class="installation-options shop product-detail">
                                            <div class="form-group custom-checkbox cross my-auto">
                                                <div class="text-center mb-3">
                                                    <b-img
                                                        class="product-img"
                                                        :src="shower_filter.image"
                                                        fluid>
                                                    </b-img>
                                                </div>
                                                <div class="radio d-flex">
                                                    <input type="checkbox"
                                                           class="form-check-input install-options"
                                                           v-model="item.shower_filter.add_to_cart"
                                                           id="shower-filter">
                                                    <label class="form-check-label float-left mr-2"
                                                           for="shower-filter"></label>
                                                    <div class="title">
                                                        <span class="font-22">{{shower_filter.name}}</span>
                                                        <span
                                                            class="description font-18 mb-0 d-block">
                                                            <strike class="text-danger"
                                                                    v-if="shower_filter.actual_price">{{ shower_filter.actual_price | toCurrency }}</strike> {{shower_filter.price | toCurrency }}
                                                        </span>
                                                        <span class="color-black font-16">- Features</span><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <b-form class="mt-4" v-if="item.shower_filter.add_to_cart">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text border-black">Quantity:</div>
                                                </div>
                                                <input type="number" class="form-control border-black"
                                                       v-model="item.shower_filter.quantity" min="1">
                                            </div>
                                        </b-form>
                                    </div>

                                    <div class="py-3">
                                        <b-button @click="nextTab" block variant="outline-primary">
                                            Continue
                                        </b-button>
                                    </div>
                                </b-collapse>
                                <hr class="divider">
                            </b-card>
                        </div>
                    </b-tab>
                    <b-tab title="Finalize" :disabled="thirdTabDisabled">
                        <b-card class="custom-card shadow-sm">
                            <hr class="divider">
                            <p class="title">Model</p>
                            <div class="dotted-border" v-if="item">
                                <p class="title text-center mt-4">{{selectedProduct.name}}</p>
                                <div class="text-center">
                                    <b-img class="product-img" :src="selectedProduct.image" fluid></b-img>
                                </div>
                                <div class="text-center my-2">
                                    <p class="description font-22 mb-0">{{ selectedProduct.price | toCurrency }}</p>
                                    <p class="description font-20 mb-0">{{selectedProduct.tech_gen}}</p>
                                </div>
                            </div>

                            <div v-if="item.traveling_kit.add_to_cart">
                                <p class="title mb-0 mt-4">Traveling Kit</p>
                                <div class="installation-options shop product-detail mt-2 mb-3">
                                    <div class="form-group custom-checkbox cross my-auto">
                                        <div class="radio d-flex">
                                            <input type="checkbox"
                                                   class="form-check-input install-options"
                                                   v-model="item.traveling_kit.add_to_cart"
                                                   id="confirm_accessory" :disabled="true">
                                            <label class="form-check-label float-left mr-2"
                                                   for="confirm_accessory"></label>
                                            <div class="title">
                                                <span class="font-22">{{traveling_kit.name}}</span>
                                                <span
                                                    class="description font-18 mb-0 d-block">{{ traveling_kit.price | toCurrency }}</span>
                                                <span class="color-black font-16">- 1 Additional Faucet 316L medical grade</span><br>
                                                <span class="color-black font-16">- 1 Blue Pipe</span><br>
                                                <span class="color-black font-16">- 1 White Pipe</span><br>
                                                <span class="color-black font-16">- 1 John Guest Spl</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div v-if="item.shower_filter.add_to_cart">
                                <p class="title mb-0 mt-4">Shower Filter</p>
                                <div class="installation-options shop product-detail mt-2 mb-3">
                                    <div class="form-group custom-checkbox cross my-auto">
                                        <div class="radio d-flex">
                                            <input type="checkbox"
                                                   class="form-check-input install-options"
                                                   checked="checked"
                                                   id="confirm_shower_filter" :disabled="true">
                                            <label class="form-check-label float-left mr-2"
                                                   for="confirm_shower_filter"></label>
                                            <div class="title">
                                                <span class="font-22">{{shower_filter.name}} <span
                                                    v-if="item.shower_filter.quantity > 1">({{item.shower_filter.quantity}})</span></span>
                                                <span
                                                    class="description font-18 mb-0 d-block">
                                                    <strike class="text-danger"
                                                            v-if="shower_filter.actual_price">{{ shower_filter.actual_price | toCurrency }}</strike> {{ shower_filter.price | toCurrency }}
                                                </span>
                                                <span class="color-black font-16">- Features</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-if="tabIndex === 3">
                                <p class="title mb-0 mt-4">Shipping and Zone</p>
                                <p class="description font-18 mb-0" v-if="item.address_index === ''">
                                    Zone {{item.zone}}<br>
                                    {{address.street}}<br>
                                    {{address.city}} {{getStateAbbr(address.state_id)}} {{address.zip}}<br>
                                    {{address.apartment}}
                                </p>
                                <p class="description font-18 mb-0" v-else>
                                    Zone {{item.zone}}<br>
                                    {{addresses[item.address_index].street}}<br>
                                    {{addresses[item.address_index].city}}
                                    {{getStateAbbr(addresses[item.address_index].state_id)}}
                                    {{addresses[item.address_index].zip}}<br>
                                    {{addresses[item.address_index].apartment}}
                                </p>
                            </div>
                            <div v-if="item.install_option">
                                <p class="title mb-0 mt-4">Installation</p>
                                <p class="description font-18 mb-0">
                                    {{getInstallationValue(item.install_option).text}}</p>
                            </div>
                            <b-button @click="openModal" block variant="outline-primary" class="my-4">
                                Checkout
                            </b-button>
                            <hr class="divider">
                        </b-card>
                    </b-tab>
                </b-tabs>
            </div>
        </div>
        <shop-modal :customer="_customer" @clicked="modalClick" :wait="wait"></shop-modal>
        <book-appointment></book-appointment>
<!--        <slot name="shop_footer"></slot>-->
    </div>
</template>

<script>
    import {required, requiredIf, minLength, sameAs, email, numeric} from 'vuelidate/lib/validators';

    export default {
        name: "DrinkingWater",
        props: ['_customer', 'products', 'traveling_kit', 'shower_filter', 'addresses', 'states'],
        data() {
            return {
                item: {
                    key: '',
                    zone: '',
                    nickname: '',
                    is_well_water: '',
                    household_size: '',
                    has_filtration_system: '',
                    has_micron_system: '',
                    install_option: '',
                    traveling_kit: {add_to_cart: false},
                    shower_filter: {add_to_cart: false, quantity: 1},
                    address_index: '',
                },
                address: {
                    zip: '',
                    state_id: '',
                    confirmZip: '',
                    street: '',
                    apartment: '',
                    city: '',
                },
                selectedAddressIndex: '',
                selectedProduct: {},
                tabIndex: 0,
                firstTabDisabled: true,
                secondTabDisabled: true,
                thirdTabDisabled: true,
                showWaterZone: true,
                showInstallation: false,

                showTravelingKit: true,
                showShowerFilter: false,
                showShowerFilterEnabled: false,

                nicknameOptions: [
                    {text: 'Main kitchen', value: 'Main kitchen'},
                    {text: 'Bathroom', value: 'Bathroom'},
                    {text: 'Office', value: 'Office'},
                ],
                installOptions: [
                    {text: 'I need help finding a installer in my area', value: 'NEED_INSTALLER'},
                    {text: 'I have my own contractor to install', value: 'HAS_CONTRACTOR'},
                    {text: 'I will install the machine myself (DIY)', value: 'DIY'}
                ],
                options: [
                    {text: 'Yes<br>', value: '1'},
                    {text: 'No', value: '0'},
                ],
                householdSizeOptions: [
                    {text: 'Must select an option from drop down', value: '', disabled: true},
                    {text: '2 people drinking the water', value: '2'},
                    {text: '3+ people drinking the water', value: '3'},
                ],
                wait: false,
            }
        },
        validations() {
            if (this.tabIndex === 1) {
                if (this.showWaterZone) {
                    return {
                        item: {
                            household_size: {required},
                            nickname: {required},
                            is_well_water: {required},
                            has_micron_system: {required},
                            has_filtration_system: {
                                required: requiredIf(() => {
                                    return this.item.is_well_water === "1";
                                })
                            },
                        },
                        address: {
                            zip: {
                                required: requiredIf(() => {
                                    return this.item.address_index === '';
                                })
                            },
                            confirmZip: {
                                required: requiredIf(() => {
                                    return this.item.address_index === '';
                                }),
                                sameAs: sameAs('zip'),
                            },
                            street: {
                                required: requiredIf(() => {
                                    return this.item.address_index === '';
                                })
                            },
                            state_id: {
                                required: requiredIf(() => {
                                    return this.item.address_index === '';
                                })
                            },
                            city: {
                                required: requiredIf(() => {
                                    return this.item.address_index === '';
                                })
                            },
                        }
                    }
                } else {
                    return {
                        item: {
                            install_option: {required},
                        }
                    }
                }
            }
        },
        methods: {
            getStateAbbr(state_id) {
                let state = this.states.find(state => state.id == state_id);
                return state.abbr;
            },
            selectProduct(selectedProduct) {
                this.selectedProduct = selectedProduct;
                this.item.key = selectedProduct.key;
                this.nextTab();
            },
            nextTab() {
                if (this.tabIndex === 0)
                    this.firstTabDisabled = false;
                else if (this.tabIndex === 1)
                    this.secondTabDisabled = false;
                else
                    this.thirdTabDisabled = false;

                this.scrollTop();
                setTimeout(() => this.tabIndex += 1, 500);
            },
            validateInstallation() {
                this.$v.$touch();
                if (!this.$v.$invalid) {
                    this.nextTab();
                }
            },
            toggleWaterZone() {
                this.scrollTop();
                this.showWaterZone = !this.showWaterZone;
                this.showInstallation = !this.showInstallation;
            },
            toggleAccessories() {
                this.scrollTop();
                this.showTravelingKit = !this.showTravelingKit;
                this.showShowerFilter = !this.showShowerFilter;
                this.showShowerFilterEnabled = true;
            },
            toggleInstallation() {
                this.$v.$touch();
                if (!this.$v.$invalid) {
                    if (this.item.address_index === '')
                        this.getZone(this.address.zip);
                    else
                        this.getZone(this.addresses[this.item.address_index].zip);
                    this.showWaterZone = false;
                    this.showInstallation = true;
                    this.scrollTop();
                }
            },
            selectAddress(event, index) {
                if (event.target.checked && this.selectedAddressIndex === index) {
                    document.getElementById('address' + index).checked = false;
                    this.selectedAddressIndex = '';
                    this.item.address_index = '';
                } else
                    this.selectedAddressIndex = index;
            },
            openModal() {
                this.$bvModal.show('shop-modal');
            },
            getInstallationValue(value) {
                return this.installOptions[this.installOptions.findIndex(x => x.value === value)];
            },
            modalClick(next_action) {
                delete this.address['confirmZip'];
                this.wait = true;
                axios.post('api/cart/add-to-cart', {
                    item: this.item,
                    uid: this._customer.uid,
                    address: this.address,
                    next_action: next_action,
                }).then(response => {
                    if (response.data.status === "Success") {
                        if (response.data.redirect.includes("cart")) {
                            this.$bvModal.hide('shop-modal');
                            document.getElementById('content').classList.add('d-none');
                            document.getElementById('loader').classList.remove('d-none');
                        }
                        window.location.href = response.data.redirect;
                    }
                    this.wait = false;
                });
            },
            bookAppointment(){
                this.$bvModal.show('book-appointment-modal');
            },
            scrollTop() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            },
            getZone(zip) {
                axios.post(`api/find-zone/`, {
                    zip: zip,
                    has_micron_system: this.item.has_micron_system,
                    has_filtration_system: this.item.has_filtration_system,
                    is_well_water: this.item.is_well_water,
                }).then(response => {
                    this.item.zone = response.data;
                });
            },
        },
        mounted() {
            this.item.install_option = 'NEED_INSTALLER';
            this.scrollTop();
        }
    }
</script>

<style scoped>
    .shop-product:last-child {
        margin-bottom: 0 !important;
    }
</style>
