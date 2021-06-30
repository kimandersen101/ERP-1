<template>
    <b-modal id="book-appointment-modal" no-close-on-esc no-close-on-backdrop centered>
        <template class="py-4" #modal-title>
            Learn more by booking an appointment now
        </template>
        <div class="text-center p-4">
            <b-form class="opt_in">
                <b-form-group class="mb-3">
                    <p class="mb-0 text-left">First name</p>
                    <b-form-input
                        type="text"
                        v-model="user.firstname"
                    ></b-form-input>
                    <div
                        class="help-block pl-2 with-errors text-danger text-left"
                        v-if="$v.user.firstname.$dirty && $v.user.firstname.$invalid">
                        Field is required
                    </div>
                </b-form-group>
                <b-form-group class="mb-3">
                    <p class="mb-0 text-left">Last name</p>
                    <b-form-input
                        type="text"
                        v-model="user.lastname"
                    ></b-form-input>
                    <div
                        class="help-block pl-2 with-errors text-danger text-left"
                        v-if="$v.user.lastname.$dirty && $v.user.lastname.$invalid">
                        Field is required
                    </div>
                </b-form-group>
                <b-form-group class="mb-3">
                    <p class="mb-0 text-left">Email Address</p>
                    <b-form-input
                        type="text"
                        v-model="user.email"
                    ></b-form-input>
                </b-form-group>
                <b-form-group class="mb-3">
                    <p class="mb-0 text-left">Phone</p>
                    <masked-input
                        type="text"
                        :mask="['(', /[1-9]/, /\d/, /\d/, ')', ' ', /\d/, /\d/, /\d/, '-', /\d/, /\d/, /\d/, /\d/]"
                        class="form-control"
                        v-model="user.phone"
                        minlength="14">
                    </masked-input>
                    <div
                        class="help-block pl-2 with-errors text-danger text-left"
                        v-if="$v.user.phone.$dirty && $v.user.phone.$invalid">
                        field must have atleast 14 digits
                    </div>
                </b-form-group>
            </b-form>
        </div>
        <template class="py-4" #modal-footer>
            <b-button
                @click="saveOptIn"
                :disabled="wait"
                block
                variant="primary">
                <b-spinner variant="primary" v-if="wait" class="spinner-button"></b-spinner>
                {{ wait ? 'Please wait...': 'Book now' }}
            </b-button>
        </template>
    </b-modal>
</template>

<script>

    import {required} from 'vuelidate/lib/validators';
    import MaskedInput from 'vue-text-mask';
    import {validPhone} from '../../validators/CustomValidation';

    export default {
        name: "BookAppointment",
        components: {MaskedInput},
        data() {
            return {
                user: {
                    firstname: '',
                    lastname: '',
                    email: '',
                    phone: '',
                },
                wait: false,
            }
        },
        validations() {
            return {
                user: {
                    firstname: {required},
                    lastname: {required},
                    phone: {
                        validatePhone(val) {
                            if (val) {
                                return validPhone(val);
                            }
                            return true;
                        }
                    }
                }
            }
        },
        methods: {
            saveOptIn() {
                this.$v.$touch();
                if (!this.$v.$invalid) {
                    if (this.user.email === '' && this.user.phone === '') {
                        this.makeToast('danger', 'Error', 'Please enter your Email or Phone');
                    } else {
                        axios.post(`api/save-optin-lead`, {
                            user: this.user,
                        }).then(response => {
                            if (response.data.status === 'Success') {
                                this.makeToast('success', 'Success', 'User created');
                                location.reload();
                            } else {
                                this.makeToast('danger', 'Error', response.data.message);
                            }
                        });
                    }
                }
            },
            makeToast(variant, title, message) {
                this.$bvToast.toast(message, {
                    title: title,
                    variant: variant,
                    toaster: 'b-toaster-top-right',
                    solid: true
                })
            }
        }
    }
</script>

<style scoped>
    .modal-body {
        background-color: #f9f9f9;
    }
</style>
