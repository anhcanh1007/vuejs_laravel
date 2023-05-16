import App from '../App.vue';
import Login from '../components/Login.vue';
import NotFound from '../components/NotFound.vue';
const client = [
    {
        path: "/home",
        component: App,
    },
    {
        path: "/login",
        component: Login,
    },
    {
        path: '/register',
        component: () => import('../components/Register.vue')
    },
    {
        path: '/:pathMatch(.*)*',
        component: NotFound
    }
]
export default client;

