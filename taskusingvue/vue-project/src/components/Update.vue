<template>
  <div>
    <h2 class="welcome-message">Hello, Welcome to the update page</h2>
    <form class="restaurant-form">
      <div class="mb-4">
        <label for="name" class="form-label">Restaurant Name</label>
        <input type="text" id="name" v-model="name" class="form-control" placeholder="Enter restaurant name" required />
      </div>

      <div class="mb-4">
        <label for="address" class="form-label">Address</label>
        <input type="text" id="address" v-model="address" class="form-control" placeholder="Enter restaurant address"
          required />
      </div>

      <div class="mb-4">
        <label for="contact" class="form-label">Contact Number</label>
        <input type="tel" id="contact" v-model="contact" class="form-control" placeholder="Enter contact number"
          required />
      </div>

      <button type="button" class="btn btn-primary" v-on:click="updateRest">Update Restaurant</button>
    </form>

  </div>
</template>

<script>
import Header from './Header.vue';
import axios from 'axios';
export default {
  name: 'Update',
  components: {
    Header
  },
  data() {
    return {
      name: '',
      address: '',
      contact: ''
    }
  },
  async mounted() {

    let user = localStorage.getItem('user-info');

    if (!user) {
      this.$router.push({ name: 'SignUp' });
    }
    const result = await axios.get('http://localhost:3000/restaurant/' + this.$route.params.id)
    this.name = result.data.name
    this.address = result.data.address
    this.contact = result.data.contact
  },
  methods: {
    async updateRest() {
      const result = await axios.put("http://localhost:3000/restaurant/"  + this.$route.params.id, {
        name: this.name,
        address: this.address,
        contact: this.contact

      })
      if (result.status == 200) {
        this.$router.push({ name: 'Index' });
      }
    }


  }
}

</script>

<style scoped>
.form-title {
  text-align: center;
  margin: 20px 0;
  font-size: 24px;
  color: #333;
}

.restaurant-form {
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f9f9f9;
  border-radius: 10px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.form-label {
  font-weight: bold;
}

.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
}

.btn-primary:hover {
  background-color: #0056b3;
  border-color: #004085;
}


.mb-4 {
  margin-bottom: 1.5rem;
}
</style>