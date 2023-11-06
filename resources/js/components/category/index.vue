<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Category List</h1>
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
        <!-- <router-link class="btn btn-success" to="user-create">Add user</router-link> -->
        <div class="col-12">
          <div class="card">
            <div class="card-header text-center">
              <h4>Category list</h4>
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-end mb-2">
                <input
                  type="text"
                  placeholder="Search category name"
                  v-model="filtersSearch"
                  class="form-control w-25"
                />
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">S.L</th>
                      <th scope="col">Name</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     <tr v-for="(category, index) in filteredCategory" :key="category.id">
                        <td>{{ index + 1 }}</td>
                        <td>{{ category.category_name }}</td>
                        <td>
                          <router-link :to="{name:'edit-category',params:{id:category.id}}" class="btn btn-success mr-2">Edit</router-link>
                          <button class="btn btn-danger" @click="CategoryDelete(category.id)">
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
import axios from "axios";
import { onMounted,ref, computed } from "vue";

const categories = ref([]);
const filtersSearch = ref("");

const filteredCategory = computed(() => {
  return categories.value.filter((category) => {
    const search = filtersSearch.value.toLowerCase();
    return category.category_name.toLowerCase().includes(search);
  });
});

const CategoryDelete = (id) =>{

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
          axios.delete(`/category/${id}`)
          .then((response) => {
            getCategory()
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
    getCategory()
});

const getCategory = () =>{
  axios.get('category')
    .then((response) =>{
        categories.value = response.data;
    })
    .catch();
}

</script>
