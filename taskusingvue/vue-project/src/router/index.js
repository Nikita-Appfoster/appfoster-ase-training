import { createRouter, createWebHistory } from 'vue-router';
import Index from '../components/Index.vue'; 
import SignUp from '../components/SignUp.vue';
import Login from '../components/Login.vue';
import Add from '../components/Add.vue';
import Update from '../components/Update.vue';

const routes = [
    {
        name: 'Index',
        component: Index,
        path: '/'
    },
    {
        name: 'SignUp',
        component: SignUp,
        path: '/sign-up'
    },
    {
        name: 'Login',
        component: Login,
        path: '/login'
    },
    {
        name: 'Add',
        component: Add,
        path: '/add'
    },
    {
        name: 'Update',
        component: Update,
        path: '/update/:id'
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
