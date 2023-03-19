<template>
    <div class="search-container">
        <input type="text" @keyup="sendTerm()" class="search" v-model="searchTerm">
        <i class="search-icon fa-solid fa-magnifying-glass"></i>
    </div>
</template>
<script>

export default {

    data() {
        return {
            searchTerm: ''
        }
    },

    methods: {
        sendTerm() {
            if(this.searchTerm.length >= 3)
            this.$emit('searchStart',this.searchTerm);
        }
    }


}
</script>