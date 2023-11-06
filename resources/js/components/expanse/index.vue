<template>
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Expanse List</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Expanse</a></li>
                  <li class="breadcrumb-item active">Page</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- <router-link class="btn btn-success" to="user-create">Add user</router-link> -->
              <div class="col-12">
                <div class="card">
                  <div class="card-header text-center">
                    <h4>Employee list</h4>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-end mb-2">
                      <input
                        type="text"
                        placeholder="Search name and phone"
                        v-model="filtersSearch"
                        class="form-control w-25"
                      />
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">S.L</th>
                            <th scope="col">Expanse Details</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(expanse, index) in filteredEmployee" :key="expanse.id">
                            <td>{{ index + 1 }}</td>
                            <td>{{ expanse.details }}</td>
                            <td>{{ expanse.amount }}</td>
                            <td>{{ expanse.expanse_date }}</td>
                            <td>
                              <router-link :to="{name:'edit-expanse',params:{id:expanse.id}}" class="btn btn-success mr-2">Edit</router-link>
                              <button class="btn btn-danger" @click="expanseDelete(expanse.id)">
                                Delete
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </template>
<script setup>
import  axios  from "axios";
import { ref, onMounted, computed} from "vue";

const expanses = ref([]);
const filtersSearch = ref("");
const filteredEmployee = computed(() => {
  return expanses.value.filter((expanses) => {
    const search = filtersSearch.value.toLowerCase();
    return expanses.details.toLowerCase().includes(search) || expanses.amount.includes(search);
  });
});

const expanseDelete = (id) => {
    
  Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    })
    .then((result) => {
        if (result.isConfirmed) {
        axios.delete("/expanse/" +id)
        .then((response) => {
          getExpanse();
        }).catch(()=>{

        });
        Swal.fire(
            "Deleted!",
            "Your file has been deleted.", "success"
         );
        }
    });


}
 onMounted(() => {
   getExpanse();

});

const getExpanse = () =>{
  axios.get('expanse')
    .then((response) =>{
        expanses.value = response.data;
    });
}

</script>
