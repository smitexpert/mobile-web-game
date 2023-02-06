<script>
export default {
    props: {
        title: null
    }
}
</script>

<template>
    <div class="logo-area">
        <img class="logo" src="~/../../../public/assets/logo.webp" alt="">
        <p class="logo-slug">{{ title }}</p>
    </div>
</template>

<style scoped>

.logo-area {
    width: 100%;
    height: auto;
    text-align: center;
    max-width: 480px;
    margin: 20px auto;
}

.logo {
        width: 90%;
        height: auto;
    }

.logo-slug {
    font-family: 'LemonMilkProUltraBold';
    font-weight: bolder;
    font-size: 24px;
    color: #ffffff;
    margin: 0;
    margin-top: 5px;
}
</style>
