<template>
    <div class="doctor-container">
        <div class="doctor-section">Doctor with ID: {{ id }}</div>
        <h4>
            <router-link
                :to="{ name: 'center', params: { centerId: centerId } }"
                >back to Center</router-link
            >
        </h4>
    </div>
</template>

<script>
export default {
    data() {
        return {
            id: null,
            centerId: null,
        };
    },
    created() {
        this.id = this.$route.params.id;
        this.centerId = this.$route.params.centerId;
    },
};
</script>
