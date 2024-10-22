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
  font-size: 28px; /* Larger font size for title */
  font-weight: bold;
  color: #333;
}

.restaurant-form {
  max-width: 600px; /* Increased width for better visual balance */
  margin: 0 auto;
  padding: 30px; /* More padding for a spacious feel */
  background-color: #ffffff;
  border-radius: 12px; /* Smoother border radius */
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15); /* Slightly stronger shadow for a modern look */
  transition: all 0.3s ease-in-out; /* Smooth transition for hover effects */
}

.restaurant-form:hover {
  box-shadow: 0 6px 30px rgba(0, 0, 0, 0.2); /* Slightly larger shadow on hover */
}

.form-label {
  font-weight: bold;
  font-size: 16px; /* Larger font size for labels */
  color: #333;
}

.form-control {
  font-size: 16px; /* Uniform font size for inputs */
  padding: 10px;
  border-radius: 8px; /* Rounded corners for inputs */
  border: 1px solid #ced4da;
  box-shadow: none; /* Remove default input shadows */
  transition: all 0.2s ease-in-out; /* Smooth transition for input focus */
}

.form-control:focus {
  border-color: #007bff; /* Blue border on focus */
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); /* Focused input shadow */
}

.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
  padding: 10px 20px;
  font-size: 18px; /* Larger button text */
  border-radius: 8px;
  width: 100%; /* Full-width button */
  transition: all 0.2s ease-in-out;
}

.btn-primary:hover {
  background-color: #0056b3;
  border-color: #004085;
  transform: translateY(-2px); /* Slight lift on hover */
}

.mb-4 {
  margin-bottom: 1.5rem;
}

/* Additional space between elements */
.welcome-message {
  font-size: 22px; /* Consistent font size */
  text-align: center;
  color: #333;
  margin-bottom: 30px;
}

/* Media query for responsive adjustments */
@media (max-width: 768px) {
  .restaurant-form {
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  }

  .form-title {
    font-size: 24px;
  }

  .btn-primary {
    font-size: 16px;
  }
}
</style>
