<template>
    <div class="doctor-item">
        <router-link
            :to="{
                name: 'doctor',
                params: { id: doctor.id, centerId: centerId },
            }"
        >
            <img
                :src="setImgUrl(doctor.image.path)"
                alt=""
                class="doctor-item__image"
            />
            <div class="doctor-item__info">
                <h4>{{ doctor.first_name }} {{ doctor.last }}</h4>
                <p>{{ doctor.expertise }}</p>
            </div>
        </router-link>
    </div>
</template>
<script>
import { imgUrlConverter } from "../../mixins/imgUrlConverter";
export default {
    mixins: [imgUrlConverter],
    props: ["doctor"],

    data() {
        return {
            centerId: null,
        };
    },

    created() {
        this.centerId = this.$route.params.id;
    },
};
</script>
