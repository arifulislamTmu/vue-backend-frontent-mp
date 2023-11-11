
<template>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Customer List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Customer</a></li>
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
            <div class="card">
              <div class="card-header text-center">
                <h4>Customer list</h4>
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-end mb-2">
                  <input type="text" placeholder="Search name and phone" v-model="filtersSearch"
                    class="form-control w-25" />
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">S.L</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <!--   <tr v-for="(product, index) in filteredProducts " :key="product.id">
                        <td>{{ index + 1 }}</td>
                        <td>{{ product.name }}</td>
                        <td>{{ product.sup_name }}</td>
                        <td>{{ product.category_name }}</td>
                        <td>{{ product.root }}</td>
                        <td>{{ product.buying_price }}</td>
                        <td>{{ product.selling_price }}</td>
                        <td>{{ product.product_quantity }}</td>
                        <td>{{ product.buying_date }}</td>
                        <td> <img :src="product.photo" class="img-fluid rounded-top" style="width: 100px; height: 80px;">
                        </td>
                        <td>
                          <router-link :to="{ name: 'edit-product', params: { id: product.id } }"
                            class="btn btn-sm btn-success m-1">Edit</router-link>
                          <button @click="deleteProduct(product.id)" class="btn btn-sm btn-danger  m-1">Delete</button>
                        </td>
                      </tr> -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>

  <script setup>
  import axios from 'axios';
  import { onMounted, ref, computed } from "vue";

  const products = ref([]);
  const filtersSearch = ref("");

  const filteredProducts = computed(() => {
    return products.value.filter((product) => {
      const search = filtersSearch.value.toLowerCase();
      return product.name.toLowerCase().includes(search) || product.sup_name.toLowerCase().includes(search);
    });
  });
  onMounted(() => {
    getProduct();
  });
  const getProduct = () => {
    axios.get('product')
      .then((response) => {
        products.value = response.data;
      })
      .catch();
  }
  const deleteProduct = (id) => {
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    })
      .then((result) => {
        if (result.isConfirmed) {
          axios.delete("/product/" + id)
            .then((response) => {
              getProduct();
            }).catch(() => {

            });
          Swal.fire(
            "Deleted!",
            "Your file has been deleted.", "success"
          );
        }
      });
  }



  </script>
