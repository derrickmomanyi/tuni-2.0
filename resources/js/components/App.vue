<template>

<nav class="ml-10 mr-10 mt-2 rounded-lg">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-8 w-15" src="https://tuni.ke/images/tuni-home.gif" alt="Your Company">
          </div>
          <div class="hidden md:block">
            <div class="ml-20 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <router-link to="/" class="nav-link active text-blue-600 hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium ml-10">Home</router-link>
              <!-- <a href="#" class="text-blue-600 hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium ml-10">Adopt</a>
              <a href="#" class="text-blue-600 hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium ml-10">Lost and Found</a>
              <a href="#" class="text-blue-600 hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium ml-10">Add Pet</a>
              <a href="#" class="text-blue-600 hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium ml-10">Services</a> -->
              <router-link to="/addgame" class="text-blue-600 hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium ">Add Game</router-link>
              <router-link to="/register"  class="text-blue-600 hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium ">Register</router-link>
              <router-link to="/login"  class="text-blue-600 hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium ">Login</router-link>
              
              <button @click="logout" v-if="token" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                Logout
            </button>
            </div>
          </div>
        </div>              
      </div>
    </div>

  </nav>
    
    <router-view/>
</template>

<script>

import  axios from 'axios';
export default {
  
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
  },
  methods: {  
      logout(){
          axios.post('http://127.0.0.1:8000/api/logout').then((response) => {
              localStorage.removeItem('token')              
              this.$router.push('/login')
              
          }).catch((errors) => {
              console.log(errors)
          })
      }
  }
};
</script>

<style lang="scss" scoped>

</style>