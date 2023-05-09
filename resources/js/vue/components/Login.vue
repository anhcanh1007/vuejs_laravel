<template>
    <div class="row">
        <div class="form-login">
            <div class="title">
                <h1>WELCOME! PLEASE LOGIN!</h1>
            </div>
            <form action="" @submit.prevent="login" class="form">
                <div class="form-group form-setting">
                    <label for="">Email</label>
                    <input
                        type="email"
                        name=""
                        id="email"
                        class="form-control"
                        placeholder=""
                        aria-describedby="helpId"
                        v-model="form.email"
                    />
                </div>
                <div class="form-group form-setting">
                    <label for="">Password</label>
                    <input
                        type="password"
                        name=""
                        id="password"
                        class="form-control"
                        placeholder=""
                        aria-describedby="helpId"
                        v-model="form.password"
                    />
                </div>
                <div class="form-group form-setting">
                    <button
                        type="submit"
                        class="btn btn-primary"
                        data-toggle="button"
                        aria-pressed="false"
                        autocomplete="off"
                    >
                        Login
                    </button>
                    <button
                        type="button"
                        class="btn btn-primary"
                        data-toggle="button"
                        aria-pressed="false"
                        autocomplete="off"
                    >
                        <route-link to="/register">Register</route-link>
                    </button>
                </div>
                <div class="form-setting">
                    <div class="errors" v-if="error">
                        <p>{{ error }}</p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import { ref } from "vue";
import { reactive } from "vue";
import { useRouter } from "vue-router";
import { useStore } from "vuex";
export default {
    setup() {
        const router = useRouter();
        const store = useStore();

        let form = reactive({
            email: "",
            password: "",
        });

        let error = ref("");

        const login = async () => {
            await axios
                .post("http://127.0.0.1:8000/api/login", form)
                .then((response) => {
                    if (response.data.success) {
                        store.dispatch("setToken", response.data.data.token);
                        router.push("dashboard");
                    } else {
                        error.value = response.data.message;
                        console.log(error);
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        };

        return { form, login, error };
    },
    // components: {},
    // props: {},
    // data() {
    //     return {
    //         email: '',
    //         password: '',
    //         errors: ref({}),
    //         error: ''
    //     };
    // },
    // created() {},
    // methods: {
    //     login() {
    //         axios.post('http://127.0.0.1:8000/api/login',{
    //             email: this.email,
    //             password: this.password
    //         })
    //             .then((response) => {
    //                 console.log(response)
    //                 this.$router.push('home')
    //             })
    //             .catch(error => {
    //                 if(error.response && error.response.status === 422){
    //                     this.errors = error.response.data.error;
    //                     console.log(this.errors)
    //                 }
    //             })

    //     },
    // },
    // mounted() {
    // },
};
</script>
<style scoped>
.title {
    text-align: center;
    margin-top: 50px;
    margin-bottom: 50px;
}
.title h1 {
    color: #ffffff;
    font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande",
        "Lucida Sans", Arial, sans-serif;
    text-shadow: 0 0 6px darkgoldenrod;
}
.form {
    width: 90%;
}
.form-login {
    min-width: 100%;
    height: 700px;
    background-image: url("../../../../public/image/CSS-Particles.gif");
}

.form-setting .errors {
    height: 30px;
    background-color: cadetblue;
    border-radius: 10px;
}
p{
    padding-left: 10px;
    font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande",
        "Lucida Sans", Arial, sans-serif;
        color: red;
        padding-top: 2px;
}
.form-setting {
    width: 50%;
    margin-left: 30%;
}
.form-setting label {
    color: #ffffff;
    text-shadow: 0 0 6px orange;
    font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande",
        "Lucida Sans", Arial, sans-serif;
    font-size: 20px;
    margin-left: 20px;
    text-align: center;
}
.form-setting button {
    background-color: darkolivegreen;
    margin-bottom: 20px;
    margin-right: 10px;
}
.form-setting button:hover {
    background-color: bisque;
    transition: 2s;
}

</style>
<style lang="scss" scoped></style>
