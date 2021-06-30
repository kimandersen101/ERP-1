<template>
    <div>
        <div class="card-title title text-center font-24 font-weight-bold"> {{ name }}</div>
        <div class="text-center my-4">
            <b-img class="product-img" :src="image" fluid></b-img>
        </div>
        <b-card-text class="text-center my-4">
            <div class="description font-22" v-if="_customer.firstname">{{ price | toCurrency }}</div>
            <div class="description font-20" v-if="_customer.firstname">{{ tech_gen }}</div>
        </b-card-text>
    </div>
</template>

<script>
    export default {
        name: "ShopProduct",
        props: ['name', 'image', 'price', 'tech_gen', '_customer']
    }
</script>
