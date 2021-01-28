<template>
    <div>
        <h3 class="text-center">All Developers</h3><br/>
        <div class="row" style="margin-bottom: 10px;">
            <div class="col-md-2">
                <router-link to="/add" class="nav-item nav-link">Add Developer</router-link>
            </div>
            <div class="col-md-2">
                <button type="button" @click="deleteDevelopers" class="btn btn-danger">Delete Developer/s</button>
            </div>
            <div class="col-md-8"></div>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th><input type="checkbox" @click="select_all_via_check_box" v-model="all_select"></th>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Address</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="developer in developers" :key="developer.id">
                <td><input type="checkbox" v-model="deleteItems" :value="`${developer.id}`"></td>
                <td>{{ developer.id }}</td>
                <td>{{ developer.firstname }}</td>
                <td>{{ developer.lastname }}</td>
                <td>{{ developer.email }}</td>
                <td>{{ developer.phoneno }}</td>
                <td>{{ developer.address }}</td>
                <td>{{ developer.image }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: developer.id }}" class="btn btn-primary">Edit</router-link>
                        <button type="button" @click="deleteDeveloper(developer.id)" class="p-1 mx-3 float-right btn btn-danger">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                developers: [],
                deleteItems: [],
                select: '',
                all_select: false
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/developers')
                .then(response => {
                    this.developers = response.data;
                });
        },
        methods: {
            deleteDeveloper(id) {
                this.axios
                    .delete(`http://localhost:8000/api/developer/delete/${id}`)
                    .then(response => {
                        let i = this.developers.map(item => item.id).indexOf(id); // find index of your object
                        this.developers.splice(i, 1)
                    });
            },

            deleteDevelopers() {
                axios.post('http://localhost:8000/api/developer/deletedevs/'+this.deleteItems)
                     .then((response) => {
                        this.developers
                        this.deleteItems = []
                        this.all_select == true ? 
                             this.all_select = false : this.all_select = true;
                     })
            },
            select_all_via_check_box(){
                if(this.all_select == false){
                    this.all_select = true
                    this.developers.forEach(developer => {
                      this.deleteItems.push(developer.id)
                    });
                }else{
                    this.all_select = false
                    this.deleteItems = []
                }
            }


        }
    }
</script>