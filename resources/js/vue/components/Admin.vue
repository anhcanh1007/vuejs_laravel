<template>
    <div class="container">
        <h1>Đây là trang quản trị admin</h1>
        <!-- <table class="table table-requets">
            <thead>
                <tr>
                    <th>Thông báo nạp tiền</th>
                    <th>Thông báo rút tiền</th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>ID User</th>
                    <th>Họ tên người nạp</th>
                    <th>Mã giao dịch</th>
                    <th>Số tiền nạp</th>
                    <th>Trạng thái</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="tran in transactions">
                    <td scope="row">{{ tran.id }}</td>
                    <td scope="row">{{ tran.id_user }}</td>
                    <td scope="row">{{ tran.fullname }}</td>
                    <td scope="row">{{ tran.id_transaction }}</td>
                    <td scope="row">{{ tran.deposit_amount }}</td>
                    <td scope="row" class="status"><i>{{ tran.status ? 'Chờ xử lý' : '' }}</i></td>
                    <td>
                        <button type="button" class="btn btn-primary btn-success">
                            Duyệt
                        </button>
                    </td>
                </tr>
            </tbody>
        </table> -->
        <!-- <div class="icon">
            <button type="button" data-toggle="modal" data-target="notify"><ion-icon name="notifications-outline" class="notify"></ion-icon></button>
            <p>1</p>
        </div>

        <div class="modal" tabindex="-1" id="notify" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">
                            Save changes
                        </button>
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Button trigger modal -->

    </div>
</template>
<script>
import { ref } from "vue";
export default {
    setup() {
        const transactions = ref();
        axios
            .get("http://127.0.0.1:8000/api/transaction-new-request")
            .then((res) => {
                console.log(res);
                transactions.value = res.data;
            })
            .catch((e) => {
                console.log(e);
            });

        return { transactions };
    },
};
</script>
<style scoped>
.table-requets {
    background-color: #333;
    color: #ffff;
}
.status i {
    color: goldenrod;
    font-weight: bold;
}
.notify {
    font-size: 29px;
}
.icon {
    position: relative;
    float: right;
}
.icon p {
    position: absolute;
    margin-top: -40px;
    margin-left: 20px;
    color: red;
}
</style>
<style lang="scss" scoped></style>
