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


        <form @submit.prevent="saveBooking" novalidate>
            <fieldset>
                
                <div class="form-group">
                    <label class="form-label mt-4">Booking Id</label>
                    <input type="text" class="form-control" v-model="id" placeholder="Enter  Id">
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Start Date</label>
                    <input type="datetime" class="form-control" v-model="t_start" placeholder="Enter Start Date">
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">End Date</label>
                    <input type="datetime" class="form-control" v-model="t_end" placeholder="Enter End Date">
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">User Id</label>
                    <input type="text" class="form-control" v-model="user_id" placeholder="Enter User Id">
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Box Id</label>
                    <input type="text" class="form-control" v-model="box_id" placeholder="Enter Box Id">
                </div>
                <button class="btn btn-primary mt-4">Submit</button>
            </fieldset>
        </form>
    </div>
   </div>
</div>
</template>


<script>


import axios from 'axios';

export default {
    name: 'AddBooking',
    data() {
        return {
            bookings: {},
            id: '',
            t_start: '',
            t_end: '',
            user_id: '',
            box_id: '',
            errors: []
        
        }
    },
    methods: {
        async saveBooking() { 
            this.errors = [];
            if(!this.id) {
                this.errors.push("Id ")
            }

            if(!this.t_start) {
                this.errors.push("Date required")
            }
            
            if(!this.t_end) {
                this.errors.push("Date required")
            }

            if(!this.user_id) {
                this.errors.push("User Id required")
            }

            if(!this.box_id) {
                this.errors.push("Box Id required")
            }
            
             if(!this.error) {
                let formData = new FormData();
                formData.append('id', this.id);
                formData.append('t_start', this.t_start);
                formData.append('t_end', this.t_end);
                formData.append('user_id', this.user_id);
                formData.append('box_id', this.box_id);
                let url = 'http://127.0.0.1:8000/api/saveBooking';
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


