

<script setup>
import axios from 'axios';
import { ref, onMounted, reactive } from 'vue';
import { Form , Field } from 'vee-validate';
import * as yup from 'yup';
const users = ref([]);

const form = reactive({
    name: '',
    email: '',
    password: ''
})

// const createUser = () =>{
//     axios.post('/api/user/create', form).then((response)=>{
//         console.log(response);
//         form.name = '';
//         form.email= '';
//         form.password= '';

//         $('#modal-default').modal('hide');


//     });
// }
const schema = yup.object({
    name: yup.string().required(),
    email: yup.string().required(),
    password: yup.string().required(),
});

const createUser = (values) =>{
    axios.post('/api/user/create', values).then((response)=>{
        form.name = '';
        form.email= '';
        form.password= '';
        $('#modal-default').modal('hide');
    });
}

const getUsers = () => {
    axios.get('/api/users').then((response) => {
        users.value = response.data;
        console.log(response.data);
    });
}

onMounted(() => {
    getUsers();
});

</script>
<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

</template>
<!-- vue -->
<script setup>

</script>
