<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row justify-content-center align-item-center">
        <div class="col-5 mt-5">
          <div class="card">
            <div class="card-header p-3 text-center">
              <span style="font-size: 20px; font-weight: bold">Admin login</span>
            </div>
            <div class="card-body">
              <form @submit.prevent="handleLogin">
                <div class="form-group">
                  <label class="col-form-label"> Email</label>
                  <input type="text" class="form-control" v-model="form.email" />
                </div>
                <div class="form-group">
                  <label class="col-form-label">Password</label>
                  <input type="text" class="form-control" v-model="form.password"  />
                </div>
                <div class="form-group d-flex justify-content-between">
                  <a href="">Forgot password</a>
                  <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="form-group">
                  <a href="">Register here</a>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import axios from 'axios';
import {reactive } from 'vue';

const form = reactive({
        email:'',
        password : ''
});

const handleLogin =()=>{
    axios.post('/api/admin/login', form)
    .then((response)=>{
        console.log(response.data);
    })
    .catch();
}


</script>

