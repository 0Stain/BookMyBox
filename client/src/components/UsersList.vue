<template>
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                
            </tr>
        </thead>
        <tbody v-for="user in users" :key="user.id">
            <tr class="table-secondary">
                <th scope="row">{{ user.id }}</th>
                <th scope="row">{{ user.name }}</th>
                <th scope="row">{{ user.email }}</th>
               
                
            </tr>
        </tbody>
    </table>
    
</div>
</template>


<script>
import axios from 'axios';
export default {
    name: 'UsersList',
    data() {
        return {
            users:Array,
        }
    },
    created() {
        this.getUsers();
    },
    methods: {
        async getUsers()  {
            let url = 'http://127.0.0.1:8000/api/getUsers';
            await axios.get(url).then(response => {
                this.users = response.data;
                console.log(this.users);
            }).catch(console.error());
        }
    },
    mounted() {
        console.log('Users list Component mounted');
    }
} 
</script>


