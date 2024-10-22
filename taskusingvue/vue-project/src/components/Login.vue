<template>
    <div class="form-container">

<h2 class="text-center mb-4">Login</h2>

<form>
 <div class="mb-3">
    <label for="email" class="form-label" >Email address</label>
    <input type="email" class="form-control" id="email" placeholder="Enter your email" v-model="email" >
  </div>


  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Enter your password" v-model="password" >
  </div>


  <button type="submit" class="btn btn-primary w-100" v-on:click="login">Login</button>

<router-link to="/sign-up" class="btn btn-secondary w-100 mt-3">Signup</router-link>

</form>
</div>
</template>


<script>
import axios from 'axios'
export default{
    name:'Login',
    data() {
    return {
    email: '',
    password: ''
    }
  },
  methods:{
    async login()
    {
let result=await axios.get(
    `http://localhost:3000/users?email=${this.email}&password=${this.password}`
)

console.log(result)
if(result.status==200 && result.data.length>0){
    localStorage.setItem("user-info", JSON.stringify(result.data[0]))
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
}

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