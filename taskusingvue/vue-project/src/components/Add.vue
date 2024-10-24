<template>
  <div>
    <h2 class="welcome-message">Hello, Welcome to the add page</h2>
    <h2 class="form-title">Add Restaurant</h2>
    
    <form class="restaurant-form">
      <div class="mb-4"> 
        <label for="name" class="form-label">Restaurant Name</label>
        <input type="text" id="name" v-model="name" class="form-control" placeholder="Enter restaurant name" required />
      </div>

      <div class="mb-4">
        <label for="address" class="form-label">Address</label>
        <input type="text" id="address" v-model="address" class="form-control" placeholder="Enter restaurant address" required />
      </div>

      <div class="mb-4">
        <label for="contact" class="form-label">Contact Number</label>
        <input type="tel" id="contact" v-model="contact" class="form-control" placeholder="Enter contact number" required />
      </div>

      <button type="button" class="btn btn-primary" v-on:click="addRest">Add Restaurant</button>
    </form>
  </div>
</template>

<script>
import Header from './Header.vue';
import axios from 'axios';

export default {
  name: 'Add',
  components: {
    Header
  },
  data() {
    return {
      name: '',
      address: '',
      contact: ''
    };
  },
  mounted() {
    let user = localStorage.getItem('user-info');
    if (!user) {
      this.$router.push({ name: 'SignUp' });
    }
  },
  methods: {
  async addRest(){
const result=await axios.post("http://localhost:3000/restaurant",{
  name: this.name,
        address: this.address,
        contact: this.contact

})
if(result.status==201){
  this.$router.push({ name: 'Index' });
}
}
  }
};
</script>

<style scoped>
.form-title {
  text-align: center;
  margin: 20px 0;
  font-size: 28px; 
  font-weight: bold;
  color: #333;
}

.restaurant-form {
  max-width: 600px; 
  margin: 0 auto;
  padding: 30px; 
  background-color: #ffffff;
  border-radius: 12px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15); 
  transition: all 0.3s ease-in-out; 
}

.restaurant-form:hover {
  box-shadow: 0 6px 30px rgba(0, 0, 0, 0.2);
}

.form-label {
  font-weight: bold;
  font-size: 16px; 
  color: #333;
}

.form-control {
  font-size: 16px; 
  padding: 10px;
  border-radius: 8px; 
  border: 1px solid #ced4da;
  box-shadow: none; 
  transition: all 0.2s ease-in-out;
}

.form-control:focus {
  border-color: #007bff; 
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); 
}

.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
  padding: 10px 20px;
  font-size: 18px;
  border-radius: 8px;
  width: 100%; 
  transition: all 0.2s ease-in-out;
}

.btn-primary:hover {
  background-color: #0056b3;
  border-color: #004085;
  transform: translateY(-2px);
}

.mb-4 {
  margin-bottom: 1.5rem;
}


.welcome-message {
  font-size: 22px; 
  text-align: center;
  color: #333;
  margin-bottom: 30px;
}



</style>
