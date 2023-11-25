<template>
    <div>
        <div class="content-header">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <router-link to="/order-list" class="btn btn-info mb-2 btn-sm"><i class="fas fa-arrow-left"></i> All orders</router-link>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Orders Details </a></li>
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
              <div class="col-md-6">
                <div class="card card-outline card-success">
                  <div class="card-header">
                    <h3 class="card-title">Customer information</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex" >
                        <div class="w-50">
                           <strong> Customer Name: </strong>
                        </div>
                        <div class="w-50">
                            <strong> {{ customerDetails.cus_name }} </strong>
                        </div>
                    </div>
                    <div class="d-flex" >
                        <div class="w-50">
                           <strong> Customer Email: </strong>
                        </div>
                        <div class="w-50">
                            <span> {{ customerDetails.cus_email }} </span>
                        </div>
                    </div>
                    <div class="d-flex" >
                        <div class="w-50">
                           <strong> Customer Phone: </strong>
                        </div>
                        <div class="w-50">
                            <span> {{ customerDetails.cus_phone }} </span>
                        </div>
                    </div>
                    <div class="d-flex" >
                        <div class="w-50">
                           <strong> Customer Address: </strong>
                        </div>
                        <div class="w-50">
                            <span> {{ customerDetails.cus_address }} </span>
                        </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="card card-outline card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Amount information</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex" >
                        <div class="w-50">
                           <strong> Total Amount: </strong>
                        </div>
                        <div class="w-50">
                            <strong> {{ customerDetails.total }} $</strong>
                        </div>
                    </div>
                    <div class="d-flex" >
                        <div class="w-50">
                           <strong>Pay Amount : </strong>
                        </div>
                        <div class="w-50">
                            <span> {{ customerDetails.payBill }} $</span>
                        </div>
                    </div>
                    <div class="d-flex" >
                        <div class="w-50">
                           <strong> Due Amount: </strong>
                        </div>
                        <div class="w-50">
                            <span> {{ customerDetails.dueBill }} $</span>
                        </div>
                    </div>
                    <div class="d-flex" >
                        <div class="w-50">
                           <strong> Vat(5%) </strong>
                        </div>
                        <div class="w-50">
                            <span> ({{ (customerDetails.total * 5 /100)}})$ </span>
                        </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">

                <div class="card card-outline card-info">
                  <div class="card-header">
                    <h4 class="p-0 m-0">Today Orders</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">S.L</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th>Total Price</th>
                            <th scope="col">Sub Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr  v-for="(order, index) in filteredSupplier" :key="order.id">
                            <td>{{ index + 1 }}</td>
                            <td>{{ order.product_name }}</td>
                            <td>{{ order.product_qty }}</td>
                            <td>{{ order.product_price }}</td>
                            <td>{{ order.sub_total }}</td>
                            <td>
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
    </div>
  </template>
  <!-- vue -->
  <script setup>
  import { ref, onMounted, computed } from "vue";
  import axios from "axios";
  import {useRoute} from "vue-router";

  const todayOrders = ref([]);
  const customerDetails = ref("");
  const filtersSearch = ref("");
  const route = useRoute();
  onMounted(() => {
    getUsers();
  });

  var test = 1;

  const filteredSupplier = computed(() => {
    return todayOrders.value.filter((todayOrder) => {
      const search = filtersSearch.value.toLowerCase();
      return todayOrder.cus_name.toLowerCase().includes(search);
    });
  });

  const getUsers = () => {
    var id = route.params.id;

    axios.get("/api/order/details/" +id).then((response) => {
      todayOrders.value = response.data;
      console.log(todayOrders[0]);
    });
    axios.get("/api/order/customer/" +id).then((response) => {
      customerDetails.value = response.data;
    });
  };


  </script>
