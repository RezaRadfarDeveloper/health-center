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
      this.id = this.$route.params.id;
    }
}

</script>