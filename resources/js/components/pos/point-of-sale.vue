<template>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-6">
            <router-link to="/create-employe" class="btn btn-info mb-2 btn-sm"><i class="fas fa-arrow-left"></i> Add new employee</router-link>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Product list</a></li>
              <li class="breadcrumb-item active">Page</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- <router-link class="btn btn-success" to="user-create">Add user</router-link> -->
          <div class="col-12">
            <div class="card card-primary card-outline">
              <div class="card-header p-1">
                <div class="row">
                    <div class="col-5">
                      <h5 class="m-0 p-0" >Point of sale</h5>
                    </div>
                    <div class="col-7">
                        <!-- <input
                           type="text"
                           placeholder="Product name and Category Name"
                           v-model="filtersSearch"
                           class="form-control w-100"
                         /> -->
                       </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="card p-0 m-0">
                            <div class="card-body">
                                <h1></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-7 border">
                            <nav>
                             <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                  <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
                                  <button v-for="category in categories" :key="category.id" class="nav-link" id="nav-profile-tab"
                                  data-bs-toggle="tab" data-bs-target="#nav-profile"
                                  type="button" role="tab" aria-controls="nav-profile"
                                  aria-selected="false" @click="searchByCategory(category.id)">{{ category.category_name }}</button>
                             </div>
                              </nav>
                              <div class="tab-content" id="nav-tabContent">
                                <!-- All product  -->
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                    <div class="row mt-2">
                                        <div class="col-4" v-for="product in products" :key="product.id">
                                            <div class="card">
                                                <img :src="product.photo" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                  <small class="fs-6">Product Name:{{ product.name }}</small>
                                                  <br>
                                                  <small class="card-text">Category Name: {{ product.category_name }}</small>
                                                  <br>
                                                  <small class="card-text">Product Price: {{ product.selling_price }}</small>
                                                </div>
                                                <div class="card-footer p-1 m-0">
                                                    <button class="btn btn-sm btn-block btn-outline-success">Add to card</button>
                                                </div>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                        <!-- All product End  -->

    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">...</div>
                          </div>
                    </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  <!-- vue -->
  <script setup>
    import axios from "axios";
import { onMounted, ref } from "vue";

    const products = ref([]);
    const categories = ref([]);
    const productsById = ref([]);

    onMounted(() => {
        axios.get('product').then((response)=>{
            products.value = response.data;
        }).catch();

        axios.get('category').then((response)=>{
            categories.value = response.data;
        }).catch();
    });

    const searchByCategory = (id) =>{
        axios.get("/api/pos/get/category/"+id).then((response)=>{
        productsById.value = response.data;
        console.log(response.data);
        }).catch();
    }
  </script>
