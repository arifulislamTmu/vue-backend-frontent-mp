import Dashboard from './components/Dashboard.vue';
import AppointmentsList from'./pages/appointments/appointmentsList.vue';


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
    }
]
