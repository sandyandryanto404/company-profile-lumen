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
                            <i class="bi bi-lock me-1"></i> Change Password
                        </h4>
                    </div>
                    <div class="card-body">
                        <h1 class="text-center mb-2 auth-icon text-primary"><i class="bi bi-person-circle"></i></h1>
                        <form action="" method="POST" autocomplete="off">
                            <p class="card-text fw-bold text-muted text-center mb-4">
                                <small>Please complete the form below.</small>
                            </p>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Current Password" />
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-key"></i>
                                </span>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="New Password" />
                                <span class="input-group-text" id="basic-addon2">
                                    <i class="bi bi-key"></i>
                                </span>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Confirm New Password" />
                                <span class="input-group-text" id="basic-addon3">
                                    <i class="bi bi-key"></i>
                                </span>
                            </div>
                            <button type="submit"  class="btn btn-primary w-100"
                                v-tooltip="'Update New Password'">
                                <i class="bi bi-save me-1"></i> Set Password
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
export default {
    components: {
        Shimmer
    },
    mounted() {
        document.title = 'Change Password | ' + process.env.VUE_APP_TITLE
        let auth = this.auth
        setTimeout(() => {
            if(auth){
                this.loadingContent = false
            }else{
                this.$router.push('/') 
            }
        }, 3000)
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