<template>
    <b-card class="card-container shadow-sm" header-class="bg-app-blue text-white">
        <template #header>
            <div>Find Zone</div>
        </template>
        <b-form>
            <div class="form-row">
                <div class="form-group col-md-4 offset-md-3 mb-3 md-md-0">
                    <input type="text" class="form-control" placeholder="Zip Code" v-model="zip" @input="input"
                           required>
                </div>
                <div class="form-group col-md-1">
                    <b-button class="form-control btn btn-primary btn-orange" @click="onSubmit">
                        Find
                    </b-button>
                </div>
            </div>
            <div class="form-row text-danger error" v-if="$v.zip.$dirty && $v.zip.$invalid || errorMessage != ''">
                <div class="col-md-4 offset-md-3">
                    <span v-if="errorMessage === ''">Enter a valid zip code<br></span>
                    <span>{{errorMessage}}</span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4 offset-md-3">
                    <input type="text" class="form-control" v-model="zone" placeholder="" disabled>
                </div>
            </div>
        </b-form>
    </b-card>
</template>

<script>
    import {required, numeric} from 'vuelidate/lib/validators';

    export default {
        name: "FindZone",
        data() {
            return {
                zip: '',
                zone: '',
                errorMessage: '',
            }
        },
        validations() {
            return {
                zip: {required, numeric}
            }
        },
        methods: {
            onSubmit() {
                this.$v.$touch();
                if (!this.$v.$invalid) {
                    this.errorMessage = '';
                    axios.post(`api/find-zone`, {
                        zip: this.zip,
                    }).then(response => {
                        if (response.status === 200) {
                            this.zone = 'Zone ' + response.data;
                        }
                    });
                }
            },
            input() {
                this.$v.$touch()
                this.errorMessage = '';
            }
        }
    }
</script>
