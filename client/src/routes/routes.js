import BookingsList from '../components/BookingsList';
import AddBooking from '../components/AddBooking';
import EditBooking from '../components/EditBooking';
import UsersList from '../components/UsersList';
import UserRegistration from '../components/UserRegistration';
import { createRouter, createWebHistory } from 'vue-router';



const routes = [
    {
        name: 'BookingsList',
        path: '/',
        component: BookingsList
    },
    {
        name: 'AddBooking',
        path: '/add_booking',
        component: AddBooking
    },
    {
        name: 'EditBooking',
        path: '/booking/edit/:id?',
        component: EditBooking
    },
    {
        name: 'UsersList',
        path: '/users_list',
        component: UsersList
    },
    {
        name: 'UserRegistration',
        path: '/register',
        component: UserRegistration
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
})


export default router;