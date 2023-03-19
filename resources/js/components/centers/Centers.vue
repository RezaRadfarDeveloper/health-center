<template>
    <Search @searchStart="searchResult"></Search>
    <section class="centers">
        <Loader v-if="loading"></Loader>
        <center-in-list v-else v-for="center in centersList" :center="center" :key="center.id"></center-in-list>       
    </section>
    <button v-if="nextUrl" class="btnLoadMore" @click.prevent="loadMore(nextUrl)">Load more</button>
</template>


<script>
import CenterInList from './CenterInList';
import Search from  '../Search';
import Loader from '../subcomponents/Loader';

export default {
components: {
        CenterInList,
        Loader,
        Search
},
    data() {
        return {
            image: null,
            centersList: [],
            loading: false,
            nextUrl: null
        }
    },
    methods: {

        fetchCenters() {
            axios.get('/api/centers').
            then((response) =>
            {
               
                this.nextUrl = response.data.next_page_url;
                this.centersList = response.data.data;
                this.loading = false;
            })
            .catch((errors) => 
            {
                this.loading = false;
                console.log(errors);
            });
        },

        loadMore(nextUrl) {
            
            axios.get(`${this.nextUrl}`).
            then((response) => {

               this.nextUrl = response.data.next_page_url;
               this.centersList.push(...response.data.data)

            }).catch(errors => {
                console.log(errors); 
            })
        },

        searchResult(searchTerm) {

            axios.get(`/api/centers-search?searchTerm=${searchTerm}`).
            then((response) => {

                this.centersList = response.data;
            }).catch(error => console.log(error));

        }
    },
    created() {

            this.loading = true;
            setTimeout(() =>

            this.fetchCenters(),
            1000);
            
        }
}
</script>
