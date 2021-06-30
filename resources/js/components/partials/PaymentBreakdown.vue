<template>
    <article class="payment-breakdown text-center">
        <div class="form-group mt-4">
            <label class="filter-labels name mb-0">Purchase Summary:</label>
            <hr class="divider">
        </div>
        <input type="hidden" id="promo_exist" :value="customer.promo_id">
        <div class="row">
            <div class="col-auto mr-auto title">Sub-Total</div>
            <div class="col-auto amount" id="sub_total" :value="customer_order.sub_total">
                ${{customer_order.formated_sub_total}}
            </div>
        </div>

        <div class="row mt-2 d-none" id="financing_field" v-if="customer_order.financing_fee">
            <div class="col-auto mr-auto title">Financing Fee</div>
            <div class="col-auto amount" id="financing_fee" :value="customer_order.financing_fee">
                ${{customer_order.formated_financing_fee}}
            </div>
        </div>

        <div class="row mt-2" id="event_promo_field" v-if="customer_order.event_promo">
            <div class="col-auto mr-auto title">{{customer_order.event_promo.name}}</div>
            <div class="col-auto amount" id="event_promo" :value="customer_order.event_promo.value">
                -${{customer_order.event_promo.formated_value}}
            </div>
        </div>

        <div class="row mt-2" v-if="session.controlling_admin_id">
            <div class="col-auto mr-auto title">Discount</div>
            <div class="col-auto amount">$
                <input type="text" name="discount" id="discount" value="0">
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-auto mr-auto title">Shipping</div>
            <div class="col-auto amount" id="shipping" :value="customer_order.shipping">
                ${{customer_order.formated_shipping}}
            </div>
        </div>

        <div class="row mt-2" v-if="session.controlling_admin_id">
            <div class="col-auto mr-auto title">Shipping Discount</div>
            <div class="col-auto amount">$
                <input type="text" name="shipping_discount" id="shipping_discount" value="0">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-auto mr-auto title">
                Tax (<span id="tax_percent" :value="customer_order.formated_tax_percent">{{customer_order.formated_tax_percent}}</span>%)
            </div>
            <div class="col-auto amount" id="tax">${{customer_order.formated_tax}}</div>
        </div>
        <div class="row mt-4">
            <div class="col-auto mr-auto title">Total</div>
            <div class="col-auto amount" id="total">${{customer_order.formated_total}}</div>
        </div>
        <div class="row mt-4" v-if="session.controlling_admin_id">
            <div class="col-12">
                <textarea class="form-control" name="admin_note" id="admin_note" placeholder="Add admin notes..."
                          style="resize: none;"></textarea>
            </div>
        </div>
    </article>

</template>

<script>
    export default {
        name: "PaymentBreakdown",
        props: ['customer', 'customer_order', 'session'],
        data() {
            return {
                sub_total: '',
                financing_fee: '',
                event_promo: '',
            }
        },
        methods: {
            number_format(value, decimals) {
                axios.post(app_url + '/api/number-format', {
                    number: value,
                    decimals: decimals,
                }).then(response => {
                    return response.data;
                }).catch(error => {
                    console.log(error);
                });
            },
        }
    }
</script>

<style scoped>

</style>
