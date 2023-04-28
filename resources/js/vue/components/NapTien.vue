<template>
    <div class="container">
        <div class="title">
            <h1>Xin chào: Đây là trang nạp tiền</h1>
        </div>
        <div class="payments">
            <div class="payment-btn">
                <button class="btn-checkout-payment">MoMo</button>
                <button class="btn-checkout-payment" @click.prevent="getBank">
                    ATM
                </button>
            </div>
        </div>

        <div class="banks" id="listBank">
            <ul>
                <li
                    v-for="bank in banks"
                    :key="bank.id"
                    @click="getAccountByBankId(bank.id)"
                >
                    {{ bank.name }}
                </li>
            </ul>
        </div>
        <div class="account-info">
            <table class="table table-light" v-if="account">
                <thead class="thead-light">
                    <tr>
                        <th>Tên tài khoản</th>
                        <th>{{ account.name }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Số tài khoản</td>
                        <td>{{ account.account_number }}</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Chi nhánh</th>
                        <th>{{ account.branch }}</th>
                    </tr>
                </tfoot>
            </table>
            <div>
                <h1>Phiếu nạp tiền</h1>
                <form class="form-group" @submit.prevent="napTien">
                    <input
                        type="number"
                        placeholder="Số tiền đã chuyển"
                        class="form-control mb-2"
                        v-model="form.deposit_amount"
                    />
                    <i v-if="errors.deposit_amount" class="errors">{{
                        errors.deposit_amount[0]
                    }}</i>
                    <input
                        type="text"
                        placeholder="Họ và tên người đã chuyển"
                        class="form-control mb-2"
                        v-model="form.fullname"
                    />
                    <input
                        type="text"
                        placeholder="Mã giao dịch"
                        class="form-control mb-2"
                        v-model="form.id_transaction"
                    />
                    <input
                        type="hidden"
                        placeholder="Mã giao dịch"
                        class="form-control mb-2"
                        v-model="form.payment"
                    />
                    <button class="btn btn-default btn-success" type="submit">
                        Tạo phiếu nạp
                    </button>
                </form>
            </div>
            <div class="table table-light">
                <h1>Thông tin nạp tiền</h1>
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Họ tên</th>
                        <th>Số tiền đã nạp</th>
                        <th>Ngày nạp</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    </tr>
                </tbody>
            </div>
        </div>
    </div>
</template>
<script>
import { ref } from "vue";
import { useRouter } from "vue-router";

export default {
    setup() {
        const router = useRouter();
        let banks = ref([]);
        let errors = ref([]);
        let account = ref(null);
        const form = ref({
            deposit_amount: "",
            fullname: "",
            id_transaction: "",
            payment: "InternetBanking",
        });

        const getBank = async () => {
            try {
                const response = await axios.get(
                    "http://127.0.0.1:8000/api/banks"
                );
                banks.value = response.data;
            } catch (e) {
                console.log(e);
            }
        };

        const getAccountByBankId = async (bankId) => {
            try {
                await axios
                    .get(`http://127.0.0.1:8000/api/getaccount/${bankId}`)
                    .then((result) => {
                        account.value = result.data;
                        console.log(result.data);
                    })
                    .catch((err) => {
                        // console.log(err.response.data.errors);
                        errors.value = err.response.data.errors;
                    });
            } catch (e) {
                console.log(e);
                errors.value = e.response.data.errors;
            }
        };

        const napTien = async () => {
            try {
                await axios
                    .post("http://127.0.0.1:8000/api/transactions", form.value)
                    .then((res) => {
                        alert(
                            "Yêu cầu nạp tiền thành công! Vui lòng chờ xử lí!"
                        );
                        router.push("dashboard");
                    })
                    .catch((e) => {
                        errors.value = e.response.data.errors;
                        console.log(e);
                    });
            } catch (e) {
                console.log(e);
            }
        };

        return {
            banks,
            getAccountByBankId,
            getBank,
            account,
            napTien,
            form,
            errors,
        };
    },
};
</script>
<style scoped>
.payments {
    height: 50px;
    width: 100%;
    background-color: darkblue;
    border-radius: 10px;
}

.payments .payment-btn {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    padding-top: 10px;
    padding-bottom: 5px;
}

.btn-checkout-payment {
    width: 150px;
    height: auto;
    background-color: bisque;
    color: black;
    font-size: 18px;
    font-weight: bold;
    font-variant: normal;
    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
        "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
    box-shadow: 0 0 10px darkcyan;
    border-radius: 5px;
}

.btn-checkout-payment:hover {
    background-color: chocolate;
    transition: 2s;
    cursor: pointer;
    color: darkgreen;
    border-radius: 10px;
}

.banks {
    height: auto;
    width: auto;
    margin-top: 20px;
    text-align: center;
    float: center;
}
.banks ul {
    background-color: cadetblue;
    border-radius: 10px;
    padding: 10px 10px;
}
.banks ul li {
    list-style-type: none;
    height: 30px;
    font-size: 18px;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
}
.banks ul li:hover {
    color: bisque;
    cursor: pointer;
}
.errors {
    height: 30px;
    background-color: cadetblue;
    margin-bottom: 10px;
}
i {
    color: red;
    font-weight: bold;
    padding: 5px 5px 5px 5px;
    margin-bottom: 10px;
}
</style>
