<template>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Expanse</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <router-link to="/admin/dashboard">Home</router-link>
              </li>
              <li class="breadcrumb-item active">Expanse</li>
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
                <h4 class="text-center">Add Expanse</h4>
              </div>
              <div class="card-body">
                <form @submit.prevent="categoryExpanse">
                  <div class="row">
                    <div class="col-12">
                      <div class="mb-3">
                        <label for="">Expanse Details</label>
                        <textarea v-model="form.details"  class="form-control"  ></textarea>
                        <small class="text-danger" v-if="errors.details">{{  errors.details[0] }}</small>
                      </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                          <label for="">Expanse Amount</label>
                          <input type="text" class="form-control" v-model="form.amount"  />
                          <small class="text-danger" v-if="errors.amount">{{  errors.amount[0] }}</small>
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
  details : '',
  amount : ''
});

const errors  = ref({
    details : '',
    amount : '',
})

const categoryExpanse = () => {
  axios.post('expanse', form)
  .then((response) =>{
    console.log(response.data);
    Notification.success();
   router.push('/list-expanse');
  })
  .catch((error)=>{
    errors.value = error.response.data.errors;
  });
}
</script>
