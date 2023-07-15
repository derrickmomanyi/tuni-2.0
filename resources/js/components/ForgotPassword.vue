<template>
     <div class="w-full max-w-xs m-auto mt-12" >
        
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <p class="text-sm italic">Input email associated with your account</p>
            <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2 mt-2 " for="email">
                Email
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Enter your email" v-model="formData.email">
            </div>  
            <p v-if="errors.email" class="text-red-700 mb-3 ml-4">{{ errors.email[0] }}</p>          
            <div class="flex items-center justify-between">
            <button @click="forgotPassword" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-8" type="button">
                Get 6-digit code
            </button>
            
            </div>
            
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
                    email: ''
                },
                errors: {}
            }
            
        },
        methods: {
            forgotPassword(){
                axios.post('http://127.0.0.1:8000/api/forgot_password', this.formData).then((response) => {
                    console.log(response);    
                    localStorage.setItem('reset_password_email', this.formData.email);  
                    toast.success("Check your email!", {
                    autoClose: 1000,
                    });    
                    setTimeout(() => {
                    this.$router.push('/reset_password');
                    }, 2000); // Redirect after a 1-second delay (adjust as needed)                         
                            
                  
                }).catch((errors) => {
                    this.errors = errors.response.data.errors
                    console.log(errors.response.data.errors)
                });
            }
        }
    }
</script>

<style scoped>

</style>