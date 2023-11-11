<template>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Today orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Orders</a></li>
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
                <h4>Today Orders</h4>
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
                        <th scope="col">Customer Name</th>
                        <th>Total</th>
                        <th scope="col">Pay Amount</th>
                        <th scope="col">Due Amount</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!--   v-if=" filteredSupplier.length > 0 " -->
                      <tr  v-for="(order, index) in filteredSupplier" :key="order.id">
                        <td>{{ index + 1 }}</td>
                        <td>{{ order.cus_name }}</td>
                        <td>{{ order.total }}</td>
                        <td>{{ order.payBill }}</td>
                        <td>{{ order.dueBill }}</td>
                        <td>{{ order.qty }}</td>
                        <td>{{ order.order_date }}</td>
                        <td>
                          <router-link :to="{name:'orderDetails',params:{id:order.id}}" class="btn btn-success mr-2">View</router-link>
                        </td>
                      </tr>
                     <!--  <tr v-else>
                        <td colspan="5" class="text-danger text-center" >Data Not Found</td>
                      </tr> -->
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
  <!-- vue -->
  <script setup>
  import { ref, onMounted, computed } from "vue";
  import axios from "axios";

  const todayOrders = ref([]);
  const filtersSearch = ref("");

  onMounted(() => {
    getUsers();
  });

  const filteredSupplier = computed(() => {
    return todayOrders.value.filter((todayOrder) => {
      const search = filtersSearch.value.toLowerCase();
      return todayOrder.cus_name.toLowerCase().includes(search);
    });
  });

  const getUsers = () => {
    axios.get("/api/today/orders/").then((response) => {
      todayOrders.value = response.data;
      console.log(todayOrders.value);
    });
  };


  </script>
