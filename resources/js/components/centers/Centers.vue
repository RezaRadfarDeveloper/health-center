<template> 
    <section class="centers">
        <Loader v-if="loading"></Loader>
        <center-in-list v-else v-for="center in centersCount" :center="center" :key="center.id"></center-in-list>       
    </section>
</template>


<script>
import CenterInList from './CenterInList';
import Loader from '../subcomponents/Loader';

export default {
components: {
        CenterInList,
        Loader
},
    data() {
        return {
            image: null,
            centersCount: [],
            loading: false
        }
    },
    methods: {

        fetchCenters() {
            axios.get('/api/centers').
            then((response) =>
            {
                console.log(response.data.length);
                this.centersCount = response.data;
                this.loading = false;
            })
            .catch((errors) => 
            {
                this.loading = false;
                console.log(errors);
            });
        }
    },
    mounted() {
        this.loading = true;
        setTimeout(() =>
        this.fetchCenters(),
        1500);
            
    }
}
</script>