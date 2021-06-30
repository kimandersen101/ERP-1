<template>
    <div>
        <h4 class="form_heading mt-3"><strong>{{title}}</strong></h4>
        <b-form class="mx-4 my-3 opt_in">
            <b-form-group class="mb-3">
                <b-form-input
                    type="text"
                    placeholder="First name*"
                    v-model="user.firstname"
                ></b-form-input>
                <div
                    class="help-block pl-2 with-errors text-danger text-left"
                    v-if="$v.user.firstname.$dirty && $v.user.firstname.$invalid">
                    Field is required
                </div>
            </b-form-group>
            <b-form-group class="mb-3">
                <b-form-input
                    type="text"
                    placeholder="Last name*"
                    v-model="user.lastname"
                ></b-form-input>
                <div
                    class="help-block pl-2 with-errors text-danger text-left"
                    v-if="$v.user.lastname.$dirty && $v.user.lastname.$invalid">
                    Field is required
                </div>
            </b-form-group>
            <b-form-group class="mb-3">
                <b-form-input
                    type="text"
                    placeholder="Email Address"
                    v-model="user.email"
                ></b-form-input>
            </b-form-group>
            <b-form-group class="mb-3">
                <masked-input
                    type="text"
                    :mask="['(', /[1-9]/, /\d/, /\d/, ')', ' ', /\d/, /\d/, /\d/, '-', /\d/, /\d/, /\d/, /\d/]"
                    class="form-control"
                    v-model="user.phone"
                    placeholder="Phone*"
                    minlength="14">
                </masked-input>
                <div
                    class="help-block pl-2 with-errors text-danger text-left"
                    v-if="$v.user.phone.$dirty && $v.user.phone.$invalid">
                    field must have atleast 14 digits
                </div>
            </b-form-group>
            <b-button
                @click="saveOptIn"
                :disabled="wait"
                block
                variant="primary">
                <b-spinner variant="primary" v-if="wait" class="spinner-button"></b-spinner>
                {{ wait ? 'Please wait...': 'Book an appointment' }}
            </b-button>
        </b-form>
    </div>
</template>

<script>

    import {required} from 'vuelidate/lib/validators';
    import MaskedInput from 'vue-text-mask';
    import {validPhone} from '../validators/CustomValidation';

    export default {
        name: "OptinForm",
        components: {MaskedInput},
        props: ['customer', 'title'],
        data() {
            return {
                user: {
                    firstname: '',
                    lastname: '',
                    email: '',
                    phone: '',
                },
                wait: false,
                modal: {
                    title: '',
                    message: '',
                    variant: '',
                },
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
                        this.showMessageModal('Error', 'Please enter your Email or Phone', 'danger');
                    } else {
                        axios.post(`api/save-optin-lead`, {
                            user: this.user,
                        }).then(response => {
                            if (response.data.status === 'Success') {
                                this.makeToast('success', 'Success', 'User created');
                                this.user = {};
                                this.$v.$reset();
                            }
                            else{
                                this.makeToast('danger', 'Error', response.data.message);
                            }
                        });
                    }
                }
            },
            showMessageModal(title, message, variant) {
                this.modal.title = title;
                this.modal.message = message;
                this.modal.variant = variant;
                this.$emit('showModal', this.modal);
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
