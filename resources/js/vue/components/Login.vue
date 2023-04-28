<template>
    <div class="container">
        <div class="form-login">
            <div class="errors"  >
                        <i>{{ form }}</i>
                    </div>
            <form action="" @submit.prevent="login">
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
                    <label for="">Mật khẩu</label>
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
                    <div class="errors" v-if="error" >
                        <p class="text-danger">{{ error }}</p>
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
            email: '',
            password: '',
        });

        let error = ref('');

        const login = async() => {
            await axios
                .post("http://127.0.0.1:8000/api/login", form)
                .then((response) => {
                    if(response.data.success){
                        store.dispatch('setToken', response.data.data.token)
                        router.push('dashboard')
                    }else{
                        error.value = response.data.message;
                    }

                })
        };

        return { form,login, error  };
    }
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
.form {
    width: 500px;
    height: 100px;
    background-color: blueviolet;
}
.form h1 {
    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
        "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
    padding: 20px 50px;
}
.form-login {
    margin-top: 50px;
    background-image: url("../../../../public/image/bglogin.jpg");
    background-color: antiquewhite;
    box-shadow: 0 0 5px blue;
    border-radius: 10px;
}
.form-login h1 {
    padding-top: 20px;
    text-align: center;
    color: white;
    margin-bottom: 40px;
}
.form-setting .errors{
    height: 30px;
    background-color: bisque;
}
.form-setting i {
    color: red;
    font-family: 'Courier New', Courier, monospace;
    font-weight: bold;
}
.form-setting {
    width: 50%;
    margin-left: 30%;
}
.form-setting label {
    color: white;
    font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
    font-size: 20px;
    margin-left: 20px;
    text-align: center;
}
.form-setting button {
    margin-bottom: 20px;
    margin-right: 10px;
}
</style>
<style lang="scss" scoped></style>
