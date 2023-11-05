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
              <li class="breadcrumb-item active">Pay Salary</li>
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
                <h4 class="text-center">Employee Salary</h4>
              </div>
              <div class="card-body">
                <form @submit.prevent="paySalary">
                  <div class="row">
                    <div class="col-6">
                      <div class="mb-3">
                        <label for="">Employee Name</label>
                        <input
                          type="text"
                          class="form-control"
                          v-model="form.name"
                          placeholder="Employee Name"
                        />

                      </div>
                    </div>
                    <div class="col-6">
                      <div class="mb-3">
                        <label for="">Employee Email</label>
                        <input
                          type="text"
                          class="form-control"
                          v-model="form.email"
                          placeholder="Employee Email"
                        />
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="mb-3">
                        <label for="">Month Name</label>
                        <select v-model="form.salary_month" class="form-control" >
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
                          <input
                            type="text"
                            class="form-control"
                            v-model="form.amount"
                          />
                          <small class="text-danger" v-if="errors.amount">{{
                            errors.amount[0]
                          }}</small>
                        </div>
                        <input type="hidden" v-model="form.id">
                      </div>

                  </div>
                  <button type="submit" class="btn btn-block btn-success">PayNow</button>
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
  import { useRouter,useRoute } from "vue-router";
  import axios from "axios";
  const router = useRouter();
  const route = useRoute();
  const form = reactive({
    id : '',
    name: '',
    email: '',
    salary_month: null,
    amount: null,
  });

  const errors = ref({
    salary_month: null,
    amount: null,
  });

  let msg = "Something Went Wrong !!";

 onMounted(() => {
    const id = route.params.id;
    axios.get(`/api/edit-employee/${id}`)
    .then((response)=>{
        form.name = response.data.name;
        form.email = response.data.email;
        form.id = id;
    });
 });

  const paySalary = () => {
    axios.post(`/salary/` , form)
      .then((response) => {
        if(response.data == "This salary paid"){
            Notification.error('This salary paid');
        }else{
            Notification.success(msg);
            router.push("/list-salary");
        }
      })
      .catch((error) => {

        errors.value = error.response.data.errors;
        console.log(errors.value);
      });
  };
  </script>
