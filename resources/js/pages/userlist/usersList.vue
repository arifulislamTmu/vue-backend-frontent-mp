<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <router-link class="btn btn-success" to="/admin/user-create">Add user</router-link>
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
              <tr v-for="user in users" :key="user.id">
                <td scope="row">{{ user.id }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>
                  <button class="btn btn-primary">edit</button>
                  <button class="btn btn-danger">Delete</button>
                </td>
              </tr>
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
