<template>
    <div>
      <Header />
      <h2 class="welcome-message">Hello {{ name }}, Welcome to the home page</h2>
      
      <table class="restaurant-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="restaurant in restaurant" :key="restaurant.id">
            <td>{{ restaurant.id }}</td>
            <td>{{ restaurant.name }}</td>
            <td>{{ restaurant.address }}</td>
            <td>{{ restaurant.contact }}</td>
            <td> 
                <router-link :to="'/update/' + restaurant.id">

              <button class="btn btn-warning">Update</button>
            </router-link>

            <button class="btn btn-danger" v-on:click="delRest(restaurant.id)">Delete</button>
        </td>

          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  import Header from './Header.vue';
  import axios from 'axios';
  export default {
    name: 'Index',
    components: {
      Header
    },
    methods:{
        async delRest(id){
let result=await axios.delete('http://localhost:3000/restaurant/' + id)
if(result.status==200){
    this.restaurant = this.restaurant.filter(rest => rest.id !== id);
}
        }
    },
    data() {
      return {
        name: '',
        restaurant: []
      };
    },
    async mounted() {
      let user = localStorage.getItem('user-info');
      if (!user) {
        this.$router.push({ name: 'SignUp' });
      } else {
        this.name = JSON.parse(user).name;
      }
  
      let result = await axios.get("http://localhost:3000/restaurant");
      this.restaurant = result.data;
    }
  };
  </script>
  
  <style scoped>
  .welcome-message {
    text-align: center;
    font-size: 24px;
    margin: 20px 0;
    color: #333;
  }
  
  .restaurant-table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  }
  
  .restaurant-table th, .restaurant-table td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
  }
  
  .restaurant-table th {
    background-color: #343a40; /* Dark background for header */
    color: white; /* White text for header */
    font-weight: bold;
  }
  
  .restaurant-table tr:nth-child(even) {
    background-color: #f2f2f2; /* Light gray for even rows */
  }
  
  .restaurant-table tr:hover {
    background-color: #e9ecef; /* Light gray hover effect */
  }
  
  .restaurant-table td {
    font-size: 16px; /* Increase font size for table cells */
    color: #555; /* Darker text for better readability */
  }
  </style>
  