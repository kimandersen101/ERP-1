<template>
    <b-modal id="shipping-address-modal" modal-class="custom-modal" centered hide-footer>
        <template v-slot:modal-title>
            Edit Shipping Address
        </template>
        <div class="modal-body confirm-body p-4 text-center">
            <form role="form" data-toggle="validator" @submit.prevent="submit">
                <input type="hidden" name="update_type" value="shipping">
                <div class="form-group">
                    <input type="text" class="form-control" name="street_address"
                           v-model="customerData.street_address" placeholder="Address*"
                           value="customerData.street_address" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="appartment" placeholder="Apt/Suite/Unit #"
                           v-model="customerData.appartment" value="customerData.appartment">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="city" placeholder="City*"
                           v-model="customerData.city" value="customerData.city" required>
                </div>
                <div class="form-group">
                    <select class="form-control" placeholder="State" name="state_id" id="states"
                            v-model="customerData.state_id" required>
                        <option value="" disabled selected hidden>State</option>
                        <option v-for="state in states" :value="state.id">{{state.name}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="zipcode" placeholder="Zipcode*"
                           v-model="customerData.zipcode" value="customerData.zipcode" required>
                </div>
                <div class="container px-0">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <input type="submit" class="btn btn-light btn-yes btn-lg btn-block"
                                   id="shipping_address" value="Save">
                        </div>
                        <div class="col-md-6 mt-3">
                            <button type="button" class="btn btn-primary btn-blue btn-lg btn-block"
                                    @click="$bvModal.hide('shipping-address-modal')">Close
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <p>{{customerData.zipcode}}</p>
        </div>
    </b-modal>
</template>

<script>
    export default {
        name: "shipping_address_modal",
        props: ['states', 'customer'],
        data() {
            return {
                customerData: this.customer,
            }
        },
        methods: {
            submit() {
                this.$emit('change', this.customerData);
                this.$bvModal.hide('shipping-address-modal');
            },
        },
    }
</script>

<style scoped>

</style>
