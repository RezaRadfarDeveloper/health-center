<template>
    <div class="doctor-container">
        <div class="doctor-section">Doctor with ID: {{ id }}</div>
        <img v-if="doctor" :src="doctor.image" alt="" />
        <h4>
            <router-link :to="{ name: 'center', params: { id: centerId } }"
                >back to Center</router-link
            >
        </h4>

        <div class="centers-list-doctor">
            <div
                v-for="center in centersList"
                :key="center.id"
                :center="center"
            >
                {{ center.id }} {{ center.name }}
                <img :src="setImgUrl(center.image.path)" alt="" />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            id: null,
            centerId: null,
            centersList: null,
            doctor: null,
            tempImg: "",
        };
    },
    created() {
        this.id = this.$route.params.id;
        this.centerId = this.$route.params.centerId;
        this.fetchDoctorCenters();
    },
    methods: {
        fetchDoctorCenters() {
            axios
                .get(`http://127.0.0.1:8000/api/doctor/${this.id}/centers`)
                .then((response) => {
                    const result = response.data;
                    this.tempImg = result.image.path;
                    this.doctor = {
                        age: result.age,
                        first_name: result.first_name,
                        last_name: result.last,
                        expertise: result.expertise,
                        id: this.id,
                        image: this.setImgUrl(this.tempImg),
                    };

                    this.centersList = result.centers;
                })
                .catch((error) => {
                    console.log(error.message);
                });
        },
        setImgUrl(img) {
            const ImgParts = img.split("/");

            return (
                "http://127.0.0.1:8000/storage/images/" +
                ImgParts[ImgParts.length - 1]
            );
        },
    },
};
</script>
