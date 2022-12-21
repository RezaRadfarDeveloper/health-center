<template> 
    <section class="centers">
       <Center v-for="center in centersCount" :center="center" :key="center.id"></Center>
       
    </section>
</template>


<script>
import Center from './Center.vue';

export default {
components: {
        Center
},
    data() {
        return {
            image: null,
            centersCount: []
        }
    },
    methods: {

        getImage() {
            axios.get('http://127.0.0.1:8000/api/centers').then((response) =>
            {
                console.log(response.data.length);
                this.centersCount = response.data;

            }).catch((errors) => {
                console.log(errors);
            });
        }
    },
    mounted() {
            this.getImage();
    }
}
</script>