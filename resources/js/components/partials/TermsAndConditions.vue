<template>
    <article class="text-center mt-4 mb-3">
        <div class="show-interest">
            <div class="form-group custom-checkbox cross mb-0">
                <article class="please-read group-name my-2">
                    <div class="name mb-1">software-demand.com Loyalty Program</div>
                    <div class="msg text-left">
                        <p>
                            An Affiliate Marketer is automatically enrolled into software-demand.com Loyalty Program. This includes the auto-renewal subscription on their software-demand.com purchase for filter renewals at 10% discount. An email reminder will be sent out 4 days prior an auto-renewal is due. You may change your subscription preferences at mywater.springaqua.com <br><br>
                        </p>
                    </div>
                    <article class="terms">
                        <b>Terms and Conditions:</b>
                        <ol>
                            <li>An affiliate is required to have an active subscription of the software-demand.com loyalty program. If the subscription is not active, then access to the software-demand.com Bob app will be denied and commissions will be forfeited.</li>
                            <li>The software-demand.com “shower filter” loyalty program renews every 6 months. Please login into mywater.springaqua.com for your loyalty subscription details.</li>
                            <li>It is required to have a working iPhone or Android in order to have the software-demand.com “Bob” app work.</li>
                            <li>There is no refund on the one time $36 set up fee.</li>
                            <li>A used shower filter is not refundable and a 15% restocking fee may be applied to returnable products.</li>
                        </ol>
                    </article>
                </article>
            </div>
        </div>
    </article>
</template>

<script>
    export default {
        name: "TermsAndConditions",
        data(){
            return{
                backofficeUrl: '',
            }
        },
        methods:{
            click(){

            },
        },
        mounted(){
            this.backofficeUrl = backoffice_url;
        }
    }
</script>

<style scoped>

</style>
