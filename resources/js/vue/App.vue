<template>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <router-link class="text-white" to="home">Home </router-link>
    <ul class="navbar-nav">
        <li class="nav-item"><router-link class="text-white ml-2" to="login" v-if="$store.getters.getToken == 0">Login</router-link></li>
        <li class="nav-item"><router-link class="text-white ml-2" to="register" v-if="$store.getters.getToken == 0">Register</router-link></li>
        <li class="nav-item"><router-link class="text-white ml-2" to="dashboard" v-if="$store.getters.getToken != 0">Dashboard</router-link></li>
    </ul>
</nav>
<router-view></router-view>

</template>
<script>
import Home from "./components/Home.vue";

export default {

    // watch: {},
    // components: {
    // },
    // props: {},
    // data() {
    //     return {};
    // },
    // created() {},
    // methods: {
    //     async logout() {
    //         try {
    //             await axios.post('http://127.0.0.1:8000/api/logout');
    //             this.$router.push('login');
    //         } catch (error) {
    //             console.log(error);
    //         }

    //     }
    // },
    // mounted() {},
};
</script>
<style scoped></style>
<style lang="scss" scoped></style>
