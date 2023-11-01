<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Employee</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <router-link to="/admin/dashboard">Home</router-link>
            </li>
            <li class="breadcrumb-item active">Create Employee</li>
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
              <h4 class="text-center">Add Employee</h4>
            </div>
            <div class="card-body">
              <form @submit.prevent="storeEmployee" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-6">
                    <div class="mb-3">
                      <input
                        type="text"
                        class="form-control"
                        v-model="form.name"
                        placeholder="Employee Name"
                      />
                      <small class="text-danger" v-if="errors.name">{{
                        errors.name[0]
                      }}</small>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="mb-3">
                      <input
                        type="text"
                        class="form-control"
                        v-model="form.nid"
                        placeholder="Employee NID"
                      />
                      <small class="text-danger" v-if="errors.nid">{{
                        errors.nid[0]
                      }}</small>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="mb-3">
                      <input
                        type="text"
                        class="form-control"
                        v-model="form.email"
                        placeholder="Employee Email"
                      />
                      <small class="text-danger" v-if="errors.email">{{
                        errors.email[0]
                      }}</small>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="mb-3">
                      <input
                        type="text"
                        class="form-control"
                        v-model="form.address"
                        placeholder="Employee Address"
                      />
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="mb-3">
                      <input
                        type="date"
                        class="form-control"
                        v-model="form.joining_date"
                        placeholder="Joining Date"
                      />
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="row">
                        <div class="col-6 ">
                            <div class="mb-3">
                                <input type="file" class="form-control" @change="onSelectedFile" />
                              </div>
                        </div>
                        <div class="col-6 " v-if="form.photo">
                            <img :src="form.photo" alt="" id="image" style=" width: 80px; height: 60px; border:2px solid red; margin-bottom:2px;" />
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
<!-- vue -->
<script setup>
import { ref, reactive } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";
const router = useRouter();

const form = reactive({
  name: null,
  nid: null,
  email: null,
  address: null,
  joining_date: null,
  photo: "",
});

const errors = ref({
  name: null,
  email: null,
  nid: null,
});

let msg = "Something Went Wrong !!";

const onSelectedFile = (event) => {
  let file = event.target.files[0];

  let reader = new FileReader();
  reader.onload = (event) => {
    form.photo = event.target.result;
  };

  reader.readAsDataURL(file);
};

const storeEmployee = () => {
  axios
    .post("/api/employee/", form)
    .then((response) => {
      Notification.success(msg);
      router.push("/list-employee");
    })
    .catch((error) => {
      errors.value = error.response.data.errors;
    });
};
</script>
