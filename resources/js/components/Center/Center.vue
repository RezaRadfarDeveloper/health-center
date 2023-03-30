<template>
    <div class="center-container">
        <div class="center-section">
            <h1>Center ID: {{ id }}</h1>
            <router-link :to="{ name: 'home' }">Back home</router-link>
        </div>
        <div class="doctors-list">
            <doctor-in-list
                v-for="doctor in doctorsList"
                :key="doctor.id"
                :doctor="doctor"
            ></doctor-in-list>
        </div>
    </div>
</template>

<script>
import DoctorInList from "../Doctor/DoctorInList.vue";

export default {
    components: {
        DoctorInList,
    },

    data() {
        return {
            id: null,
            doctorsList: [],
        };
    },

    created() {
        this.id = this.$route.params.id;
        this.fetchCenterDoctors();
    },

    methods: {
        fetchCenterDoctors() {
            axios
                .get(`http://127.0.0.1:8000/api/center/${this.id}/doctors`)
                .then((response) => {
                    console.log(response.data);
                    this.doctorsList = response.data;
                })
                .catch((error) => console.log(error.message));
        },
    },
};
</script>
