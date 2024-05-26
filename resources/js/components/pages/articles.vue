<template>
    <main class="mn-articles">
        <section class="article-mini" v-for="i in 10">
            <MDBCard text="center">
                <MDBCardHeader>Title</MDBCardHeader>

                <MDBCardBody>
                <!-- <MDBCardTitle>Special title treatment</MDBCardTitle> -->
                <MDBCardText>
                    With supporting text below as a natural lead-in to additional content.
                    With supporting text below as a natural lead-in to additional content.
                </MDBCardText>
                <!-- <MDBBtn tag="a" href="#!" color="primary">More details</MDBBtn> -->
                <!-- <MDBBtn outline="dark" rounded>More details</MDBBtn> -->
                <router-link class="link" to="/">More details</router-link>
            </MDBCardBody>

            <!-- <MDBCardFooter class="text-muted">2 days ago</MDBCardFooter> -->
            </MDBCard>
        </section>
    </main>
</template>

<script setup lang="ts">
    import {
        MDBCard,
        MDBCardHeader,
        MDBCardBody,
        MDBCardTitle,
        MDBCardText,
        MDBBtn
    } from "mdb-vue-ui-kit";
</script>
