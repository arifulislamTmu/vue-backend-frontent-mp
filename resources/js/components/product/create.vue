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
            <li class="breadcrumb-item active">Create Product</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <router-link to="/admin/dashboard" class="btn btn-primary mb-2"
            >Back</router-link
          >
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">Add Product</h4>
            </div>
            <div class="card-body">
              <form @submit.prevent="storeProduct" enctype="multipart/form-data">
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
                        <option :value="category.id" v-for="category in categories" >{{ category.category_name }}</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="mb-3">
                        <label for="">Supplier Name</label>
                      <select class="form-control" v-model="form.supplier_id">
                        <option :value="supplier.id" v-for="supplier in suppliers" >{{ supplier.name }}</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="mb-3">
                    <label for="">Product Code</label>
                      <input type="text" class="form-control" v-model="form.product_code" placeholder="Product code"/>
                      <small class="text-danger" v-if="errors.product_code">{{
                        errors.product_code[0]
                      }}</small>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="mb-3">
                        <label for="">Product Root</label>
                      <input type="text" class="form-control" v-model="form.root" />
                      <small class="text-danger" v-if="errors.root">{{ errors.root[0]   }}</small>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="mb-3">
                    <label for="">Buying price</label>
                      <input type="text" class="form-control" v-model="form.buying_price"  />
                      <small class="text-danger" v-if="errors.buying_price">{{ errors.buying_price[0]   }}</small>
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="mb-3">
                        <label for=""> Product quantity</label>
                      <input  type="text" class="form-control" v-model="form.product_quantity" />
                      <small class="text-danger" v-if="errors.product_quantity">{{ errors.product_quantity[0]   }}</small>
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="mb-3">
                      <input
                        type="text"
                        class="form-control"
                        v-model="form.buying_date"
                        placeholder="buying_date"
                      />
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="mb-3">
                      <input
                        type="text"
                        class="form-control"
                        v-model="form.selling_price"
                        placeholder="selling_price"
                      />
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="mb-3">
                      <input
                        type="text"
                        class="form-control"
                        v-model="form.product_quantity"
                        placeholder="product_quantity"
                      />
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row">
                      <div class="col-6">
                        <div class="mb-3">
                          <input
                            type="file"
                            class="form-control"
                            @change="onSelectedFile"
                          />
                        </div>
                      </div>
                      <div class="col-6" v-if="form.photo">
                        <img
                          :src="form.photo"
                          alt=""
                          id="image"
                          style="
                            width: 80px;
                            height: 60px;
                            border: 2px solid red;
                            margin-bottom: 2px;
                          "
                        />
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
import { reactive, ref, onMounted } from "vue";

const suppliers  = ref([]);
const categories = ref([]);

const form = reactive({
  name: "",
  product_code: "",
  root: "",
  buying_price: "",
  selling_price: "",
  product_quantity: "",
});

const errors = ref({
  name: "",
  product_code: "",
  root: "",
  buying_price: "",
  selling_price: "",
  product_quantity: "",
});

onMounted(() => {
    axios.get('supplier')
    .then((response) =>{
        suppliers.value = response.data;
    }).catch();

    axios.get('category')
    .then((response) =>{
        categories.value = response.data;
    }).catch();
})

</script>
