<template>
    <div class="container">
        <div class="form-login">
            <h1>Đăng nhập</h1>
            <div class="form-group form-setting">
                <label for="">Tên đăng nhập</label>
                <input
                    type="text"
                    name=""
                    id=""
                    class="form-control"
                    placeholder=""
                    aria-describedby="helpId"
                />
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
                />
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
                    type="button"
                    class="btn btn-primary"
                    data-toggle="button"
                    aria-pressed="false"
                    autocomplete="off"
                >
                    <route-link to="/register">Register</route-link>
                </button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    components: {
    },
    props: {},
    data() {
        return {};
    },
    created() {},
    methods: {},
    mounted() {},
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
    background-image: url('../../../../public/image/bglogin.jpg');
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
.form-setting {
    width: 50%;
    margin-left: 30%;
}
.form-setting label{
    color: white;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
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
