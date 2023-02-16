<script>

import { Link } from '@inertiajs/vue3';

export default {
    components: {
        Link
    },
    data() {
        return {
            isOpen: false
        }
    },
    methods: {
        handleMenu() {
            this.isOpen = !this.isOpen;
        }
    }
}
</script>

<template>
    <div>
        <div class="menu-area">
            <div class="bounder" @click="handleMenu">
                <span class="bumb"></span>
                <span class="bumb"></span>
                <span class="bumb"></span>
            </div>
        </div>
        <template v-if="isOpen">
            <div class="menu-content">
                <div class="inner-area">
                    <div class="close-area">
                        <p @click="handleMenu">Back</p>
                    </div>
                    <div class="menu-items">
                        <ul>
                            <li><Link class="link" href="/">Home</Link></li>
                            <li><Link class="link" href="/game">Game</Link></li>
                            <li><a class="link" href="https://www.radeberger-gruppe.de/impressum-und-datenschutz/">Datenschutzerklärung</a></li>
                            <li><a class="link" href="https://www.radeberger-gruppe.de/impressum-und-datenschutz/impressum.html">Impressum</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </template>
    </div>
</template>

<style scoped>

.menu-content {
    width: 100%;
    max-width: 480px;
    position: absolute;
    background: rgba(000, 000, 000, 0.9);
    height: 100vh;
    top: 0;
    z-index: 999;
}

.menu-content .inner-area .menu-items {
    width: 100%;
    text-align: center;
    color: #ffffff;
}

.menu-content .inner-area .menu-items ul {
    list-style-type: none;
    padding: 0;
    margin-top: 60px;
}

.menu-content .inner-area .menu-items ul li .link {
    font-family: 'LemonMilkProSemiBold';
    font-size: 22px;
    color: #ffffff;
    display: block;
    text-decoration: none;
    border: 1px solid #ffffff;
    padding: 5px 30px;
    margin: 10px 0;
}

.menu-content .inner-area {
    width: 90%;
    height: auto;
    margin: 0 auto;
}

.menu-content .inner-area .close-area {
    width: 100%;
    text-align: right;
}

.menu-content .inner-area .close-area p {
    font-family: 'LemonMilkProUltraBold';
    color: #ffffff;
    display: inline-block;
    border: 2px solid #ffffff;
    padding: 2px 5px;
    cursor: pointer;
}

.menu-area {
    width: 100%;
    height: auto;
    display: flex;
    justify-content: end;
}

.bounder {
    margin: 20px;
}

.bumb {
    width: 36px;
    height: 5px;
    background-color: white;
    display: block;
    margin: 4px 0;
}

</style>
