

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
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <button type="button" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#modal-default">
                  Add user
                </button>
                <div class="col-12 card">

                    <table class="table">
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        <tr v-for="(user, index) in users" :key="index">
                            <td>{{ ++index}}</td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>
                                <button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add new user</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <Form @submit="createUser" :validation-schema="schema" v-slot="{errors}">
            <div class="modal-body">

                    <div class="mb-3">
                        <label for="name" class="form-label">User name</label>
                        <Field type="name" class="form-control" id="name" name="name" :class="{'is-invalid': errors.name}" />
                        <span class="invalid-feedback">{{ errors.name }}</span>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <Field type="email" class="form-control" name="email" id="email" :class="{'is-invalid': errors.email}" />
                        <span class="invalid-feedback">{{ errors.email }}</span>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <Field type="password" class="form-control" name="password" id="password" :class="{'is-invalid': errors.password}" />
                        <span class="invalid-feedback">{{ errors.password }}</span>
                    </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button  type="submit" class="btn btn-primary">Save</button>
            </div>
        </Form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>









</template>
