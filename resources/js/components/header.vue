<template>
    <header>
        <MDBNavbar class="mb-3" light expand="lg" container>
            <!-- <MDBNavbarBrand href="/">Stat.kz</MDBNavbarBrand> -->
            <router-link class="link link-logo" to="/">Stat.kz</router-link>

            <MDBCollapse id="navbarNav">
                <MDBNavbarNav>
                    <!-- <router-link class="link" to="/">Home</router-link>
                    <router-link class="link" to="/articles">Articles</router-link>
                    <router-link class="link" to="/edit">Edit</router-link>
                    <router-link class="link" to="/login">Log in</router-link> -->
                    <MDBBtn color="dark" rounded @click="to('/')"         >Home</MDBBtn>
                    <MDBBtn color="dark" rounded @click="to('/articles')" >Articles</MDBBtn>
                    <MDBBtn color="dark" rounded @click="to('/myarticles')" v-if="this.$parent.authenticated">My Articles</MDBBtn>
                    <MDBBtn color="dark" rounded @click="to('/me')"          v-if="this.$parent.authenticated">Me</MDBBtn>
                    <MDBBtn color="dark" rounded @click="to('/login')"       v-if="!this.$parent.authenticated">Log in</MDBBtn>
                    <MDBBtn color="dark" rounded @click="logout"             v-if="this.$parent.authenticated">Log out</MDBBtn>
                </MDBNavbarNav>
            </MDBCollapse>
        </MDBNavbar>
    </header>
</template>

<script>
    import {
        MDBNavbar, MDBNavbarToggler, MDBNavbarBrand,
        MDBNavbarNav, MDBNavbarItem, MDBCollapse, MDBBtn
    } from 'mdb-vue-ui-kit';

    export default {
        components: {
            MDBNavbar, MDBNavbarToggler, MDBNavbarBrand,
            MDBNavbarNav, MDBNavbarItem, MDBCollapse, MDBBtn
        },
        methods: {
            to(url) {
                this.$router.push({ path: url });
            },
            logout() {
                axiosAuth.post('api/auth/logout')
                .then(data => {
                    localStorage.clear('token');
                    this.$parent.refreshUser()
                    this.$router.push({ path: '/' });
                });
            }
        }
    };
</script>
