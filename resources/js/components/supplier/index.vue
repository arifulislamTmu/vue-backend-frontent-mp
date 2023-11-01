<template>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Supplier List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Supplier</a></li>
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
                <h4>Supplier list</h4>
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-end mb-2">
                  <input
                    type="text"
                    placeholder="Search name and phone"
                    v-model="filtersSearch"
                    class="form-control w-25"
                  />
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">S.L</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Shop Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-if="filteredSupplier.length > 0 " v-for="(user, index) in filteredSupplier" :key="user.id">
                        <td>{{ index + 1 }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td><img :src="user.photo" alt="" style="width: 50px" /></td>
                        <td>{{ user.shop_name }}</td>
                        <td>
                          <router-link :to="{name:'edit-employee',params:{id:user.id}}" class="btn btn-success mr-2">Edit</router-link>
                          <button class="btn btn-danger" @click="supplierDelete(user.id)">
                            Delete
                          </button>
                        </td>
                      </tr>
                      <tr v-else>
                        <td colspan="5" class="text-danger text-center" >Data Not Found</td>
                      </tr>
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
  <!-- vue -->
  <script setup>
  import { ref, onMounted, computed } from "vue";
  import axios from "axios";

  const users = ref([]);
  const filtersSearch = ref("");

  onMounted(() => {
    getUsers();
  });

  const filteredSupplier = computed(() => {
    return users.value.filter((user) => {
      const search = filtersSearch.value.toLowerCase();
      return user.name.toLowerCase().includes(search) || user.shop_name.includes(search);
    });
  });

  const getUsers = () => {
    axios.get("/supplier/").then((response) => {
      users.value = response.data;
    });
  };

  const supplierDelete = (id) => {
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
          axios.delete(`/supplier/${id}`)
          .then((response) => {
           getUsers();
          }).catch(()=>{

          });
          Swal.fire(
              "Deleted!",
              "Your file has been deleted.", "success"
           );
          }
      });
  };
  </script>
