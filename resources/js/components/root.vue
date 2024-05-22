<template>
    <div class="wrapper">
        <HeaderComponent></HeaderComponent>
        <router-view></router-view>
    </div>
</template>

<script>

    import HeaderComponent from './header.vue';

    export default {
        components: {
            HeaderComponent: HeaderComponent,
        }
    }
</script>
