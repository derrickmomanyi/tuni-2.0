<template>
    <div class="w-full max-w-xs m-auto mt-12" >
     <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-6">
   
            <!-- <p class="text-sm italic">Enter New Password</p> -->
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                New Password
            </label>
            <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="Enter your passsword" name="password" v-model="formData.password">
            <!-- <p class="text-red-700" v-text="errors.password"></p> -->
            </div>

            <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password Confirmation
            </label>
            <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password_confirmation" type="password" placeholder="Re-Enter your password" name="password_confirmation" v-model="formData.password_confirmation">
           
           </div>

           <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="code">
                Input 6 digit code
            </label>
            <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="code" type="text" placeholder="Enter 6 digit code" name="code" v-model="formData.code">
            <p v-if="errors.message" class="text-red-500 mb-3">{{ errors.message }}</p>
            <p v-if="codeError.error" class="text-red-500 mb-3">{{ codeError.error }}</p>
            
           </div>
            <button @click="resetPassword" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-8" type="button">
                Reset Password
            </button>
            
           
            
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
                    email:  localStorage.getItem('reset_password_email'),
                    password: '',
                    password_confirmation: '', 
                    code: '',                 
                    // device_name: 'browser'
                },
                errors: {},
                codeError: {},
                
            }
            
        },
         methods: {
            resetPassword(){
                console.log(this.formData);
                axios.post('http://127.0.0.1:8000/api/reset_password', this.formData)
                .then((response) => {
                // Handle successful password reset (e.g., show success message or redirect)
                console.log(response.data.message);
                 // Clear localStorage after successful reset
                 localStorage.removeItem('reset_password_data');
                 toast.success("Password reset successfully!", {
                    autoClose: 1500,
                    });  
                setTimeout(() => {
                    this.$router.push('/login');
                    }, 2000); // Redirect after a 1-second delay (adjust as needed)  
                
                

                })
                .catch((error) => {
                
                this.errors = error.response.data;
                this.codeError = error.response.data;
                console.log(error.response.data);
                }); 
               
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>