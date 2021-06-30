<template>
    <b-modal id="shop-modal" hide-header no-close-on-esc no-close-on-backdrop hide-footer centered>
        <div class="text-center p-4">
            <b-button variant="primary" class="btn-blue" block :disabled="disabled" @click="continueShopping">Continue Shopping</b-button>
            <b-button variant="primary" class="btn-blue mt-4" block :disabled="disabled" @click="purchase">Purchase</b-button>
        </div>
    </b-modal>
</template>

<script>
    export default {
        name: "ShopModal",
        props:['wait'],
        data(){
            return{
                disabled: false,
            }
        },
        methods:{
            continueShopping(){
                this.$emit('clicked', 'continue-shopping');
            },
            purchase()
            {
                this.$emit('clicked', 'purchase');
            }
        },
        watch: {
            wait: {
                handler(newVal) {
                    this.disabled = newVal;
                }
            }
        }
    }
</script>
