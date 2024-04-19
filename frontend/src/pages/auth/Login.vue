<template>
    <div class="container py-5">
        <div class="row h-100 justify-content-center align-items-center mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center bg-primary text-white">
                        <h4 class="p-2">
                            <i class="bi bi-lock me-1"></i> Sign In
                        </h4>
                    </div>
                    <div class="card-body">
                        <h1 class="text-center mb-2 auth-icon text-primary"><i class="bi bi-person-circle"></i></h1>
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
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" />
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-key"></i>
                                </span>
                            </div>
                            <div class="clearfix">
                                <div class="float-start">
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" name="remember" id="remember" class="form-check-input" />
                                        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                                    </div>
                                </div>
                                <div class="float-end">
                                    <router-link class="text-decoration-none" to="/auth/email/forgot" v-tooltip="'Forgot Password service that allows the user to request a password reset.'">
                                        <i class="bi bi-key me-2" ></i>Forgot password ?
                                    </router-link>
                                </div>
                            </div>
                            <button type="submit"  class="btn btn-primary w-100" v-tooltip="'Users enter their email and password in the designated fields to access their accounts'">
                                <i class="bi bi-arrow-right me-1"></i> Sign In
                            </button>
                            <div class="mt-3 text-center">
                                <router-link class="text-decoration-none" to="/auth/register" v-tooltip="'The process of registering for a new user account on a website.'">
                                    <i class="bi bi-pencil-square me-1"></i>Don't have an account ? <strong>Register Here</strong>
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
    export default {
        mounted() {
            document.title = 'Sign In | ' + process.env.VUE_APP_TITLE
        },
    }
</script>