<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <router-link to="/create-employe" class="btn btn-info mb-2 btn-sm"><i class="fas fa-arrow-left"></i> Employee
            list</router-link>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <router-link to="/admin/dashboard">Home</router-link>
            </li>
            <li class="breadcrumb-item active">Update Employee</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class=" p-1">Update Employee</h5>
            </div>
            <div class="card-body">
              <form @submit.prevent="updateEmployee" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-6">
                    <div class="mb-3">
                      <input type="text" class="form-control" v-model="form.name" placeholder="Employee Name" />
                      <small class="text-danger" v-if="errors.name">{{
                        errors.name[0]
                      }}</small>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="mb-3">
                      <input type="text" class="form-control" v-model="form.nid" placeholder="Employee NID" />
                      <small class="text-danger" v-if="errors.nid">{{
                        errors.nid[0]
                      }}</small>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="mb-3">
                      <input type="text" class="form-control" v-model="form.email" placeholder="Employee Email" />
                      <small class="text-danger" v-if="errors.email">{{
                        errors.email[0]
                      }}</small>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="mb-3">
                      <input type="text" class="form-control" v-model="form.address" placeholder="Employee Address" />
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="mb-3">
                      <input type="date" class="form-control" v-model="form.joining_date" placeholder="Joining Date" />
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="row">
                      <div class="col-6 ">
                        <div class="mb-3">
                          <input type="file" class="form-control" @change="onSelectedFile" />
                        </div>
                      </div>
                      <div class="col-6 " v-if="form.newphoto">
                        <img :src="form.newphoto" alt=""
                          style=" width: 80px; height: 60px; border:2px solid red; margin-bottom:2px;" />
                      </div>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-success btn-sm">Update</button>
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

const form = reactive({
  name: null,
  nid: null,
  email: null,
  address: null,
  joining_date: null,
  photo: "",
  newphoto: "",
});

const errors = ref({
  name: null,
  email: null,
  nid: null,
});

let msg = "Something Went Wrong !!";

onMounted(() => {
  const id = route.params.id;
  axios.get(`/api/edit-employee/${id}`)
    .then((response) => {
      form.name = response.data.name;
      form.nid = response.data.nid;
      form.email = response.data.email;
      form.address = response.data.address;
      form.joining_date = response.data.phone;
      form.photo = response.data.photo;
      console.log(form.photo);
    });
});



const onSelectedFile = (event) => {
  let file = event.target.files[0];

  let reader = new FileReader();
  reader.onload = (event) => {
    form.newphoto = event.target.result;
  };

  reader.readAsDataURL(file);
};

const updateEmployee = () => {
  const id = route.params.id;
  axios.post(`/api/employee/update/${id}`, form)
    .then((response) => {
      Notification.success(msg);
      router.push("/list-employee");
    })
    .catch((error) => {
      errors.value = error.response.data.errors;
    });
};
</script>
