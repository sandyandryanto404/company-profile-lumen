<template>
    <div class="container py-5">
        <div class="row h-100 justify-content-center align-items-center mt-5">
            <div class="col-md-7" v-if="loadingContent">
                <div class="card">
                    <Shimmer :style="{'min-height': '40rem'}" />
                </div>
            </div>
            <div class="col-md-7" v-else>
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="p-2  text-center">
                            <i class="bi bi-person me-1"></i> Manage Profile
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" autocomplete="off">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 mt-3">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" class="form-control" id="" placeholder="" name="">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="first_name" class="form-label">First Name:</label>
                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="gender" class="form-label">Gender:</label>
                                        <Field v-model="user.gender" name="gender" class="form-control" as="select">
                                            <option value="" disabled>Select a Gender</option>
                                            <option v-for="gender in genders" :key="gender.value" :value="gender.value">
                                                {{ gender.text }}
                                            </option>
                                        </Field>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 mt-3">
                                        <label for="phone" class="form-label">Phone Number:</label>
                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="last_name" class="form-label">Last Name:</label>
                                        <input type="text" class="form-control" id="" placeholder="" name="">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="gender" class="form-label">Country:</label>
                                        <Field v-model="user.country" name="country" class="form-control" as="select">
                                            <option value="" disabled>Select a Country</option>
                                            <option v-for="country in countries" :key="country" :value="country">
                                                {{ country }}
                                            </option>
                                        </Field>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address:</label>
                                <textarea rows="4" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="about" class="form-label">About Me:</label>
                                <textarea rows="4" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success" v-tooltip="'Update Profile'">
                                <i class="bi bi-save me-1"></i> Save Changed
                            </button>
                            <button type="reset" class="ms-1 text-white btn btn-warning" v-tooltip="'Reset Form Data'">
                                <i class="bi bi-arrow-clockwise me-1"></i> Reset Form
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Shimmer from "vue3-loading-shimmer";
import { Field } from "vee-validate"
import country from 'country-list-js'
export default {
    components: {
        Field,
        Shimmer
    },
    mounted() {
        document.title = 'Manage Profile | ' + process.env.VUE_APP_TITLE
        let auth = this.auth
        setTimeout(() => {
            if(auth){
                this.loadingContent = false
                this.countries = country.names().sort()
            }else{
                this.$router.push('/') 
            }
        }, 3000)
    },
    data(){
        return {
            loadingContent: true,
            loadingSubmit: false,
            auth: localStorage.getItem("token") !== null,
            countries: [],
            user: {},
            genders: [
                {
                    "value": "M",
                    "text": "Male"
                },
                {
                    "value": "F",
                    "text": "Female"
                }
            ],
        }
    }
}
</script>