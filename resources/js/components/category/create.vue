<template>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <router-link to="/admin/dashboard">Home</router-link>
              </li>
              <li class="breadcrumb-item active">Create Category</li>
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
                <h4 class="text-center">Add Category</h4>
              </div>
              <div class="card-body">
                <form @submit.prevent="categoryEmployee">
                  <div class="row">
                    <div class="col-12">
                      <div class="mb-3">
                        <label for="">Category Name</label>
                        <input type="text" class="form-control" v-model="form.name" placeholder="Category Name" />
                        <small class="text-danger" v-if="errors.name">{{  errors.name[0] }}</small>
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
<script setup>
import axios from "axios";
import {ref, reactive} from "vue";
import { useRouter } from "vue-router";

const router = useRouter();
const form = reactive({
  name : ''
});

const errors  = ref({
    name : ''
})

const categoryEmployee = () => {
  axios.post('category', form)
  .then((response) =>{
    console.log(response.data);
    Notification.success();
   router.push('/list-category');
  })
  .catch();
}



</script>
