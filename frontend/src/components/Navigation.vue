<template>
    <div class="container px-5">
        <router-link to="/" class="navbar-brand">{{ site_title }}</router-link>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <router-link to="/" @click="setActive('home')"
                        :class="active === 'home' ? 'nav-link active' : 'nav-link'">Home</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/about" @click="setActive('about')"
                        :class="active === 'about' ? 'nav-link active' : 'nav-link'">About</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/portfolio" @click="setActive('portfolio')"
                        :class="active === 'portfolio' ? 'nav-link active' : 'nav-link'">Portfolio</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/article" @click="setActive('article')"
                        :class="active === 'article' ? 'nav-link active' : 'nav-link'">Article</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/faq" @click="setActive('faq')"
                        :class="active === 'faq' ? 'nav-link active' : 'nav-link'">FAQ</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/contact" @click="setActive('contact')"
                        :class="active === 'contact' ? 'nav-link active' : 'nav-link'">Contact</router-link>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
    export default {
        methods: {
            setActive: function (menu) {
                localStorage.setItem('active-menu', menu)
                this.active = menu
            }
        },
        data(){
            return {
                active: localStorage.getItem('active-menu') || 'home',
                site_title: process.env.VUE_APP_TITLE
            }
        }
    }
</script>