<template>
    <div class="screen">
        <Menu />
        <Logo title="PRE-PARTY HUB" />
        <HowTo :content="howto" :title="howTitle" :rules="rules" />

        <div class="play-area">
            <Link href="game" class="link">PLAY GAME</Link>
        </div>
        <div class="social-media">
            <a href="https://www.instagram.com/cyberz/" class="social-link">
                <img src="~/../../../public/assets/insta.webp" alt="">
            </a>
            <a href="https://www.tiktok.com/@cyberzcrew?_t=8ZwufvBftJ8&_r=1" class="social-link">
                <img src="~/../../../public/assets/tiktok.webp" alt="">
            </a>
        </div>
    </div>
</template>

<script>
import Logo from '../components/Logo.vue'
import Menu from '../components/Menu.vue'
import HowTo from '../components/HowTo.vue'
import {Link} from '@inertiajs/vue3'
import axios from 'axios';

export default {
    mounted() {
        axios.post('/api/visitor').then(response => {
            console.log(response.data);
        })
    },
    data() {
        return {
            images: {
                // insta: require('./assets/insta.webp')
            },
            howto: 'Jeden Monat gibt es neue Challenges, also keep on playing ;)',
            howTitle: 'How to Play:',
            rules: [
                '1. Wähle deine Geschmacksrichtung.',
                '2. Gib deinen Namen und den deiner Buddys ein.',
                '3. Die Challenge erscheint.',
                '4. Du und dein Buddy, der in der Aufgabe genannt wird, müsst gleichzeitig eine zufällige Zahl innerhalb des angegebenen Bereichs (Feld: Odds) sagen, nachdem der Countdown abgelaufen ist.',
                '5. Wenn ihr beide die gleiche Zahl sagt, müsst ihr die Herausforderung annehmen und die Challenge annehmen.',
                '6. Wenn ihr unterschiedliche Zahlen sagt, könnt ihr zur nächsten Aufgabe übergehen.'
            ]
        }
    },
    components: {
        Logo,
        Menu,
        Link,
        HowTo
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
        position: fixed;
        bottom: 0;
        width: 100%;
        display: flex;
        justify-content: space-evenly;
        margin: 20px 0;
        max-width: 480px;
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
