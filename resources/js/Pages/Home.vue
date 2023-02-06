<template>
    <div class="screen">
        <Menu />
        <Logo title="PRE-PARTY HUB" />

        <div class="play-area">
            <Link href="game" class="link">PLAY GAME</Link>
        </div>
        <div class="social-media">
            <a href="#" class="social-link">
                <img src="~/../../../public/assets/insta.webp" alt="">
            </a>
            <a href="#" class="social-link">
                <img src="~/../../../public/assets/tiktok.webp" alt="">
            </a>
        </div>
    </div>
</template>

<script>
import Logo from '../components/Logo.vue'
import Menu from '../components/Menu.vue'
import {Link} from '@inertiajs/vue3'

export default {
    data() {
        return {
            images: {
                // insta: require('./assets/insta.webp')
            }
        }
    },
    mounted() {
        console.log(this.$device);
    },
    components: {
        Logo,
        Menu,
        Link
    },
    methods: {
        routeToGame() {
            window.location.replace('/game');
        }
    }
}

</script>


<style scoped>
    .play-area {
        width: 100%;
        text-align: center;
        margin-top: 160px;
    }

    .play-area .link {
        font-family: 'LemonMilkProSemiBold';
        background: none;
        border: none;
        font-size: 28px;
        padding: 20px 40px;
        border-radius: 500px;
        color: #ffffff;
        background: rgb(169,250,68);
        background: linear-gradient(90deg, rgba(169,250,68,1) 0%, rgba(255,0,168,1) 100%);
        text-decoration: none;
    }

    .social-media {
        position: absolute;
        bottom: 0;
        width: 100%;
        display: flex;
        justify-content: space-evenly;
        margin: 20px 0;
    }

    .social-media .social-link {
        width: 90px;
        height: auto;
    }
    .social-media .social-link img {
        width: 100%;
        height: auto;
        overflow: hidden;
        border-radius: 20px;
    }
</style>
