<template>
    <div class="center-container">
        <div class="center-section">
            <h1>Center ID: {{ id }}</h1>
            <img v-if="center" :src="center.image" alt="" />
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
import { imgUrlConverter } from "../../mixins/imgUrlConverter.js";

export default {
    mixins: [imgUrlConverter],
    components: {
        DoctorInList,
    },

    data() {
        return {
            id: null,
            doctorsList: [],
            center: null,
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
                    const result = response.data;
                    this.tempImg = result.image.path;

                    this.center = {
                        name: result.name,
                        city: result.city,
                        address: result.address,
                        phone: result.phone,
                        state: result.state,
                        image: this.setImgUrl(this.tempImg),
                    };
                    this.doctorsList = response.data.doctors;
                })
                .catch((error) => console.log(error.message));
        },
    },
};
</script>
