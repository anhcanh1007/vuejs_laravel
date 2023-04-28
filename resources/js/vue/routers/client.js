import App from '../App.vue';
import Login from '../components/Login.vue';
import NotFound from '../components/NotFound.vue';
import Home from '../components/Home.vue';
const client = [
    {
        path: "/home",
        component: Home,
        name: 'home'
    },
    {
        path: "/login",
        component: Login,
        name: 'login',
        meta: {
            requiresAuth: false,
        }
    },
    {
        path: '/register',
        component: () => import('../components/Register.vue'),
        name: 'register',
        meta: {
            requiresAuth: false,
        }
    },
    {
        path: '/naptien',
        component: () => import('../components/NapTien.vue'),
        name: 'naptien',
    },
    {
        path: '/dashboard',
        component: () => import('../components/Dashboard.vue'),
        name: 'dashboard',
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/:pathMatch(.*)*',
        component: NotFound
    }
]
export default client;

