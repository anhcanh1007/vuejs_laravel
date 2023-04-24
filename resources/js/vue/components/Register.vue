<template>
    <div class="container">
        <div class="form-login">
            <h1>Đăng kí</h1>
            <form action="" @submit.prevent="register">
                <div class="form-group form-setting">
                    <label for="">Email</label>
                    <input
                        type="email"
                        name=""
                        id=""
                        class="form-control"
                        placeholder=""
                        aria-describedby="helpId"
                        v-model="user.email"
                    />
                    <div class="errors" v-if="errors.email">
                        <i>{{ errors.email[0] }}</i>
                    </div>
                </div>
                <div class="form-group form-setting">
                    <label for="">Tên đăng nhập</label>
                    <input
                        type="text"
                        name=""
                        id=""
                        class="form-control"
                        placeholder=""
                        aria-describedby="helpId"
                        v-model="user.name"
                    />
                    <div class="errors" v-if="errors.name">
                        <i>{{ errors.name[0] }}</i>
                    </div>
                </div>
                <div class="form-group form-setting">
                    <label for="">Mật khẩu</label>
                    <input
                        type="password"
                        name=""
                        id=""
                        class="form-control"
                        placeholder=""
                        aria-describedby="helpId"
                        v-model="user.password"
                    />
                    <div class="errors" v-if="errors.password">
                        <i>{{ errors.password[0] }}</i>
                    </div>
                </div>
                <div class="form-group form-setting">
                    <label for="">Xác nhận mật khẩu</label>
                    <input
                        type="password"
                        name=""
                        id=""
                        class="form-control"
                        placeholder=""
                        aria-describedby="helpId"
                        v-model="user.c_password"
                    />
                    <div class="errors" v-if="errors.c_password">
                        <i>{{ errors.c_password[0] }}</i>
                    </div>
                </div>
                <div class="form-group form-setting">
                    <button
                        type="button"
                        class="btn btn-primary"
                        data-toggle="button"
                        aria-pressed="false"
                        autocomplete="off"
                    >
                        Login
                    </button>
                    <button
                        type="submit"
                        class="btn btn-primary"
                        data-toggle="button"
                        aria-pressed="false"
                        autocomplete="off"
                    >
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
export default {
    // components: {},
    // props: {},
    // data() {
    //     return {
    //         result: {},
    //         errors: ref({}),
    //         user: ref({
    //             email: '',
    //             name: '',
    //             password: '',
    //             c_password: '',
    //         })
    //     };
    // },
    // created() {},
    // methods: {
    //     register() {
    //         axios.post('http://127.0.0.1:8000/api/register', this.user)
    //             .then(
    //                 (data) => {
    //                     this.$router.push('login')
    //                 }
    //             )
    //             .catch(error => {
    //                 console.log(error);
    //                 if(error.response.status === 422){
    //                     // console.log(error.response.data.errors)
    //                     this.errors.value = error.response.data.errors;
    //                     console.log(this.errors.value)
    //                 }
    //             });

    //     }
    // },
    // mounted() {},
    setup() {
        const router = useRouter();
        const user = ref({
            email: '',
            name: '',
            password: '',
            c_password: '',
        });

        const errors = ref({});

        const  register = () => {
            axios.post('http://127.0.0.1:8000/api/register', user.value)
                .then(response => {
                    console.log(response);
                    if(response.status === 201){
                       router.push('login')
                    }
                })
                .catch(error => {
                    console.log(error);
                    if(error.response && error.response.status === 422){
                        console.log(error.response.data.errors)
                        errors.value = error.response.data.errors;
                        console.log(errors.value)
                    } else {
                        console.log(error)
                    }
                });
        };
        return {  user, errors, register }
    },
}
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
.form-setting .errors {
    height: 30px;
    background-color: aliceblue;
    margin-top: 5px;
}
.form-setting i {
    color: red;
    padding-left: 10px;
    font-weight: bold;
}
.form-login {
    margin-top: 50px;
    background-color: antiquewhite;
    background-image: url("../../../../public/image/bglogin.jpg");
    box-shadow: 0 0 5px blue;
    border-radius: 10px;
}
.form-login h1 {
    padding-top: 20px;
    text-align: center;
    color: white;
    margin-bottom: 40px;
}
.form-setting {
    width: 50%;
    margin-left: 30%;
}
.form-setting p {
    color: red;
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
