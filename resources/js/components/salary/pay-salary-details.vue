<template>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Salary Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Salary Details</a></li>
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
                <h4>Employee Salary Details</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">S.L</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Month Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(salary, index) in salary_list" :key="salary.id">
                        <td>{{ index + 1 }}</td>
                        <td>{{ salary.name }}</td>
                        <td>{{ salary.salary_month }}</td>
                        <td>{{ salary.amount }}</td>
                        <td>{{ salary.salary_date }}</td>
                        <td>
                          <router-link :to="/salary-edit/+ salary.emp_salary_id" class="btn btn-success mr-2">Salary Edit</router-link>
                          <!-- <router-link :to="{name:'salary-edit', params:{id:salary.name}}" class="btn btn-success mr-2">Salary Edit</router-link> -->
                        </td>
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
  import { ref, onMounted } from "vue";
  import { useRoute } from "vue-router";
  import axios from "axios";

  const salary_list = ref([]);
  const route = useRoute()
  onMounted(() => {
    getSalary();
  });
  const getSalary = () => {
    const id = route.params.id;

    axios.get("/salary-details/"+id).then((response) => {
        salary_list.value = response.data;
       
    });
  };
  </script>
