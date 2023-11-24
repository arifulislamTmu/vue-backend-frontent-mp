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

// Point of sale
import PointOfSale from "./components/pos/point-of-sale.vue";

//customer list
import customerList from "./components/customer/customerList.vue";

//Order details list
import todayOrder from "./components/orders/todayOrder.vue";
import orderList from "./components/orders/orderList.vue";
import orderDetails from "./components/orders/orderDetails.vue";

//login

import Login from "./components/login/login.vue";



import AppointmentsList from "./pages/appointments/appointmentsList.vue";

import Settings from "./pages/setting/setting.vue";
import Profile from "./pages/profile/profile.vue";

export default [

    {
        path: "/",
        name: "Login",
        component: Login,
    },
    {
        path: "/admin/dashboard",
        name: "admin.dashboard",
        component: Dashboard,
        meta: {   requiresAuth: true }
    },
    {
        path: "/salary-edit/:id",
        name: "salary-edit",
        component: salaryEdit,
        meta: {   requiresAuth: true }
    },

    {
        path: "/today-order",
        name: "todayOrder",
        component: todayOrder,
        meta: {   requiresAuth: true }
    },
    {
        path: "/order-details/:id",
        name: "orderDetails",
        component: orderDetails,
        meta: {   requiresAuth: true }
    },

    {
        path: "/order-list",
        name: "orderList",
        component: orderList,
        meta: {   requiresAuth: true }
    },



    {
        path: "/create-employe",
        name: "createEmployee",
        component: createEmployee,
        meta: {   requiresAuth: true }
    },
    {
        path: "/list-employee",
        name: "listEmployee",
        component: listEmployee,
        meta: {   requiresAuth: true }
    },
    {
        path: "/edit-employee/:id",
        name: "edit-employee",
        component: editEmployee,
        meta: {   requiresAuth: true }
    },

    {
        path: "/create-supplier",
        name: "createSupplier",
        component: createSupplier,
        meta: {   requiresAuth: true }
    },
    {
        path: "/list-supplier",
        name: "listSupplier",
        component: listSupplier,
        meta: {   requiresAuth: true }
    },
    {
        path: "/edit-supplier/:id",
        name: "edit-supplier",
        component: editSupplier,
        meta: {   requiresAuth: true }
    },

    {
        path: "/create-category",
        name: "createCategory",
        component: createCategory,
        meta: {   requiresAuth: true }
    },
    {
        path: "/list-category",
        name: "listCategory",
        component: listCategory,
        meta: {   requiresAuth: true }
    },
    {
        path: "/edit-category/:id",
        name: "edit-category",
        component: editCategory,
        meta: {   requiresAuth: true }
    },

    {
        path: "/create-product",
        name: "createProduct",
        component: createProduct,
        meta: {   requiresAuth: true }
    },
    {
        path: "/list-product",
        name: "listProduct",
        component: listProduct,
        meta: {   requiresAuth: true }
    },
    {
        path: "/edit-product/:id",
        name: "edit-product",
        component: editProduct,
        meta: {   requiresAuth: true }
    },


    {
        path: "/create-expanse",
        name: "createExpanse",
        component: createExpanse,
        meta: {   requiresAuth: true }
    },
    {
        path: "/list-expanse",
        name: "listExpanse",
        component: listExpanse,
        meta: {   requiresAuth: true }
    },
    {
        path: "/edit-expanse/:id",
        name: "edit-expanse",
        component: editExpanse,
        meta: {   requiresAuth: true }
    },
    {
        path: "/all-salary",
        name: "allSalary",
        component: AllSalary,
        meta: {   requiresAuth: true }
    },
    {
        path: "/list-salary",
        name: "listSalary",
        component: listSalary,
        meta: {   requiresAuth: true }
    },
    {
        path: "/pay-salary/:id",
        name: "pay-salary",
        component: editSalary,
        meta: {   requiresAuth: true }
    },
    {
        path: "/pay-salary-details/:id",
        name: "pay-salary-details",
        component: paySalaryDetails,
        meta: {   requiresAuth: true }
    },

    {
        path: "/point-of-sale",
        name: "point-of-sale",
        component: PointOfSale,
        meta: {   requiresAuth: true }
    },
    {
        path: "/customer-list",
        name: "customer-list",
        component: customerList,
        meta: {   requiresAuth: true }
    },
    {
        path: "/admin/appointments",
        name: "admin.appointments",
        component: AppointmentsList,
        meta: {   requiresAuth: true }
    }


];
