import App from '../App.vue';
import Login from '../components/Login.vue';
import NotFound from '../components/NotFound.vue';
const client = [
    {
        path: "/home",
        component: App,
        name: 'home'
    },
    {
        path: "/login",
        component: Login,
        name: 'login'
    },
    {
        path: '/register',
        component: () => import('../components/Register.vue'),
        name: 'register'
    },
    {
        path: '/:pathMatch(.*)*',
        component: NotFound
    }
]
export default client;

