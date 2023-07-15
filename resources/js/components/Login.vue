<template>
    <div class="w-full max-w-xs m-auto mt-12" >
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Email
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Enter your email" v-model="formData.email">
            </div>
            <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="********"  v-model="formData.password">
            <!-- <p class="text-red-500 text-xs italic">Please choose a password.</p> -->
            <p v-if="errors.message" class="text-red-500 mb-3">{{ errors.message }}</p>
            </div>
             
            <div class="flex items-center justify-between">
            <button @click="login" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                Login
            </button>
            <router-link to="/register" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" >
                Don't have an account?
            </router-link>
            </div>
            <router-link to="/forgotpassword" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800 ml-28" >
                Forgot Password?
            </router-link>
        </form>
  
    </div>
</template>

<script>
import axios from 'axios'
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

 export default {
        data(){
            return {
                formData: {
                    email: '',
                    password: '',
                    device_name: 'browser'
                },
                errors: {}
            }
        },
        methods: {
            login(){
                axios.post('http://127.0.0.1:8000/api/login', this.formData) .then((response) => {
        localStorage.setItem('token', response.data.token);
        // Show the toast after successful login and redirect after a slight delay
        toast.success("Welcome!", {
          autoClose: 1000,
        });
        setTimeout(() => {
          this.$router.push('/');
        }, 1000); // Redirect after a 1-second delay (adjust as needed)
      })                    
                  
                .catch((error) => {
                    this.errors = error.response.data;
                    console.log(error.response.data.message);
                })
               
            }
        }

       
    }
</script>

<style lang="scss" scoped>

</style>