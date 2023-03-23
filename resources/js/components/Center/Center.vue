<template>
    <h1>Center ID: {{ id }}</h1>
    <router-link :to="{name:'home'}">Back home</router-link>
</template>

<script>


export default {
    data() {
        return {
            id: null
        }
    },

    mounted() {
    //   this.id = this.$route.params.id;
    },

    created() {
        this.id = this.$route.params.id;
        this.fetchCenterDoctors();
    },

    methods: {
        fetchCenterDoctors() {
            axios.get(`http://127.0.0.1:8000/api/center/${this.id}/doctors`).
            then( response => {
                console.log(response.data);
            }
            ).catch( error => console.log(error.message))
        }
    }
}

</script>