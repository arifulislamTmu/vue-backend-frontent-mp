<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Appointments</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Appointments Page</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- <router-link class="btn btn-success" to="user-create">Add user</router-link> -->
        <div class="card table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">S.L</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<!-- vue -->
<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
const users = ref([]);

const getUsers = () => {
  axios.get("/api/user/").then((response) => {
    users.value = response.data;
    console.log(response.data);
  });
};

onMounted(() => {
  getUsers();
});
</script>
