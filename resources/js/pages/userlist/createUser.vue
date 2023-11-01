<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Create user</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Create user</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-6">
          <router-link class="btn btn-success mb-1" to="/admin/users"
            >Back to user list</router-link
          >
          <div class="card">
            <div class="card-body">
              <Form @submit="createUser" :validation-schema="schema" v-slot="{ errors }">
                <div class="mb-3">
                  <label for="" class="form-label">Name</label>
                  <Field
                    type="text"
                    name="name"
                    :class="{ 'is-invalid': errors.name }"
                    class="form-control"
                  />
                  <span class="invalid-feedback">{{ errors.name }}</span>
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Email</label>
                  <Field
                    type="email"
                    :class="{ 'is-invalid': errors.email }"
                    name="email"
                    class="form-control"
                  />
                  <span class="invalid-feedback">{{ errors.email }}</span>
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Password</label>
                  <Field
                    type="password"
                    :class="{ 'is-invalid': errors.password }"
                    name="password"
                    id=""
                    class="form-control"
                  />
                  <span class="invalid-feedback">{{ errors.password }}</span>
                </div>
                <div class="mb-3">
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
              </Form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import axios from "axios";
import { reactive } from "vue";
import { Form, Field } from "vee-validate";
import { useRouter } from "vue-router";

import * as yup from "yup";

const schema = yup.object({
  name: yup.string().required(),
  email: yup.string().required(),
  password: yup.string().required(),
});
const router = useRouter();
const createUser = (values, { resetForm }) => {
  axios.post("/api/create-user/", values).then((response) => {
    resetForm();
    Toast.fire({
      icon: "success",
      title: "Created in successfully",
    });
    router.push("/admin/users");
  });
};
</script>
