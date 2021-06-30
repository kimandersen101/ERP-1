<template>
    <b-card class="custom-card shadow-sm">
        <div>
            <hr class="divider">
            <div class="d-flex flex-row justify-content-between">
                <p class="d-inline-block mb-0 title font-33">Pay by check</p>
            </div>
        </div>
        <b-form class="mt-4">
            <p class="mt-4 font-22 font-weight-bold">Add front of the check image:</p>
            <b-form-group>
                <b-form-file
                    v-model="check.frontFile"
                    @change="frontImage($event)"
                    accept="image/*, .pdf"
                    class="form-group input-border mb-0"
                    size="lg"
                    :class="[ $v.check.front.image.$invalid && $v.check.front.image.$dirty ? 'is_invalid': '' ]"
                    plain></b-form-file>
            </b-form-group>
            <p class="mt-4 font-22 font-weight-bold">Add back of the check image:</p>
            <b-form-group>
                <b-form-file
                    v-model="check.backFile"
                    @change="backImage($event)"
                    accept="image/*, .pdf"
                    class="form-group input-border mb-0"
                    size="lg"
                    :class="[ $v.check.back.image.$invalid && $v.check.back.image.$dirty ? 'is_invalid': '' ]"
                    plain></b-form-file>
            </b-form-group>
            <b-button @click="nextTab" block variant="outline-primary"
                      class="my-4">
                Continue
            </b-button>
        </b-form>
    </b-card>
</template>

<script>
    import {required} from 'vuelidate/lib/validators';

    export default {
        name: "Check",
        props: ['payByCheck'],
        data() {
            return {
                check: {
                    front: {
                        image: null,
                        ext: null
                    },
                    back: {
                        image: null,
                        ext: null
                    },
                    frontFile: null,
                    backFile: null,
                },
                attachmentError: '',
            }
        },
        validations() {
            return {
                check: {
                    front: {
                        image: {required}
                    },
                    back: {
                        image: {required}
                    }
                }
            }
        },
        methods: {
            frontImage(event) {
                if (event.target.files.length > 0) {
                    var fileReader = new FileReader();
                    fileReader.readAsDataURL(event.target.files[0]);
                    this.check.front.ext = this.getExtension(event.target.files[0].name);

                    fileReader.onload = (e) => {
                        this.check.front.image = e.target.result;
                    }
                } else {
                    this.check.front.image = null;
                }
            },
            backImage(event) {
                if (event.target.files.length > 0) {
                    var fileReader = new FileReader();
                    fileReader.readAsDataURL(event.target.files[0]);
                    this.check.back.ext = this.getExtension(event.target.files[0].name);

                    fileReader.onload = (e) => {
                        this.check.back.image = e.target.result;
                    }
                } else {
                    this.check.back.image = null;
                }
            },
            nextTab() {
                this.$v.$touch();
                if (!this.$v.$invalid) {
                    this.$emit('checkdata', this.check);
                }
            },
            getExtension(filename){
                return filename.split('.').pop();
            }
        },
        beforeMount() {
            if (this.payByCheck !== null)
                this.check = this.payByCheck;
        }
    }
</script>

<style scoped>

</style>
