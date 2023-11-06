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

//Product route
import createProduct from "./components/product/create.vue";
import listProduct from "./components/product/index.vue";
import editProduct from "./components/product/edit.vue";
//expanse route
import createExpanse from "./components/expanse/create.vue";
import listExpanse from "./components/expanse/index.vue";
import editExpanse from "./components/expanse/edit.vue";

//salary route
import AllSalary from "./components/salary/all-salary.vue";
import listSalary from "./components/salary/index.vue";
import editSalary from "./components/salary/edit.vue";
import paySalaryDetails from "./components/salary/pay-salary-details.vue";
import salaryEdit from "./components/salary/paySalaryEdit.vue";

import AppointmentsList from "./pages/appointments/appointmentsList.vue";

import Settings from "./pages/setting/setting.vue";
import Profile from "./pages/profile/profile.vue";

export default [
    {
        path: "/admin/dashboard",
        name: "admin.dashboard",
        component: Dashboard,
    },
    {
        path: "/salary-edit/:id",
        name: "salary-edit",
        component: salaryEdit,
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
        name: "edit-supplier",
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
        path: "/create-product",
        name: "createProduct",
        component: createProduct,
    },
    {
        path: "/list-product",
        name: "listProduct",
        component: listProduct,
    },
    {
        path: "/edit-product/:id",
        name: "edit-product",
        component: editProduct,
    },


    {
        path: "/create-expanse",
        name: "createExpanse",
        component: createExpanse,
    },
    {
        path: "/list-expanse",
        name: "listExpanse",
        component: listExpanse,
    },
    {
        path: "/edit-expanse/:id",
        name: "edit-expanse",
        component: editExpanse,
    },


    {
        path: "/all-salary",
        name: "allSalary",
        component: AllSalary,
    },
    {
        path: "/list-salary",
        name: "listSalary",
        component: listSalary,
    },
    {
        path: "/pay-salary/:id",
        name: "pay-salary",
        component: editSalary,
    },
    {
        path: "/pay-salary-details/:id",
        name: "pay-salary-details",
        component: paySalaryDetails,
    },


    {
        path: "/admin/appointments",
        name: "admin.appointments",
        component: AppointmentsList,
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
