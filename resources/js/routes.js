import Dashboard from "./components/Dashboard.vue";
//employee route
import createEmployee from "./components/employee/create.vue";
import listEmployee from "./components/employee/index.vue";
import editEmployee from "./components/employee/edit.vue";
//supplier route
import createSupplier from "./components/supplier/create.vue";
import listSupplier from "./components/supplier/index.vue";
import editSupplier from "./components/supplier/edit.vue";
//Category route
import createCategory from "./components/category/create.vue";
import listCategory from "./components/category/index.vue";
import editCategory from "./components/category/edit.vue";

import AppointmentsList from "./pages/appointments/appointmentsList.vue";
import UsersList from "./pages/userlist/usersList.vue";
import UserCreate from "./pages/userlist/createUser.vue";
import Settings from "./pages/setting/setting.vue";
import Profile from "./pages/profile/profile.vue";

export default [
    {
        path: "/admin/dashboard",
        name: "admin.dashboard",
        component: Dashboard,
    },
    {
        path: "/create-employe",
        name: "createEmployee",
        component: createEmployee,
    },
    {
        path: "/list-employee",
        name: "listEmployee",
        component: listEmployee,
    },
    {
        path: "/edit-employee/:id",
        name: "edit-employee",
        component: editEmployee,
    },

    {
        path: "/create-supplier",
        name: "createSupplier",
        component: createSupplier,
    },
    {
        path: "/list-supplier",
        name: "listSupplier",
        component: listSupplier,
    },
    {
        path: "/edit-supplier/:id",
        name: "edit-employee",
        component: editSupplier,
    },

    {
        path: "/create-category",
        name: "createCategory",
        component: createCategory,
    },
    {
        path: "/list-category",
        name: "listCategory",
        component: listCategory,
    },
    {
        path: "/edit-category/:id",
        name: "edit-category",
        component: editCategory,
    },



    {
        path: "/admin/appointments",
        name: "admin.appointments",
        component: AppointmentsList,
    },
    {
        path: "/admin/users",
        name: "admin.users",
        component: UsersList,
    },

    {
        path: "/admin/user-create",
        name: "admin.user-create",
        component: UserCreate,
    },
    {
        path: "/admin/setting",
        name: "admin.setting",
        component: Settings,
    },
    {
        path: "/admin/profile",
        name: "admin.profile",
        component: Profile,
    },
];
