<template>
    <div class="container py-5">
        <div class="row h-100 justify-content-center align-items-center mt-5">
            <div class="col-md-12" v-if="loadingContent">
                <Shimmer class="content-loader-full" />
            </div>
            <div class="col-md-4" v-else>
                <div class="card">
                    <div class="card-header text-center bg-primary text-white">
                        <h4 class="p-2">
                            <i class="bi bi-lock me-1"></i> Forgot Password
                        </h4>
                    </div>
                    <div class="card-body">
                        <h1 class="text-center mb-2 auth-icon text-primary"><i class="bi bi-person-circle"></i></h1>
                        <p class="text-center">
                            <small>Enter your email address and we'll send you an email that will allow you reset
                                password.</small>
                        </p>
                        <form action="" method="POST" autocomplete="off">
                            <p class="card-text fw-bold text-muted text-center mb-4">
                                <small>Please complete the form below.</small>
                            </p>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Email Address" />
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-envelope"></i>
                                </span>
                            </div>
                            <button type="submit"  class="btn btn-primary w-100" v-tooltip="'Send link reset password now.'">
                                <i class="bi bi-send me-1"></i> Send Link
                            </button>
                            <div class="mt-3 text-center">
                                <router-link class="text-decoration-none" to="/auth/login" v-tooltip="'Users enter their email and password in the designated fields to access their accounts'">
                                    <i class="bi bi-arrow-left me-1"></i>Remember your password ? <strong>Log
                                        In</strong>
                                </router-link>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Shimmer from "vue3-loading-shimmer"
export default {
    components:{
        Shimmer
    },
    mounted() {
        document.title = 'Forgot Password | ' + process.env.VUE_APP_TITLE
        let auth = this.auth
        setTimeout(() => {
            if(!auth){
                this.loadingContent = false
            }else{
                this.$router.push('/') 
            }
        }, 2000)
    },
    data(){
        return {
            loadingContent: true,
            loadingSubmit: false,
            auth: localStorage.getItem("token") !== null
        }
    }
}
</script>