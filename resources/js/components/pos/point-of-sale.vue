<template>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-6">
            <router-link to="/create-employe" class="btn btn-info mb-2 btn-sm"><i class="fas fa-arrow-left"></i> Add new employee</router-link>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Product list</a></li>
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
            <div class="card card-primary card-outline">
              <div class="card-header p-1">
                <div class="row">
                    <div class="col-5">
                      <h5 class="m-0 p-0" >Point of sale</h5>
                    </div>
                    <div class="col-7">
                        <input
                           type="text"
                           placeholder="Product name and Category Name"
                           v-model="filtersSearch"
                           class="form-control w-100"
                         />
                       </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-5 border">
                                <table class="table">
                                    <tr>
                                        <th width="25%">P.Name</th>
                                        <th width="20%">Price</th>
                                        <th width="30%">Qty</th>
                                        <th width="25%">Action</th>
                                    </tr>

                                    <tr v-for="productPos in productByPos" :key="productPos">
                                        <td>{{ productPos.product_name }}</td>
                                        <td>{{ productPos.product_price }}</td>
                                        <td class="d-flex">
                                          <button class="btn btn-sm btn-success" @click="increment(productPos.id)" >+</button>
                                          <input class="form-control" type="text" :value="productPos.product_qty ">
                                          <button class="btn btn-sm btn-danger"  @click="decrement(productPos.id)">-</button>
                                        </td>
                                        <td>
                                            <button @click="removeCart(productPos.id)" class="btn btn-sm btn-danger">X</button>
                                        </td>
                                    </tr>
                          </table>
                          <hr>
                          <div class="d-flex border pt-2">
                            <div class=" pl-2 total w-50">
                                <h6>Total Qty:</h6>
                                <h6>Sub-Total:</h6>
                                <h6>Vat:</h6>
                                <h6>Total:</h6>
                            </div>
                            <div class="total w-50 text-right pr-5">
                               <h6> {{ totalQty }}</h6>
                               <h6> {{ subTotal }} $</h6>
                               <h6> 5 %</h6>
                               <h6> {{ subTotal * 5/100 + subTotal  }} $</h6>
                            </div>
                        </div>
                        <form @submit.prevent="orderDone">
                        <div class="pl-2 pr-2 border pt-1 mt-2">
                            <div class="d-flex">
                                <div class="w-50">
                                    <h6>Customer Name</h6>
                                </div>
                                <!-- <div class="w-50 text-right mb-1">
                                    <button class="btn btn-sm btn-success">Add Customer</button>
                                </div> -->
                            </div>
                            <select v-model="form.customerName" class="form-control">
                                <option value="1">Arif</option>
                                <option value="2">Arif 2</option>
                            </select>
                            <label for=""> Pay Bill</label>
                            <input type="text" class="form-control" v-model="form.payBill" />
                            <label for=""> Due Bill</label>
                            <input type="text" class="form-control" v-model="form.dueBill" />

                            <button type="submit" class="btn btn-success m-2" >Order Now</button>
                        </div>
                      </form>
                    </div>
                    <div class="col-7 border">
                                <div class="card-header d-flex p-0">
                                  <ul class="nav nav-pills p-2">
                                    <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">All Product</a></li>
                                    <li class="nav-item" v-for="category in categories" :key="category.id" >
                                        <a class="nav-link" @click="searchByCategory(category.id)" href="#tab_2" data-toggle="tab">
                                            {{ category.category_name }}
                                        </a>
                                    </li>
                                  </ul>
                                </div>
                                <div class="card-body">
                                  <div class="tab-content">
                                    <!-- All product  -->
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="row mt-2" v-if="filteredProduct.length > 0 ">
                                            <div class="col-4" v-for="product in filteredProduct" :key="product.id">
                                                <div class="card" @click="addToCart(product.id)">
                                                    <img :src="product.photo" class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                      <small class="fs-6">Product Name:{{ product.name }}</small>
                                                      <br>
                                                      <small class="card-text">Category Name: {{ product.category_name }}</small>
                                                      <br>
                                                      <small class="card-text">Product Price: {{ product.selling_price }}</small>
                                                    </div>
                                                    <div class="card-footer p-1 m-0">
                                                        <button class="btn btn-sm btn-block btn-outline-success">Add to cart</button>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="text-center text-danger" v-else>
                                            <h6>No Product Found</h6>
                                        </div>

                                    </div>
                                    <!-- End all product -->
                                    <!--  Category product -->
                                    <div class="tab-pane" id="tab_2">
                                        <div class="row mt-2" v-if="filteredCategory.length > 0">
                                            <div class="col-4"  v-for="catProduct in filteredCategory" :key="catProduct.id" >
                                                <div class="card"  @click="addToCart(catProduct.id)">
                                                    <img :src="catProduct.photo" style="height:100px; object-fit:cover;" class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                      <small class="fs-6">Product Name:{{ catProduct.name }}</small>
                                                      <br>
                                                      <small class="card-text">Category Name: {{ catProduct.category_name }}</small>
                                                      <br>
                                                      <small class="card-text">Product Price: {{ catProduct.selling_price }}</small>
                                                    </div>
                                                    <div class="card-footer p-1 m-0">
                                                        <button class="btn btn-sm btn-block btn-outline-success">Add to card</button>
                                                    </div>
                                                  </div>

                                            </div>

                                        </div>
                                        <div v-else class="text-center text-danger">
                                            <h6>No Product found</h6>
                                        </div>
                                    </div>
                                     <!-- End Category product -->
                                  </div>
                             </div>
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
    import axios from "axios";
    import { onMounted, ref , computed, reactive} from "vue";
    import { useRouter } from "vue-router";
    const router = useRouter();
    const products = ref([]);
    const categories = ref([]);
    const productsById = ref([]);
    const productByPos = ref([]);
    const filtersSearch = ref("");
    const form = reactive({
        customerName : '',
        payBill: '',
        dueBill: '',
    });

// add to cart
    const addToCart = (id)  =>{
        axios.get("/api/add-to-cart/"+id).then((response)=>{
        Notification.success();
        getPosProduct();
        }).catch();
    }
    // remove add to cart
    const removeCart = (id)  =>{
        axios.get("/api/remove-to-cart/"+id).then((response)=>{
        Notification.remove();
        getPosProduct();
        }).catch();
    }

     // Increment to cart
        const increment = (id)  =>{
        axios.get("/api/increment/"+id).then((response)=>{
        Notification.update();
        getPosProduct();
        }).catch();
    }

    // Decrement  to cart
    const decrement = (id)  =>{
        axios.get("/api/decrement/"+id).then((response)=>{
            if(response.data == "Minimum 1 quantity"){
                Notification.error(response.data);
            }else{
                Notification.update();
            }
        getPosProduct();
        }).catch();
    }
    const orderDone = () =>{
        let total = subTotal.value * 5/100 + subTotal.value;
        var formData = ref({ qty: totalQty.value, customerId: form.customerName, payBill: form.payBill,
            dueBill: form.dueBill, total : total });
        axios.post('/api/order-done/', formData.value).then((response)=>{
            Notification.success();
           router.push('/admin/dashboard');

        })
    }
    const totalQty = computed(() => {
     let sum = 0;
     for(let i = 0 ; i< productByPos.value.length; i++ ){
        sum += (parseFloat(productByPos.value[i].product_qty))
     }
     return sum;
  });

  const subTotal = computed(() => {
     let sum = 0;
     for(let i = 0 ; i< productByPos.value.length; i++ ){
        sum += (parseFloat(productByPos.value[i].sub_total))
     }
     return sum;
  });

    const filteredProduct = computed(() => {
    return products.value.filter((product) => {
      const search = filtersSearch.value.toLowerCase();
      return product.name.toLowerCase().includes(search) || product.buying_price.includes(search);
    });
  });

  const filteredCategory = computed(() => {
    return productsById.value.filter((product) => {
      const search = filtersSearch.value.toLowerCase();
      return product.name.toLowerCase().includes(search) || product.buying_price.includes(search);
    });
  });


 onMounted(() => {
        axios.get('product').then((response)=>{
            products.value = response.data;
        }).catch();

        axios.get('category').then((response)=>{
            categories.value = response.data;
        }).catch();
        getPosProduct();
    });

    const getPosProduct = () =>{
        axios.get('/api/pos/get/product/').then((response)=>{
            productByPos.value = response.data;
        }).catch();
    }

    const searchByCategory = async (id) =>{
       await axios.get("/api/pos/get/category/"+id).then((response)=>{
        productsById.value = response.data;
        }).catch();
    }
  </script>
