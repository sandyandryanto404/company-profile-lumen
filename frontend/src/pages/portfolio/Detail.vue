<template>
    <!-- Page Content-->
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6" v-if="loading">
                    <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                    <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                    <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                    <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                    <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                </div>
                <div class="col-lg-6" v-else>
                    <div class="text-center mb-5">
                        <h1 class="fw-bolder">Project Title</h1>
                        <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Ab similique, ducimus ut alias sit accusamus illum, asperiores deserunt dolorum
                            quaerat qui! Ab, quisquam explicabo magni dolores unde beatae quam a.</p>
                    </div>
                </div>
            </div>
            <div class="row gx-5">
                <template v-if="loading">
                    <div class="col-12 mt-5">
                        <Shimmer class="mb-5" :style="{'min-height': '700px', 'border-radius': '1%'}" />
                    </div>
                    <div class="col-6">
                        <Shimmer class="mb-5" :style="{'min-height': '400px', 'border-radius': '1%'}" />
                    </div>
                     <div class="col-6">    
                        <Shimmer class="mb-5" :style="{'min-height': '400px', 'border-radius': '1%'}" />
                    </div>
                </template>
                <template v-else>
                    <div class="col-12"><img class="img-fluid rounded-3 mb-5"
                            src="https://dummyimage.com/1300x700/343a40/6c757d" alt="..." /></div>
                    <div class="col-lg-6"><img class="img-fluid rounded-3 mb-5"
                            src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." /></div>
                    <div class="col-lg-6"><img class="img-fluid rounded-3 mb-5"
                            src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." /></div>
                </template>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center mb-5">
                       <template v-if="loading">
                            <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                            <Shimmer class="mt-1" :style="{'min-height': '1rem'}" />
                            </template>
                       <template v-else>
                            <p class="lead fw-normal text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Totam deserunt architecto enim eos accusantium fugit recusandae illo iste dignissimos
                            possimus facere ducimus odit voluptatibus exercitationem, ex laudantium illum voluptatum
                            corporis.</p>
                       </template>
                    </div>
                    <div class="clearfix">
                         <router-link :to="{ name: 'portfolioList' }" class="text-decoration-none float-start">
                         <i class="bi-arrow-left"></i>
                          Back To List
                        </router-link>
                        <a class="text-decoration-none float-end" href="#!">
                            View project
                            <i class="bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    import Shimmer from "vue3-loading-shimmer"
    import pageService from "@/service/page"
    import portfolioService from "@/service/portfolio"
    export default {
        components:{
            Shimmer
        },
        mounted() {
            document.title = 'Portfolio Details| ' + process.env.VUE_APP_TITLE
        },
        methods: {
            async pingConnection(){
                await pageService.ping().then(() => {
                    setTimeout(() => { 
                        this.loadContent()
                    }, 1500)
                }).catch((error) => {
                    console.log(error)
                    this.$router.push('/unavailable') 
                })
            },
            async loadContent(){
               try{
                    let { data } =  await portfolioService.detail(this.$route.params.id)
                    setTimeout(() => {
                        this.content = data
                        this.loading = false
                    }, 2000)
               }catch(e){
                    console.log(e)
               }
            }
        },
        beforeMount() {
            this.pingConnection();
        },
        data() {
            return {
                loading: true,
                content: {}
            }
        }
    }
</script>