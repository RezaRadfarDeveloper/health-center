<template>
    <div class="doctor-item">
        <router-link
            :to="{
                name: 'doctor',
                params: { id: doctor.id, centerId: centerId },
            }"
        >
            <img :src="doctorImg" alt="" class="doctor-item__image" />
            <div class="doctor-item__info">
                <h4>{{ doctor.first_name }} {{ doctor.last }}</h4>
                <p>{{ doctor.expertise }}</p>
            </div>
        </router-link>
    </div>
</template>
<script>
export default {
    props: ["doctor"],

    data() {
        return {
            doctorImg: "",
            centerId: null,
        };
    },

    created() {
        this.setImgUrl();
        this.centerId = this.$route.params.id;
    },

    methods: {
        setImgUrl() {
            const doctorImgParts = this.doctor.img.split("/");

            this.doctorImg =
                "http://127.0.0.1:8000/storage/images/" +
                doctorImgParts[doctorImgParts.length - 1];
        },
    },
};
</script>
