<template>
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">User Id</th>
                <th scope="col">Box Id</th>
                <th scope="col">Action</th>
                
            </tr>
        </thead>
        <tbody v-for="booking in bookings" v-bind:key="booking.id">
            <tr class="table-secondary">
                <th scope="row">{{ booking.id }}</th>
                <th scope="row">{{ booking.t_start }}</th>
                <th scope="row">{{ booking.t_end }}</th>
                <th scope="row">{{ booking.user_id }}</th>
                <th scope="row">{{ booking.box_id }}</th>
                <th scope="row"><router-link :to="{ name:'EditBooking', params:{id: booking.id} }" class="btn btn-primary btn-sm" v-on:click="getBookingById(booking.id)">Edit Booking</router-link></th>
                <th scope="row"><button class="btn btn-danger btn-sm" v-on:click="deleteBooking(booking.id)">Delete Booking</button></th>
            </tr>
        </tbody>
    </table>    
    
</div>
</template>


<script>
import axios from 'axios';
export default {
    name: 'BookingsList',
    data() {
        return {
            bookings:Array,
            
        }
    },
    created() {
        this.getBookings();
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
        async getBookings()  {
            let url = 'http://127.0.0.1:8000/api/getBookings';
            await axios.get(url).then(response => {
                this.bookings = response.data;
                console.log(this.bookings);
            }).catch(error => {
                console.log(error);
            });
        },
        
    async deleteBooking(id) {
        let url = `http://127.0.0.1:8000/api/deleteBooking/${id}`;
        await axios.delete(url).then(response => {
            if(response.data.code == 200) {
                alert('Booking deleted successfully');
                this.getBookings();
            }
        }).catch(error => {
            console.log(error);
        });
    }
    
    },
    mounted() {
        console.log('Bookings list Component mounted');
    }
} 
</script>


