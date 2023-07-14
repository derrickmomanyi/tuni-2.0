import { createRouter, createWebHashHistory} from 'vue-router'
import Home from '../components/Home.vue'
import Login from '../components/Login.vue'
import Register from '../components/Register.vue'
import AddGame from '../components/AddGame.vue'
import ForgotPassword from '../components/ForgotPassword.vue'
import ResetPassword from '../components/ResetPassword.vue'
const routes = [ 
    {
        path: '/',
        name: 'Home',
        component: Home, 
        meta: {requiresAuth: true} 
    },
    {
        path: '/login',
        name: 'Login',
        component: Login, 
        meta: {guest: true}
    },
    {
        path: '/register',
        name: 'Register',
        component: Register,
        meta: {guest: true}
    },
    {
        path: '/addgame',
        name: 'AddGame',
        component: AddGame,
        meta: {requiresAuth: true}
    },
    {
        path: '/forgotpassword',
        name: 'ForgotPassword',
        component: ForgotPassword,
        meta: {guest: true}
    },
    {
        path: '/reset_password',
        name: 'reset-password',
        component: ResetPassword,
        meta: {guest: true}
    }
]


const router = createRouter({
    history: createWebHashHistory(),
    routes
  })
  
  export default router