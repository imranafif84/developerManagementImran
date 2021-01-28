<template>
    <div>
        <h3 class="text-center">Edit Developer</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateDeveloper">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" v-model="developer.firstname">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" v-model="developer.lastname">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="developer.email">
                    </div>
                    <div class="form-group">
                        <label>Phone No</label>
                        <input type="text" class="form-control" v-model="developer.phoneno">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" v-model="developer.address">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="text" class="form-control" v-model="developer.image">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit Developer</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                developer: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/developer/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.developer = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updateDeveloper() {
                this.axios
                    .post(`http://localhost:8000/api/developer/update/${this.$route.params.id}`, this.developer)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>