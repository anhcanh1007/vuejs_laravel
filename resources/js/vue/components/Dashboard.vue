<template>
    <div class="row">
        <div class="container">
            <div class="dashbroad">
                <div class="info">
                    <h2>Welcome {{ user }}</h2>
                </div>
                <div class="actions">
                    <button type="" class="btn btn-dark mt-2" @click="logout">
                        Logout
                    </button>
                    <button
                        type=""
                        class="btn btn-dark mt-2 ml-2"
                        @click="naptien"
                    >
                        Nạp tiền
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useRouter } from "vue-router";
import { ref } from "vue";
import { useStore } from "vuex";

export default {
    setup() {
        let user = ref(null);
        const router = useRouter();
        const store = useStore();

        const logout = () => {
            store.dispatch("removeToken");
            router.push("login");
        };

        const naptien = () => {
            router.push("naptien");
        };

        axios.get("http://127.0.0.1:8000/api/user").then((res) => {
            user.value = res.data.name;
        });

        return { user, logout, naptien };
    },
};
</script>
<style scoped>
.container {
    min-width: 100%;
    height: 700px;
    background-image: url("../../../../public/image/a.png");
}
.dashbroad{
    display: block;
    float: right;
    margin-right: 10px;
}
.info h2{
color: #ffffff;
margin-top: 10px;
}
.actions{
    display: block;
    float: right;
}
.actions button {
    background-color: darkcyan;
}
.actions button:hover{
    background-color: darkgray;
    transition: 2s;
}
</style>
