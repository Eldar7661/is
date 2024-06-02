<template>
    <main class="mn-articles">
        <section class="article-mini" v-for="article in articles">
            <MDBCard text="center">
                <MDBCardHeader>{{ article.title }}</MDBCardHeader>

                <MDBCardBody>
                    <MDBCardText>{{ article.text }}</MDBCardText><MDBBtn color="secondary" rounded @click="moreDetalis(article.id)">More details</MDBBtn>
                </MDBCardBody>

            </MDBCard>
        </section>
    </main>
</template>

<script>
    import {
        MDBCard,
        MDBCardHeader,
        MDBCardBody,
        MDBCardTitle,
        MDBCardText,
        MDBBtn
    } from "mdb-vue-ui-kit";

    export default {
        components: {
            MDBCard,
            MDBCardHeader,
            MDBCardBody,
            MDBCardTitle,
            MDBCardText,
            MDBBtn
        },
        data() {
            return {
                articles: [],
            }
        },
        mounted() {
            axios.post('api/article/all')
            .then((data) => {
                this.articles = data.data;
            });
        },
        methods: {
            moreDetalis(id) {
                this.$router.push({ path: '/stat', query: { id: id } });
            }
        }
    }
</script>
