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
            <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password_confirmation" type="password_confirmation" placeholder="Re-Enter your password" name="password_confirmation" v-model="formData.password_confirmation">
            <!-- <p class="text-red-700" v-text="errors.password"></p> -->
           </div>

           <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="code">
                Input 6 digit code
            </label>
            <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="code" type="code" placeholder="Enter 6 digit code" name="code" v-model="formData.code">
            <!-- <p class="text-red-700" v-text="errors.password"></p> -->
           </div>
            <button @click="resetPassword" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-8" type="button">
                Reset Password
            </button>
            
           
            
        </form>
    </div>
    
</template>

<script>
import axios from 'axios'
 export default {
        data(){
            return {
                formData: {
                    password: '',
                    password_confirmation: '', 
                    code: '',                 
                    device_name: 'browser'
                },
                errors: {}
            }
            
        },
        methods: {
            resetPassword(){
                axios.post('http://127.0.0.1:8000/api/reset_password', formData)
                .then((response) => {
                // Handle successful password reset (e.g., show success message or redirect)
                })
                .catch((error) => {
                this.errors = error.response.data.errors;
                console.log(error.response.data.errors);
                }); 
               
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>