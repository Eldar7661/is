<template>
    <main class="mn-stat">
        <h1>{{ article.title }}</h1>
        <hr>
        <div class="content">{{ article.text }}</div>
        <div class="link-conteiner">
            <router-link class="link" to="/articles">Back to articles</router-link>
        </div>
    </main>
</template>

<script>

    export default {
        data() {
            return {
                currentId: this.$route.query.id,
                article: [],
            }
        },
        mounted() {
            axios.post('api/article/find', {id: this.currentId})
            .then((data)=> {
                this.article = data.data;
            })
            .catch((data)=> {
                this.article.title = data.response.data.message;
            })
        }
    }
</script>
