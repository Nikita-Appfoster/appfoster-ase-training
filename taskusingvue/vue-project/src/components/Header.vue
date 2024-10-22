<template>
  <nav class="navbar">
    <ul>
      <li><router-link to="/">Home</router-link></li>
      <li><router-link to="/add">Add</router-link></li>

      <li v-on:click="logout">Logout</li>
    </ul>
  </nav>
</template>
<script>
export default{
    name:'Header', 
    methods:{
logout(){
    localStorage.clear();
    this.$router.push({name:'Login'})
}
    }
}
</script>

<style scoped>
.navbar {
  background-color: black;
  color: white;
  padding: 10px;
}

.navbar ul {
  list-style: none;
  display: flex;
  justify-content: space-around;
  margin: 0;
  padding: 0;
}

.navbar li {
  cursor: pointer;
  color: white; 
}

.navbar li a {
  color: white; 
  text-decoration: none;
}

.navbar li:hover {
  text-decoration: underline; 
}
</style>