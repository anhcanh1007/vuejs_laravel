<template>

    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href=""><router-link to="/">Home</router-link></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=""><router-link to="/login">Login</router-link></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=""><router-link to="/register">Register</router-link></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <button type="submit" class="btn btn-primary" @click.prevent="logout">Logout</button>
    <router-view></router-view>
</template>
<script>

export default {
    watch: {},
    components: {
    },
    props: {},
    data() {
        return {};
    },
    created() {},
    methods: {
        async logout() {
            try {
                await axios.post('http://127.0.0.1:8000/api/logout');
                this.$router.push('login');
            } catch (error) {
                console.log(error);
            }

        }
    },
    mounted() {},
};
</script>
<style scoped></style>
<style lang="scss" scoped></style>
