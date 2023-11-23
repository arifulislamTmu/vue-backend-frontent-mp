<template>
<div class="content">
      <div class="container-fluid">
            <div class="row justify-content-center align-item-center">
                  <div class="col-4 mt-5">
                        <div class="card border">
                              <div class="card-header p-3 text-center">
                                    <span style="font-size: 20px; font-weight: bold">Admin login</span>
                              </div>
                              <div class="card-body">
                                    <form @submit.prevent="loginForm">
                                          <div class="form-group">
                                                <label class="col-form-label"> Email</label>
                                                <input type="text" class="form-control" v-model="form.email"  />
                                               <small class="text-danger">  {{ errors.email["0"] }}</small>
                                            </div>
                                          <div class="form-group">
                                                <label class="col-form-label">Password</label>
                                                <input type="text" class="form-control" v-model="form.password" />
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
import { reactive, computed ,ref} from 'vue';
import { useRouter  } from 'vue-router';
import { userStore } from '@/store/userStore.js'

const form = reactive({
      email: 'admin@gmail.com',
      password: '12345678'
});

const errors = ref({
    email : '',
});
const store = userStore();
const router = useRouter();

const getToken = computed(() => {
     return store.getToken;
    });
const chackToken = localStorage.getItem('token');

const loginForm = () =>{
    axios.post('api/admin/login',form)
    .then((response)=>{
        store.setToken( response.data.data.token);
        Notification.loggedIn();
        router.push('/admin/dashboard');
    }).catch(error =>{
        var msg = error.response.data.errors.email["0"];
        Notification.error(msg);
        errors.value = error.response.data.errors;
        console.log(error.response.data.errors);
    });
}


</script>
