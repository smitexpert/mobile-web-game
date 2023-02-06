<script>
import Menu from '../components/Menu.vue';
import Logo from '../components/Logo.vue';
import HowTo from '../components/HowTo.vue';
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        Menu,
        Logo,
        HowTo,
        Link
    },
    data(){
        return {
            howto: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut delectus nulla architecto ex. Eligendi tempore libero reiciendis ex, consequuntur doloremque perspiciatis autem sunt id, molestiae repellendus esse, omnis harum. Voluptatem!',
            howTitle: 'How to Play:',
            selecte: false
        }
    },
    methods: {
        handleSelect() {
            this.selecte = true;
        }
    }
}
</script>

<template>
    <div class="screen">
        <Menu />
        <Logo title="WAS SIND DIE ODDS?" />
        <HowTo :content="howto" :title="howTitle" />

        <div class="flavours">
            <div class="item" @click="handleSelect">
                <img src="~/../../../public/assets/orange.webp" alt="">
                <button class="select-btn suss">SUSS-SAUER</button>
            </div>
            <div class="item" @click="handleSelect">
                <img src="~/../../../public/assets/red.webp" alt="">
                <button class="select-btn wild">WILD</button>
            </div>
        </div>

        <div class="bottom-button">
            <button v-if="!selecte" class="disabled-button">CHOOSE YOUR FLAVOUR</button>
            <Link class="go-btn" v-else href="/game/play">LET'S GO!</Link>
        </div>
    </div>
</template>

<style scoped>

.flavours {
    width: 100%;
    height: auto;
    display: flex;
    justify-content: space-evenly;
    margin-top: 20px;
    position: fixed;
    bottom: 25%;
    max-width: 480px;
}

.flavours .item {
    width: 120px;
    height: auto;
    text-align: center;
}

.flavours .item img {
    height: 200px;
    width: auto;
    margin: 0 auto;
}

.flavours .item .select-btn {
    font-family: 'LemonMilkProRegular';
    width: 100%;
    float: left;
    border: none;
    padding: 5px;
    border-radius: 6px;
    color: #ffffff;
    margin-top: 10px;
}

.flavours .item .select-btn.wild {
    background-color: #ff00a8;
}

.flavours .item .select-btn.suss {
    background-color: #a9fa44;
}

.bottom-button {
    width: 100%;
    margin: 0 auto;
    text-align: center;
    position: fixed;
    bottom: 0;
    padding-bottom: 20px;
    max-width: 480px;
}

.bottom-button .go-btn {
    font-family: 'LemonMilkProRegular';
    font-size: 18px;
    text-decoration: none;
    color: #ffffff;
    background-color: #8cdf27;
    padding: 5px 30px;
    border-radius: 6px;
    bottom: 50px;
}

.bottom-button .disabled-button {

    font-family: 'LemonMilkProSemiBold';
    background: none;
    border: none;
    font-size: 16px;
    padding: 10px 40px;
    border-radius: 10px;
    color: #ffffff;
    background: rgb(169,250,68);
    background: linear-gradient(90deg, #a9fa44 0%, #ff00a8 100%);
    text-decoration: none;
}
</style>
