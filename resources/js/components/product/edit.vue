<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <router-link to="/admin/dashboard">Home</router-link>
                        </li>
                        <li class="breadcrumb-item active">Update Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <router-link to="/admin/dashboard" class="btn btn-primary mb-2">Back</router-link>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">Update Product</h4>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="updateProduct" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="">Product Name</label>
                                            <input type="text" class="form-control" v-model="form.name" />
                                            <small class="text-danger" v-if="errors.name">{{
                                                errors.name[0]
                                            }}</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="">Category Name</label>
                                            <select class="form-control" v-model="form.category_id">
                                                <option :value="category.id" v-for="category in categories"> {{
                                                    category.category_name }}</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="">Supplier Name</label>
                                            <select class="form-control" v-model="form.supplier_id">
                                                <option :value="supplier.id" v-for="supplier in suppliers">{{ supplier.name
                                                }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="">Product Code</label>
                                            <input type="text" class="form-control" v-model="form.product_code"
                                                placeholder="Product code" />
                                            <small class="text-danger" v-if="errors.product_code">{{
                                                errors.product_code[0]
                                            }}</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="">Product Root</label>
                                            <input type="text" class="form-control" v-model="form.root" />
                                            <small class="text-danger" v-if="errors.root">{{ errors.root[0] }}</small>
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for=""> Product quantity</label>
                                            <input type="text" class="form-control" v-model="form.product_quantity" />
                                            <small class="text-danger" v-if="errors.product_quantity">{{
                                                errors.product_quantity[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="">Selling price</label>
                                            <input type="text" class="form-control" v-model="form.selling_price" />
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="">Buying price</label>
                                            <input type="text" class="form-control" v-model="form.buying_price" />
                                            <small class="text-danger" v-if="errors.buying_price">{{ errors.buying_price[0]
                                            }}</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="">Buying price</label>
                                            <input type="date" class="form-control" v-model="form.buying_date" />
                                            <small class="text-danger" v-if="errors.buying_date">{{ errors.buying_date[0]
                                            }}</small>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="">Product Image</label>
                                                    <input type="file" class="form-control" @change="onSelectedFile" />
                                                </div>
                                            </div>
                                            <div class="col-6" v-if="form.newPhoto">
                                                <img :src="form.newPhoto" alt=""
                                                    style="width: 80px;height: 60px;border: 2px solid red;margin-bottom: 2px;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block btn-success">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, reactive, onMounted } from "vue";
import { useRoute } from "vue-router";
import { useRouter } from "vue-router";

const route = useRoute();
const router = useRouter();
const categories = ref([]);
const suppliers = ref([]);
const form = ref({
    name: '',
    category_id: '',
    supplier_id: '',
    product_code: '',
    root: '',
    selling_price: '',
    product_quantity: '',
    buying_date: '',
    buying_price: '',
    photo: '',
    newPhoto: ''
});

const errors = ref({
    name: '',
    product_code: '',
    root: '',
    selling_price: '',
    product_quantity: '',
    buying_date: '',
    buying_price: '',
});

const onSelectedFile = (event) => {
    let file = event.target.files[0];
    let reader = new FileReader();
    reader.onload = (event) => {
        form.newPhoto = event.target.result;
    };

    reader.readAsDataURL(file);
};

onMounted(() => {
    axios.get('/category/')
        .then((response) => {
            categories.value = response.data;
        }).catch();

    axios.get('/supplier/')
        .then((res) => {
            suppliers.value = res.data;
        }).catch();

    getProduct();

});


const getProduct = () => {
    const id = route.params.id;
    axios.get('/product/' + id)
        .then((res) => {
            form.value = res.data
        }).catch();
}

const updateProduct = () => {
    const id = route.params.id;
    axios.put('/product/' + id, form.value).then((res) => {
       Notification.update();
       router.push('/list-product');

    }).catch();
}


</script>
