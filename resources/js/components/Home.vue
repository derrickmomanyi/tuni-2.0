<template>
    <div>
        <h1>Home page</h1>
        
        <div>
<h1>Home</h1>
<p >{{currentUser.email}}</p>
  </div>
 

    </div>
</template>

<script>
import axios from 'axios'
// import { toast } from 'vue3-toastify';
// import 'vue3-toastify/dist/index.css';

export default{
    
    data(){
    return{
    
      currentUser: {},
      token: localStorage.getItem('token')     
    }
  },
  mounted(){
    window.axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`    
    axios.get('http://127.0.0.1:8000/api/user').then((response) => {
        this.currentUser = response.data
    }).catch((errors) => {
        console.log(errors)
    })
    
  console.log('Token:', this.token);
  }
}
</script>

<style lang="scss" scoped>

</style>