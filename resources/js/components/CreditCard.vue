<template>
    <section class="bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 ">
                    <div class="card custom-card border-0">
                        <div class="card-body">
                            <form method="post" id="purchase_by_card_form">
                                <input type="hidden" name="customer_order_id" value="customer_order->id">
                                <input type="hidden" name="payment_method" value="payment_method_key">

                                <shipping-address :customer="customer"></shipping-address>

                                <payment-breakdown :customer_order="customer_order"
                                                   :customer="customer"
                                                   :session="{controlling_admin_id: null}">
                                </payment-breakdown>

                                <article class="valid-card text-center mt-4">
                                    <div class="title">Enter your card number below</div>
                                </article>
                                <stripe></stripe>

                                <input type="hidden" id="loyal_exist" value="customer.is_loyalty_member">
                                <loyalty :subscription_details="subscription_details"></loyalty>

                                <button type="submit" id="purchase_button" class="btn btn-primary btn-blue btn-lg btn-block" :class="{'mt-44' : !customer.is_loyalty, 'mt-14': customer.is_loyalty }"  disabled="disabled">Purchase</button>
                                <div class="row justify-content-center mt-4 mb-5">
                                    <div class="col-6 text-center">
                                        <img class="w-100" :src="imageurl('payment.png')">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "CreditCard",
        props: ['payment_method_key', 'customer', '_customer', 'customer_order', 'subscription_details'],
        methods:{
            imageurl( image )
            {
                return `${app_url}/images/${image}`;
            }
        }
    }
</script>

<style scoped>

</style>
