<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Update Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Category</a></li>
            <li class="breadcrumb-item active">Page</li>
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
              <h4 class="text-center">Update Category</h4>
            </div>
            <div class="card-body">
              <form @submit.prevent="categoryUpdate">
                <div class="row">
                  <div class="col-12">
                    <div class="mb-3">
                      <label for="">Category Name</label>
                      <input type="text" class="form-control" v-model="form.name" placeholder="Category Name" />
                      <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-block btn-success">Update</button>
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
import { ref, onMounted, reactive } from "vue";
import { useRoute, useRouter } from "vue-router";
const route = useRoute();
const router = useRouter();

const form = reactive({
  name: ''
});

const errors = ref({
    name: null,
  });

onMounted(() => {
  const id = route.params.id;
  axios.get('/category/' + id).then((response) => {
    form.name = response.data.category_name;
  }).catch((error)=>{
     errors.value = error.response.data.errors;
  });
});

const categoryUpdate = () =>{
  const id = route.params.id;
  axios.put("/category/"+id, form).then((response) =>{
    Notification.update();
    router.push('/list-category');

  }).catch((error)=>{
     errors.value = error.response.data.errors;
  });
}


</script>
