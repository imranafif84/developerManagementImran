import Home from './components/Home.vue';
import Add from './components/Add.vue';
import Update from './components/Update.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/home',
        component: Home
    },
    {
        name: 'add',
        path: '/add',
        component: Add
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: Update
    }
];