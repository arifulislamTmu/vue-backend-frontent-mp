<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Salary</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <router-link to="/admin/dashboard">Home</router-link>
            </li>
            <li class="breadcrumb-item active">Pay Salary Edit</li>
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
              <h4 class="text-center">Employee Salary Update</h4>
            </div>
            <div class="card-body">
              <form @submit.prevent="updatePaySalary">
                <div class="row">
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="">Employee Name</label>
                      <input type="text" class="form-control" v-model="form.name" placeholder="Employee Name" />

                    </div>
                  </div>
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="">Employee Email</label>
                      <input type="text" class="form-control" v-model="form.email" placeholder="Employee Email" />
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="mb-3">
                      <label for="">Month Name</label>
                      <select v-model="form.salary_month" class="form-control">
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                      </select>
                      <small class="text-danger" v-if="errors.salary_month">{{
                        errors.salary_month[0]
                      }}</small>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="">Salary Amount</label>
                      <input type="text" class="form-control" v-model="form.amount" />
                      <small class="text-danger" v-if="errors.amount">{{
                        errors.amount[0]
                      }}</small>
                    </div>
                    <input type="hidden" v-model="form.id">
                  </div>

                </div>
                <button type="submit" class="btn btn-block btn-success">Update </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
  <!-- vue -->
<script setup>
import { ref, reactive, onMounted } from "vue";
import { useRouter, useRoute } from "vue-router";
import axios from "axios";
const router = useRouter();
const route = useRoute();

const form = ref({
  id: '',
  name: '',
  email: '',
  salary_month: null,
  amount: null,
});

const errors = ref({
  salary_month: null,
  amount: null,
});


onMounted(() => {
  const id = route.params.id;
  axios.get("/api/salary-edit/" + id)
    .then((response) => {
      form.value = response.data;
    });
});

const updatePaySalary = () => {
  const id = route.params.id;
  axios.post('/api/salary/update/' + id, form.value)
    .then((response) => {
      Notification.update();
      router.back()
    })
    .catch((error) => {
      errors.value = error.response.data.errors;
    });
};
</script>

