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
                <p class="title">Bist du bereit fÜr CYBERZ?</p>
                <p class="content">
                    Musst du mindestens 16 Jahre oder älter sein. Bist du alt genug?
                </p>
            </div>
        </div>

        <div class="bottom-link">
            <Link class="link-accept" href="/home">Ja, ich bin schon 16 Jahre alt oder älter</Link>
            <a class="link-wrong" href="https://www.bierbewusstgeniessen.de/">Nein, leider noch nicht</a>
        </div>

        <template v-if="ispop">
            <div class="pop-up">
                <div class="pop-body">
                    <h2>Cookie-Zustimmung verwalten</h2>
                    <p>Um dir ein optimales Erlebnis zu bieten, verwenden wir Technologien wie Cookies, um Geräteinformationen zu speichern und/oder darauf zuzugreifen. Wenn du diesen Technologien zustimmst, können wir Daten wie das Surfverhalten oder eindeutige IDs auf dieser Website verarbeiten. Wenn du deine Zustimmung nicht erteilst oder zurückziehst, können bestimmte Merkmale und Funktionen beeinträchtigt werden.</p>
                    <div class="pop-up-btn">
                        <button @click="closePopUp" class="pop-btn info">Akzeptieren</button>
                        <button @click="closePopUp" class="pop-btn">Ablehnen</button>
                    </div>
                    <div class="pop-up-btn link">
                        <a href="https://www.radeberger-gruppe.de/impressum-und-datenschutz/" class="pop-btn">Datenschutzerklärung</a>
                        <a href="https://www.radeberger-gruppe.de/impressum-und-datenschutz/impressum.html" class="pop-btn">Impressum</a>
                    </div>
                </div>
            </div>
        </template>
    </div>
</template>

<script>
import Logo from '../components/Logo.vue'
import Menu from '../components/Menu.vue'
import {Link} from '@inertiajs/vue3'

export default {
    mounted() {
        if(this.$cookies.get('confirmCookies') == null) {
            this.ispop = true;
        }
    },
    data() {
        return {
            ispop: false,
        }
    },
    components: {
        Logo,
        Menu,
        Link
    },
    methods: {
        routeToGame() {
            window.location.replace('/game');
        },
        closePopUp() {
            this.ispop = false;
            this.$cookies.set('confirmCookies', true)
        }
    }
}

</script>


<style scoped>


.pop-up {
    position: fixed;
    z-index: 999;
    background: rgba(0, 0, 0, 0.8);
    width: 100%;
    height: 100vh;
    top: 0;
    max-width: 480px;
}

.pop-up .pop-body {
    padding: 20px;
    background: #FFF;
    width: 80%;
    text-align: center;
    position: absolute;
    top: 50%;
    margin: 0 auto;
    left: 50%;
    margin-left: -44%;
    margin-top: -180px;
}


.pop-up .pop-body h2 {
    font-size: 16px;
}

.pop-up .pop-body p {
    font-size: 12px;
}

.pop-up .pop-body .pop-up-btn {
    display: flex;
    width: 100%;
    justify-content: center;
}
.pop-up .pop-body .pop-up-btn.link {
    margin-top: 8px;
}

.pop-up .pop-body .pop-btn {
    border: none;
    margin: 0 5px;
    font-size: 10px;
    padding: 10px 5px;
    display: inline-block;
    background-color: rgb(236, 236, 236);
    border: 1px solid #e0e0e0;
    text-decoration: none;
    color: #000;
}


.pop-up .pop-body .pop-up-btn.link .pop-btn {
    font-size: 8px;
}


.pop-up .pop-body .pop-btn.info {
    background-color: rgb(0, 119, 255);
    color: #FFF;
}

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
        font-size: 12px;
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
