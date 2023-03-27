<template>
    <div class="doctor-item">
        <img src="" alt="" class="doctor-item__image" />
        <h3>{{ doctor.first_name }}</h3>
        <p>{{ doctor.age }}</p>
    </div>
</template>
<script>
export default {
    props: ["doctor"],
};
</script>
