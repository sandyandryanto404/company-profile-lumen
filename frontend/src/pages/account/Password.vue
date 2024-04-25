<template>
    <div class="container py-5">
        <div class="row h-100 justify-content-center align-items-center mt-5">
            <div class="col-md-4" v-if="loadingContent">
                <div class="card">
                    <Shimmer :style="{'min-height': '30rem'}" />
                </div>
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
import Shimmer from "vue3-loading-shimmer"
import pageService from "@/service/page"
import accountService from "@/service/account"
export default {
    components: {
        Shimmer
    },
    mounted() {
        document.title = 'Change Password | ' + process.env.VUE_APP_TITLE
    },
    methods: {
        async pingConnection(){
            await pageService.ping().then(() => {
                setTimeout(() => { 
                    let auth = this.auth
                    if(!auth){
                        this.$router.push('/auth/login') 
                    }else{
                        this.loadContent()
                    }
                }, 2000)
            }).catch((error) => {
                console.log(error)
                this.$router.push('/unavailable') 
            })
        },
        async loadContent(){
            await accountService.profileDetail().then((response) => {
                setTimeout(() => { 
                    this.content = response.data
                    this.loadingContent = false
                }, 2000)
            }).catch((error) => {
                console.log(error)
                this.$router.push('/auth/login') 
            })
        }
    },
    beforeMount() {
        this.pingConnection();
    },
    data(){
        return {
            loadingContent: true,
            loadingSubmit: false,
            content: {},
            auth: localStorage.getItem("token") !== null
        }
    }
}
</script>