<template>
    <article class="shipping-address text-center">
        <div class="form-group">
            <label class="filter-labels name mb-0">Shipping address:</label>
            <hr class="divider">
        </div>
        <div class="shipping-address-content px-5 py-4 mb-3 mt-4">
            <div class="address" id="payment_shipping_address">
                {{customer.address_string}}
            </div>

            <a href="#" class="edit mt-3" @click="$bvModal.show('shipping-address-modal')" >Edit <i class="material-icons right-arrow">keyboard_arrow_right</i></a>
        </div>
    </article>

</template>

<script>
    export default {
        name: "ShippingAddress",
        props:['customer'],
    }
</script>

<style scoped>

</style>
