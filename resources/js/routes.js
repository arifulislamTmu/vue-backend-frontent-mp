import Dashboard from './components/Dashboard.vue';
import AppointmentsList from'./pages/appointments/appointmentsList.vue';
import UsersList from'./pages/userlist/usersList.vue';
import Settings from'./pages/setting/setting.vue';
import Profile from'./pages/profile/profile.vue';


export default[
    {
        path:'/admin/dashboard',
        name:'admin.dashboard',
        component: Dashboard,

    },
    {
        path:'/admin/appointments',
        name:'admin.appointments',
        component: AppointmentsList,
    },
    {
        path:'/admin/users',
        name:'admin.users',
        component: UsersList,
    },
    {
        path:'/admin/setting',
        name:'admin.setting',
        component: Settings,
    },
    {
        path:'/admin/profile',
        name:'admin.profile',
        component: Profile,
    }
]
