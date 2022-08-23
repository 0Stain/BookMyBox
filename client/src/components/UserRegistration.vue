<template>
<div class="container">
   <div class="row">
    <div class="col-md-6">

            <div class="alert alert-danger mt-4" v-if="errors.length">
            <ul class="mb-0">
                <li v-for="(error, index) in errors" :key="index">
                {{ error }}
                </li>
            </ul>
            </div>


        <form @submit.prevent="register" novalidate>
            <fieldset>
                
                <div class="form-group">
                    <label class="form-label mt-4">Full Name</label>
                    <input type="text" class="form-control" v-model="name" placeholder="Enter Full name">
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Email</label>
                    <input type="email" class="form-control" v-model="email" placeholder="Enter your email" >
                  
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Password</label>
                    <input type="password" class="form-control" v-model="password" placeholder="Enter Password">
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Confirm Password</label>
                    <input type="password" class="form-control" v-model="password_confirmation" placeholder="Re-enter Password">
                </div>
              
                <button class="btn btn-primary mt-4">Sign Up</button>
            </fieldset>
        </form>
    </div>
   </div>
</div>
</template>


<script>


import axios from 'axios';

export default {
    name: 'UserRegistration',
    data() {
        return {
            users: {},
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            errors: []
        
        }
    },
    
    methods: {
        
        async register() { 
            this.errors = [];
            if(!this.name) {
                this.errors.push("Name is required");
            }

            if(!this.email) {
                this.errors.push("Email is required")
            }
            
            // //check if provided email exists
            // const response = await axios.get(`http://127.0.0.1:8000/api/findEmail/${this.email}`);
            // if(response.data.length) {
            //     this.errors.push("Email already exists")
            // }
            
            if(!this.password) {
                this.errors.push("Password is required")
            }

            if(!this.password_confirmation) {
                this.errors.push("Confirm your password !")
            }

            if(this.password != this.password_confirmation) {
                this.errors.push("Password does not match")
            }
            
             if(!this.error) {
                let formData = new FormData();
                formData.append('name', this.name);
                formData.append('email', this.email);
                formData.append('password', this.password);
                formData.append('password_confirmation', this.password_confirmation);
                let url = 'http://127.0.0.1:8000/api/register';
                await axios.post(url, formData).then((response) => {
                    console.log(response);
                    if(response.status == 200) {
                        alert(response.data.message);
                    }
                });

             }

        }
    }
}  
</script>


