<template>
    <header>
        <MDBNavbar class="mb-3" light expand="lg" container>
            <!-- <MDBNavbarBrand href="/">Stat.kz</MDBNavbarBrand> -->
            <router-link class="link link-logo" to="/">Stat.kz</router-link>

            <MDBNavbarToggler
            target="#navbarNav"
            @click="collapse2 = !collapse2"
            ></MDBNavbarToggler>

            <MDBCollapse id="navbarNav" v-model="collapse2">
            <MDBNavbarNav>
                <router-link class="link" to="/">Home</router-link>
                <router-link class="link" to="/articles">Articles</router-link>
                <router-link class="link" to="/stat">Edit</router-link>
                <router-link class="link" to="/login">Log in</router-link>
                <!-- <MDBNavbarItem to="/" active> Home </MDBNavbarItem>
                <MDBNavbarItem to="#"> Stat'i </MDBNavbarItem>
                <MDBNavbarItem to="#"> Edit </MDBNavbarItem>
                <MDBNavbarItem to="#"> Log in </MDBNavbarItem> -->
            </MDBNavbarNav>
            </MDBCollapse>
    </MDBNavbar>
    </header>
</template>

<script>
  import {
    MDBNavbar,
    MDBNavbarToggler,
    MDBNavbarBrand,
    MDBNavbarNav,
    MDBNavbarItem,
    MDBCollapse,
  } from 'mdb-vue-ui-kit';
  import { ref } from 'vue';

  export default {
    components: {
      MDBNavbar,
      MDBNavbarToggler,
      MDBNavbarBrand,
      MDBNavbarNav,
      MDBNavbarItem,
      MDBCollapse,
    },
    setup() {
      const collapse2 = ref(false);
      return { collapse2 };
    },
  };
</script>
