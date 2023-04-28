<template>
    <div class="container mt-30">
        <h2>Dashboard: {{ user }}</h2>
        <button type="" class="btn btn-dark mt-2" @click="logout">Logout</button>
        <button type="" class="btn btn-dark mt-2 ml-2" @click="naptien">Nạp tiền</button>
    </div>
</template>

<script>
import { useRouter } from 'vue-router';
import { ref } from 'vue'
import { useStore } from 'vuex'

    export default {
        setup() {
            let user = ref(null);
            const router = useRouter();
            const store = useStore();

            const logout = () => {
                store.dispatch('removeToken')
                router.push('login')
            }

            const naptien = () => {
                router.push('naptien')
            }

            axios.get('http://127.0.0.1:8000/api/user')
                .then(res => {
                    user.value = res.data.name
                })

                return {user, logout, naptien};
        }
    }
</script>
