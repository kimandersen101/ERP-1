<template>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col shop-card">
                <section class="cart" v-if="cart.items">
                    <h3 class="text-center page-title mb-5">Shopping Cart</h3>
                    <section class="product mb-5" v-for="(item, itemIndex) in cart.items">
                        <div class="card custom-card shadow-sm">
                            <div class="card-header has-close-btn">
                                <h4 class="title text-truncate">{{item.name}}</h4>
                                <i class="material-icons close-button remove-from-cart"
                                   @click="removeFromCart(itemIndex)">close</i>
                            </div>
                            <div class="card-body p-4 p-sm-5" id="bundle">
                                <div v-for="(product, productIndex) in item.products">
                                    <div class="row justify-content-center no-gutters">
                                        <div class="col-sm-6 my-auto product-img vpreset_filters">
                                            <img class="d-block mx-auto" :src="product.image"
                                                 v-bind:class="{ 'img-height': product.key == 'rv-system' }">
                                        </div>
                                        <div class="col-sm-6 my-auto product-detail">
                                            <div class="text-center mt-4 mt-sm-0">
                                                <span
                                                    class="product-name">{{ (product.is_preset_filter ? 'Zone ' + item.zone + ' - ' : '') + product.name}} <span
                                                    v-if="product.key === 'shower-filter' && product.quantity > 1">({{product.quantity}})</span> </span>
                                                <span class="old-price" v-if="product.actual_price">
                                                    <strike>{{ product.actual_price | toCurrency }}</strike>
                                                </span>
                                                <span class="price">{{product.price > 0 ? $options.filters.toCurrency(product.price) : 'FREE'}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1 justify-content-center">
                                        <div class="col">
                                            <hr class="divider my-4">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-auto mr-auto sub-total">Total</div>
                                    <div class="col-auto amount">
                                        {{ item.subtotal | toCurrency }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col text-center mt-2 remove-cart">
                                <span class="remove-from-cart"
                                      @click="removeFromCart(itemIndex)">Remove from the cart</span>
                            </div>
                        </div>
                    </section>
                    <div class="card custom-card border-0 mt-4 bg-transparent">
                        <div class="card-body p-0 payment-breakdown">
                            <div class="row justify-content-center">
                                <div class="col">
                                    <hr class="divider">
                                </div>
                            </div>
                            <section>
                                <div class="row">
                                    <div class="col-auto mr-auto title">Sub-Total</div>
                                    <div class="col-auto amount">{{ cart.subtotal | toCurrency(2) }}</div>
                                </div>
                                <div class="row mt-2" v-if="is_admin_control">
                                    <div class="col-auto mr-auto title">Discount</div>
                                    <input type="number" class="discount-in-cart" v-model="discount" min="0">
                                </div>
                                <div class="row mt-2">
                                    <div class="col-auto mr-auto title">Shipping</div>
                                    <div class="col-auto amount">{{ cart.shipping_price | toCurrency(2) }}</div>
                                </div>
                                <div class="row mt-2" v-if="is_admin_control">
                                    <div class="col-auto mr-auto title">Shipping Discount</div>
                                    <input type="number" class="discount-in-cart" v-model="shipping_discount"
                                           min="0">
                                </div>
                                <div class="row mt-2">
                                    <div class="col-auto mr-auto title">Tax</div>
                                    <div class="col-auto amount">{{ cart.tax | toCurrency(2) }}</div>

                                    <div class="col-12">
                                        <a href="javascript:void(0)" class="show-tax-details" v-b-toggle.show-tax-details>Show Tax Details</a>
                                    </div>
                                    <b-collapse id="show-tax-details" class="col-12">
                                        <b-card>
                                            <div class="row" v-for="(item, itemIndex) in cart.items">
                                                <div class="col-auto mr-auto">{{item.zip}} - {{item.tax_percent}}%</div>
                                                <div class="col-auto">{{ item.subtotal | toCurrency }} (<strong>{{ item.tax | toCurrency }}</strong>)</div>
                                            </div>
                                        </b-card>
                                    </b-collapse>
                                </div>
                                <div class="row mt-2" v-if="cart.promo">
                                    <div class="col-auto mr-auto title">Promo Discount</div>
                                    <div class="col-auto amount">- {{ cart.promo.amount | toCurrency(2) }}</div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-auto mr-auto title">Total</div>
                                    <div class="col-auto amount">{{ total | toCurrency(2) }}</div>
                                </div>
                                <div class="row mt-4 px-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control border-black font-weight-bold"
                                               placeholder="Promo Code"
                                               v-model="promo_code">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button" @click="applyPromo">Apply
                                            </button>
                                        </div>
                                    </div>
                                    <p class="text-danger mb-0" v-text="errorPromoMessage"></p>
                                </div>
                                <div class="row px-3 mt-3" v-if="is_admin_control">
                                    <b-form-textarea
                                        id="textarea"
                                        v-model="notes"
                                        placeholder="Add admin note...."
                                        rows="1"
                                        class="admin-notes"
                                        max-rows="6"
                                    >
                                    </b-form-textarea>
                                </div>
                            </section>
                            <div class="row">
                                <div class="col mt-4">
                                    <button type="button" data-toggle="modal" data-target="#addon"
                                            class="btn btn-primary btn-blue btn-lg btn-block open-modal"
                                            :disabled="wait"
                                            @click="checkout">
                                        <b-spinner variant="primary" v-if="wait" class="spinner-button color-white"></b-spinner>
                                        {{ wait ? 'Please wait...': 'Check Out' }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="order_close">
                        <input type="hidden" name="customer_order_id" value="">
                    </form>
                </section>

                <section class="empty-cart text-center" v-else>
                    <h5 class="mb-3">You don't have anything in Cart</h5>
                    <div class="row justify-content-center">
                        <div class="col col-sm-8">
                            <a href="" class="btn btn-primary btn-blue btn-lg btn-block">Shop Again</a>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Cart",
        props: ['cart', 'uid', 'is_admin_control', 'promo_flash'],
        data() {
            return {
                discount: this.cart.discount,
                shipping_discount: this.cart.shipping_discount,
                notes: this.cart.notes,
                promo_code: '',
                errorPromoMessage: '',
                wait: false,
            }
        },
        computed: {
            total: function () {
                let total_without_discount = this.cart.total;
                return total_without_discount - (+this.discount) - (+this.shipping_discount);
            }
        },
        methods: {
            checkout() {
                this.wait = true;
                axios.post('api/cart/admin-input',
                    {
                        'discount': this.discount,
                        'shipping_discount': this.shipping_discount,
                        'notes': this.notes,
                    }).then(response => {
                    if (response.data.status === 'Success')
                    {
                        window.location.href = 'checkout';
                        this.wait = false;
                    }
                });
            },
            removeFromCart(index) {
                axios.post('api/cart/remove-from-cart', {
                    'item_index': index,
                    'uid': this.uid
                }).then(response => {
                    if (response.status == 200)
                        window.location.href = 'cart';
                });
            },
            applyPromo() {
                axios.post('api/cart/apply-promo', {
                    'promo_code': this.promo_code,
                }).then(response => {
                    if (response.data.status === 'Success')
                        window.location.href = 'cart';
                    else
                        this.errorPromoMessage = response.data.message;
                });
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
            if (this.promo_flash !== null)
                this.makeToast('success', 'Success', this.promo_flash);
        },
    }
</script>

<style scoped>

</style>
