import './bootstrap';
import { createApp } from 'vue';
import App from '../js/components/App.vue'
import router from './router';



function loggedIn(){
    return localStorage.getItem('token')

}


router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        if (!loggedIn()) {
            next({
            path: '/login',
            query: { redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else if(to.matched.some(record => record.meta.guest)) {
        if (loggedIn()) {
            next({
            path: '/',
            query: { redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else {
        next() // make sure to always call next()!
    }
})

createApp(App).use(router).mount('#app')
