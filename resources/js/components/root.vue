<template>
    <div class="wrapper">
        <HeaderComponent></HeaderComponent>
        <router-view></router-view>
    </div>
</template>

<script>
    import HeaderComponent from './header.vue';

    export default {
        name: 'root',
        components: {
            HeaderComponent: HeaderComponent,
        },
        data() {
            return {
                authenticated: false,
                user: {},
            }
        },
        mounted() {
            this.refreshUser();
        },
        methods: {
            refreshUser() {
                axiosAuth.post('api/auth/me')
                .then( data => {
                    if (data.status == 200) {
                        this.user = data.data;
                        this.authenticated = true;
                    }
                    else if (data.response.status == 401) {
                        this.authenticated = false;
                        this.user = {};
                    }
                });
            }
        }
    }

    document.querySelector('body').style.backgroundColor = "black";
</script>
