<template>
    <div>
        <card class='stripe-card form-control'
              :stripe='stripe_public_key'
              :options='stripeOptions'
              @change='change($event)'
        />
        <div id="card-errors" class="text-left text-danger" role="alert" v-text="errorMessage"></div>
    </div>
</template>

<script>
    import {Card} from 'vue-stripe-elements-plus';

    export default {
        name: "StripeCard",
        props: ['isTest', 'error'],
        watch: {
            error: {
                handler(newVal) {
                    this.errorMessage = newVal;
                }
            }
        },
        components: {Card},
        data() {
            return {
                stripe_public_key: '',
                errorMessage: '',
                stripeOptions: {
                    style: {
                        base: {
                            color: '#111',
                            lineHeight: '18px',
                            fontSize: '16px',
                            fontWeight: 'normal',
                            fontFamily: '"Raleway", Helvetica, sans-serif',
                            fontSmoothing: 'antialiased',
                            '::placeholder': {
                                color: '#aab7c4'
                            }
                        },
                        invalid: {
                            color: '#fa755a',
                            iconColor: '#fa755a'
                        }
                    },
                    hidePostalCode: true
                }
            }
        },
        methods: {
            change(event) {
                this.errorMessage = event.error ? event.error.message : ''
            },
        },
        beforeMount() {
            this.stripe_public_key = this.isTest ? 'pk_test_5k36Nvn7kpqsZx4YWYGoqzXV' : 'pk_live_btgn1r1mkcpnWJTRb59ljlgS';
        }
    }
</script>
