<template> 
    <section class="centers">
       <Center></Center>
       <Center></Center>
       <Center></Center>
       <Center></Center>
       <Center></Center>
       <Center></Center>
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
            image: null
        }
    },
    methods: {

        getImage() {
            axios.get('http://127.0.0.1:8000/api/centers').then((response) =>
            {
                console.log(response.data);
                this.image = response.data;

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