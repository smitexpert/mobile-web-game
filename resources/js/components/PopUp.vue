<template>
    <div class="full-width">
        <div @click="exitPopUpEvent" class="exit-area">
            <p>EXIT</p>
        </div>
        <div class="logo-anime">
            <img src="~/../../../public/CyberzCrew-2.gif" alt="">
        </div>
        <div class="box">

            <div class="anim-zone">
                <div class="hoerner">
                    <img src="~/../../../public/Hoerner.gif" alt="">
                </div>
                <div class="brille">
                    <img src="~/../../../public/Brille.gif" alt="">
                </div>
                <!-- <div class="blitz blitz-left">
                    <img src="~/../../../public/Blitz.gif" alt="">
                </div>
                <div class="blitz blitz-right">
                    <img src="~/../../../public/Blitz.gif" alt="">
                </div> -->

                <!-- <div class="smile">
                    <img src="~/../../../public/Smiley.gif" alt="">
                </div> -->

                <div class="text-area">
                    <p>Jeden Monat gibt es neue Herausforderungen, also spiel weiter und schau in unseren sozialen Netzwerken nach schönen Wettbewerben.</p>
                </div>
            </div>


            <div class="social-media">
                <a href="/visit/insta" class="social-link">
                    <img src="~/../../../public/assets/insta.webp" alt="">
                </a>
                <a href="/visit/tiktok" class="social-link">
                    <img src="~/../../../public/assets/tiktok.webp" alt="">
                </a>
            </div>

        </div>
    </div>
</template>

<script>

export default {
    methods: {
        exitPopUpEvent() {
            console.log('clicking...');
            this.$emit('exit-popup')
        }
    }
}

</script>

<style scoped>

.social-media {
    position: absolute;
    bottom: 0;
    width: 100%;
    display: flex;
    justify-content: space-evenly;
    max-width: 480px;
    margin-left: -30px;
    margin-bottom: -10px;
}

.social-media .social-link {
    width: 70px;
    height: auto;
    padding: 5px;
    box-shadow: 0px 0px 5px 0px rgba(255, 255, 255, 0.75);
}
.social-media .social-link img {
    width: 100%;
    height: auto;
    overflow: hidden;
    border-radius: 20px;
}

.exit-area {
    background-color: rgba(255, 255, 255, 0.4);
    right: 0;
    position: absolute;
    top: 0;
    padding: 5px 40px;
    margin: 10px;
}

.exit-area p {
    font-size: 16px;
    font-weight: bold;
    margin: 0;
    padding: 0;
}

.text-area {
    position: relative;
    text-align: center;
    bottom: -200px;
    color: #ffffff;
}

.text-area p {
    font-weight: bold;
    font-size: 14px;
}

.button-bg {
    position: fixed;
    left: 50%;
    margin-left: -95px;
    bottom: 0;
    margin-bottom: 40px;
}

.button-bg img {
    width: 200px;
}

.brille {
    position: fixed;
    left: 50%;
    margin-left: -140px;
    z-index: 50;
    margin-top: -30px;
}

.brille img {
    width: 280px;
}

.hoerner {
    position: fixed;
    margin-top: -115px;
    left: 50%;
    margin-left: -120px;
}

.hoerner img {
    width: 240px;
}


.anim-zone {
    position: relative;
    width: 100%;
    height: auto;
}

.smile {
    position: fixed;
    left: 50%;
    margin-left: -215px;
    opacity: 0.4;
    z-index: 10;
}

.smile img {
    width: 440px;
}

.blitz {
    width: 80px;
    height: auto;
    position: fixed;
    /* margin-top: 57%; */
    z-index: 90;
}

.blitz-left {
    margin-left: -5%;
}

.blitz-right {
    /* right: -15%; */
    margin-left: 25%;
    transform: scaleX(-1);
}

.blitz img {
    width: 100%;
}

.logo-anime {
    text-align: center;
    height: 180px;
}

.logo-anime img {
    width: 280px;
}

.box {
    width: 70%;
    height: 400px;
    margin: 30px;
    padding: 30px;
    border-radius: 30px;
    position: relative;
}

.full-width {
    width: 100%;
    max-width: 480px;
    position: fixed;
    z-index: 999;
    top: 0;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.9);
    flex-direction: column;
}
</style>
