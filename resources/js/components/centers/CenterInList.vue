<template>
    <div class="center">
        <img class="center__img" :src="centerLogo" alt="Not found" />
        <i class="center__like fa-regular fa-heart"></i>
        <h5 class="center__name">{{ center.name }}</h5>
        <div class="center__location">
            <i class="fa-solid fa-location-dot"></i>
            <p>Carlton</p>
        </div>
        <div class="center__doctor">
            <i class="fa-solid fa-user-doctor"></i>
            <p>350</p>
        </div>
        <div class="center__medical">
            <i class="fa-solid fa-hospital"></i>
            <p>Carlton</p>
        </div>
        <div class="center__price">
            <i class="fa-solid fa-location-dot"></i>
            <p>Carlton</p>
        </div>
        <button class="btn center__btn">
            <router-link
                class="btn-click"
                :to="{ name: 'center', params: { id: center.id } }"
                >Visit Center</router-link
            >
        </button>
    </div>
</template>

<script>
export default {
    props: ["center"],

    data() {
        return {
            centerLogo: "",
        };
    },

    created() {
        this.setCenter();
    },

    methods: {
        setCenter() {
            const centerProps = this.center.path.split("/");
            this.centerLogo =
                "http://127.0.0.1:8000/storage/images/" +
                centerProps[centerProps.length - 1];
        },
    },
};
</script>
