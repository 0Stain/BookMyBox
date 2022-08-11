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


        <form @submit.prevent="updateBooking" novalidate>
            <fieldset>
                
                <div class="form-group">
                    <label class="form-label mt-4">Booking Id</label>
                    <input type="text" class="form-control" 
                    v-model="booking.id" placeholder="Enter  Id">
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Start Date</label>
                    <input type="datetime" class="form-control" v-model="booking.t_start" placeholder="Enter Start Date">
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">End Date</label>
                    <input type="datetime" class="form-control" v-model="booking.t_end" placeholder="Enter End Date">
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">User Id</label>
                    <input type="text" class="form-control" v-model="booking.user_id" placeholder="Enter User Id">
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Box Id</label>
                    <input type="text" class="form-control" v-model="booking.box_id" placeholder="Enter Box Id">
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
    name: 'EditBooking',
    data() {
        return {
            booking: {},
            id: '',
            t_start: '',
            t_end: '',
            user_id: '',
            box_id: '',
            errors: []
        
        }
    },

    created() {
        this.getBookingById();
        
    },

    methods: {

        async getBookingById() {
                
            let url= `http://127.0.0.1:8000/api/geditBooking/${this.$route.params.id}`;
            await axios.get(url).then(response => {
                console.log(response);
                this.booking = response.data;
            });
        },
    
    

    async updateBooking() {
        
            this.errors = [];
            if(!this.booking.id) {
                this.errors.push("Id ")
            }

            if(!this.booking.t_start) {
                this.errors.push("Date required")
            }
            
            if(!this.booking.t_end) {
                this.errors.push("Date required")
            }

            if(!this.booking.user_id) {
                this.errors.push("User Id required")
            }

            if(!this.booking.box_id) {
                this.errors.push("Box Id required")
            }
            
             if(!this.error) {
                let formData = new FormData();
                formData.append('id', this.booking.id);
                formData.append('t_start', this.booking.t_start);
                formData.append('t_end', this.booking.t_end);
                formData.append('user_id', this.booking.user_id);
                formData.append('box_id', this.booking.box_id);
                let url = `http://127.0.0.1:8000/api/updateBooking/${this.$route.params.id}`;
                await axios.post(url, formData).then((response) => {
                    console.log(response);
                    if(response.status == 200) {
                        alert(response.data.message);
                    } else {
                        console.log('error');
                    }
                }).catch(error => {
                    this.errors.push(error.response);
                });

             }

        
    },
    },

    mounted: function() {
        console.log('Edit component mounted successfully');
    }
}  
</script>


