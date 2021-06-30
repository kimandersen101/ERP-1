<template>
    <div class="py-4 shop">
        <div class="row justify-content-md-center px-4">
            <div class="col-md-12">
                <h4 class="main-heading text-center mb-0 font-weight-bold">Products</h4>
            </div>
        </div>
        <div v-for="product in products" :key="product.id"
             class="row justify-content-center no-gutters card-deck mt-4 font-weight-bold">
            <div class="col-12 col-sm-5 lg=6">
                <b-card class="py-4 px-2 custom-card shadow-sm" :title="product.name">
                    <div class="text-center mt-4">
                        <b-img class="product-img" :src="productimage( product.image )" fluid></b-img>
                    </div>
                    <b-button :href="redirect_url(product.key)" class="btn-blue d-block mt-5">Select</b-button>
                </b-card>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ShopProducts",
        props: ['products', '_customer'],
        methods: {
            productimage(image) {
                return `${app_url}/images/machine.png`;
            },
            redirect_url(key){
                return `${app_url}/${this._customer.uid}/shop/${key}`;
            }
        },
    }
</script>

<style scoped>

</style>
