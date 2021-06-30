<template>
    <article class="text-center mt-4 mb-4">
        <div class="show-interest">
            <div class="form-group custom-checkbox cross mb-0">
                <article class="please-read text-center group-name">
                    <div class="name">Please Read</div>
                    <div class="msg">Save {{subscription_details.promo.discount_value_str}} on all future renewals by joining the loyalty program. This is your only chance to join this program. Cancel at anytime.</div>
                    <a href="#" class="learnmore open-modal d-block mt-2 mb-2 mt-sm-3 mb-sm-3 ml-3" data-toggle="modal" data-target="#loyalty_detail">Learn more <i class="material-icons right-arrow">keyboard_arrow_right</i></a>
                </article>
                <input type="checkbox" id="is_loyalty" class="is_loyality_to" @change="handleloyalty($event)">
                <label for="is_loyalty" class="text-center mb-0"></label>
                <div class="title ml-3">Join the loyalty program now</div>
            </div>
        </div>
    </article>
</template>

<script>
    export default {
        name: "loyalty",
        props: ['subscription_details'],
        methods:{
            handleloyalty($event){
                this.$emit('changed', $event.target.checked);
            }
        }
    }
</script>

<style scoped>

</style>
