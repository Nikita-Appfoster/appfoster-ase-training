<template>
  <div class="form-container">

    <h2 class="text-center mb-4">Sign Up</h2>

    <form>
     
      <div class="mb-3">
        <label for="name" class="form-label" >Full Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter your full name" v-model="name" >
      </div>

  
      <div class="mb-3">
        <label for="email" class="form-label" >Email address</label>
        <input type="email" class="form-control" id="email" placeholder="Enter your email" v-model="email" >
      </div>


      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Enter your password" v-model="password" >
      </div>


      <button type="submit" class="btn btn-primary w-100" v-on:click="signUp">Sign Up</button>

<router-link to="/login" class="btn btn-secondary w-100 mt-3">Login</router-link>

    </form>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  name: 'SignUp',
  data() {
    return {
      name: '',
      email: '',
      password: ''
    }
  },
  methods:{
   async signUp(){
     let result=await axios.post("http://localhost:3000/users",{
email:this.email,
password:this.password,
name:this.name
     });
     console.log(result);
     if(result.status==201){
    localStorage.setItem("user-info", JSON.stringify(result.data))
    this.$router.push({name:'Index'})
     }
    }
  },
  mounted(){
    let user=localStorage.getItem('user-info')
    if (user){
      this.$router.push({name:'Index'})
    }
  }
};
</script>

<style scoped>
.form-container {
  max-width: 400px;
  margin: 50px auto;
  padding: 20px;
  background-color: #f9f9f9;
  border-radius: 10px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}


.form-label {
  font-weight: bold;
}

h2 {
  color: #333;
}


.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
}

.btn-primary:hover {
  background-color: #0056b3;
  border-color: #004085;
}
</style>