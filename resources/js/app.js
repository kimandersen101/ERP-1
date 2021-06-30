/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
// vuelidate for form validations
import Vuelidate from 'vuelidate';
import {BootstrapVue, IconsPlugin} from 'bootstrap-vue';
import vSelect from 'vue-select';

// Install BootstrapVue
Vue.use(BootstrapVue);
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin);

Vue.use(Vuelidate);
Vue.component('v-select', vSelect);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('find-zone', require('./components/FindZone.vue').default);
Vue.component('play-list', require('./components/Playlist.vue').default);
//Vue.component('shop-products', require('./components/ShopProducts.vue').default);
//Vue.component('shop', require('./components/shop/Shop.vue').default);

Vue.component('drinking-water', require('./components/DrinkingWater.vue').default);
Vue.component('shop-product', require('./components/shop/ShopProduct.vue').default);
Vue.component('cart', require('./components/Cart.vue').default);
Vue.component('check-out', require('./components/Checkout.vue').default);


Vue.component('stripe', require('./components/StripeCard.vue').default);
Vue.component('credit-card', require('./components/CreditCard.vue').default);
Vue.component('payment-breakdown', require('./components/partials/PaymentBreakdown.vue').default);
Vue.component('shipping-address-modal', require('./components/modals/ShippingAddressModal.vue').default);
Vue.component('shop-modal', require('./components/modals/ShopModal.vue').default);
Vue.component('pay-by-check', require('./components/Check.vue').default);
Vue.component('financing', require('./components/Financing.vue').default);
Vue.component('affiliate', require('./components/Affiliate.vue').default);
Vue.component('terms-conditions', require('./components/partials/TermsAndConditions.vue').default);

Vue.component('message-modal', require('./components/modals/MessageModal.vue').default);
Vue.component('book-appointment', require('./components/modals/BookAppointment.vue').default);
Vue.component('optin', require('./components/Optin.vue').default);
Vue.component('optin-form', require('./components/OptinForm.vue').default);

Vue.component('bank-financing', require('./components/BankFinancing.vue').default);
Vue.component('loyalty', require('./components/partials/loyalty.vue').default);
Vue.component('shipping-address', require('./components/partials/ShippingAddress.vue').default);

/**
 * Custom Global Filters
 */
Vue.filter('toCurrency', function (value, decimals) {
    if (typeof value !== "number") {
        return value;
    }
    var formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
        minimumFractionDigits: typeof decimals !== 'undefined' ? decimals : (value % 1 === 0 ? 0 : 2),
    });
    return formatter.format(value);
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
    el: '#app',
    data: {
        running: false,
        startTime: null,
        stopTime: null,
        totalTime: 0,
        time_log: 1000,
        countdown_log: 0,
        MaxScrolled: 0,
        pageId: '',
        timeInSeconds: 0,
    },
    methods: {
        currentTime() {
            var day = new Date();
            return day.getTime();
        },
        start() {
            if (this.running == true)
                return;
            else if (this.startTime != null)
                this.stopTime = null;

            this.startTime = this.currentTime();
            this.running = true;
        },
        duration() {
            if (this.startTime == null) {
                return 'Undefined';
            } else {
                return (this.currentTime() - this.startTime) / 1000;
            }
        },
        pause() {
            if (this.running == false)
                return;

            this.timeInSeconds += this.duration();
            this.stopTime = this.currentTime();
            this.running = false;
        },
        timeCalculate() {
            this.pause();
            this.start();
            return this.timeInSeconds;
        },
        timer_log() {
            clearInterval(this.countdown_log);

            this.countdown_log = setInterval(() => {
                clearInterval(this.countdown_log);

                if (this.running) {
                    if (parseInt(this.timeCalculate()) % 5 == 0) {
                        this.save_page_tracking();
                    }
                }

                this.timer_log();

            }, this.time_log);
        },
        save_page_tracking(call_to_action) {
            axios.post('api/tracking', {
                'page_id': this.pageId,
                'unique_code': uid,
                'viewed': this.scrolled_count(),
                'time_in_second': parseInt(this.timeInSeconds),
                'call_to_action': call_to_action
            }).then(response => {
                // console.log(response);
            }).catch(function (error) {
            });
        },
        scrolled_count() {

            var h = document.documentElement,
                b = document.body,
                st = 'scrollTop',
                sh = 'scrollHeight';

            var docheight = Math.max(b.scrollHeight, b.offsetHeight,
                h.clientHeight, h.scrollHeight, h.offsetHeight);

            var hasVScroll = window.innerHeight - docheight;
            var percent_scrolled = Math.round((h[st] || b[st]) / ((h[sh] || b[sh]) - h.clientHeight) * 100);

            if (!hasVScroll)
                this.MaxScrolled = 100;

            if (percent_scrolled > this.MaxScrolled)
                this.MaxScrolled = percent_scrolled;

            return this.MaxScrolled;
        },
        callToAction(call_to_action) {
            this.save_page_tracking(call_to_action);
        }
    },
    mounted() {
        this.start();
        this.timer_log();

        this.pageId = !page_detail ? '' : page_detail.id;
        this.MaxScrolled = !page_detail ? 0 : !page_detail.tracking ? 0 : page_detail.tracking.completed_percent;
        this.timeInSeconds = !page_detail ? 0 : !page_detail.tracking ? 0 : page_detail.tracking.time_in_seconds;

        window.addEventListener('focus', () => {
            this.start();
        });
        window.addEventListener('blur', () => {
            this.pause();
        });
        window.addEventListener('scroll', () => {
            this.scrolled_count();
        });
    }
});
