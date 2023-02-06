<template>
    <div class="screen">
        <Menu />
        <Logo title="PRE-PARTY HUB" />

        <div class="play-area">
            <Link href="/" class="link">PLAY GAME</Link>
        </div>
        <div class="social-media">
            <a href="#" class="social-link">INSTA</a>
            <a href="#" class="social-link">TIKTOK</a>
        </div>
        <div class="bottom-sheet">
            <div class="bottom-area">
                <p class="title">Bist du bereit fur CYBERZ?</p>
                <p class="content">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis vel fugit quo officia delectus aliquam eveniet!
                </p>
            </div>
        </div>

        <div class="bottom-link">
            <Link class="link-accept" href="/home">Ja, ich bin schon 16 Jahre oder alter</Link>
            <a class="link-wrong" href="https://www.bierbewusstgeniessen.de/">Nein, ledier noch nicht.</a>
        </div>
    </div>
</template>

<script>
import Logo from '../components/Logo.vue'
import Menu from '../components/Menu.vue'
import {Link} from '@inertiajs/vue3'

export default {
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

    .bottom-sheet {
        position: fixed;
        height: 65%;
        width: 100%;
        max-width: 480px;
        z-index: 99;
        bottom: 0;
        background: rgba(000, 000, 000, 0.8);
        border-top: 2px solid #ffffff;
    }

    .bottom-sheet .bottom-area {
        width: 90%;
        margin: 0 auto;
        margin-top: 80px;
    }

    .bottom-sheet .bottom-area .title {
        font-family: 'LemonMilkProUltraBold';
        color: #ffffff;
    }

    .bottom-sheet .bottom-area .content {
        color: #ffffff;
        margin-top: 40px;
    }

    .bottom-link {
        width: 100%;
        position: fixed;
        bottom: 40px;
        max-width: 480px;
        z-index: 888;
    }

    .bottom-link .link-accept {
        color: #ffffff;
        width: 90%;
        background-color: #8cdf27;
        display: block;
        text-align: center;
        text-decoration: none;
        padding: 15px 0;
        border-radius: 50px;
        border: 1px solid #ffffff;
        margin: 0 auto;
    }

    .bottom-link .link-wrong {
        color: #ffffff;
        width: 90%;
        background-color: #ff00a8;
        display: block;
        text-align: center;
        text-decoration: none;
        padding: 15px 0;
        border-radius: 50px;
        border: 1px solid #ffffff;
        margin: 0 auto;
        margin-top: 10px;
    }

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
</style>
