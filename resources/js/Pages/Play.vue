<script>
import Menu from '../components/Menu.vue';
import Logo from '../components/Logo.vue';
import HowTo from '../components/HowTo.vue';
import PopUp from '../components/PopUp.vue';
import { Link } from '@inertiajs/vue3';
import axios from 'axios';

export default {
    components: {
        Menu,
        Logo,
        HowTo,
        Link,
        PopUp
    },
    mounted() {
        this.fetchData();
        axios.post('/api/visitor', {action: 'PLAY'}).then(response => {
            console.log(response.data);
        })
    },
    data(){
        return {
            howto: 'Jeden Monat gibt es neue Challenges, also keep on playing ;)',
            howTitle: 'How to Play:',
            rules: [
                '1. Wähle deine Geschmacksrichtung.',
                '2. Gib deinen Namen und den deiner Buddys ein.',
                '3. Die Challenge erscheint.',
                '4. Du und dein Buddy, der in der Aufgabe genannt wird, müsst gleichzeitig eine zufällige Zahl innerhalb des angegebenen Bereichs (Feld: Odds) sagen, nachdem der Countdown abgelaufen ist.',
                '5. Wenn ihr beide die gleiche Zahl sagt, müsst ihr die Herausforderung annehmen und die Challenge annehmen.',
                '6. Wenn ihr unterschiedliche Zahlen sagt, könnt ihr zur nächsten Aufgabe übergehen.'
            ],
            names: [],
            name: null,
            player: null,
            buddy: null,
            isStart: false,
            countdown: false,
            questions: [
                {
                    id: 1,
                    title: 'Was sind die Odds..',
                    challenge: 'dass du tweetest "Bitcoin changed my life" und es für 24 Stunden nicht löschst',
                    difficulty: 5

                },{
                    id: 2,
                    title: 'Was sind die Odds..',
                    challenge: 'dass du mit Y einen Walzer zu dem "We love Hardcore" von Scooter (ab 01:00) tanzt?',
                    difficulty: 10
                },{
                    id: 3,
                    title: 'Was sind die Odds..',
                    challenge: 'dass du zum nächsten Tisch gehst, das vollste Glas leer trinkst und zurückkommst ohne ein Wort zu sagen?',
                    difficulty: 15
                },{
                    id: 4,
                    title: 'Was sind die Odds..',
                    challenge: 'dass du einer fremden Person für eine Minute nachläufst und sie in jeder Geste nachmachst?',
                    difficulty: 14
                },{
                    id: 5,
                    title: 'Was sind die Odds..',
                    challenge: 'dass du eine Polonaise auf der Straße anfängst und andere dazu aufforderst mitzumachen?',
                    difficulty: 8
                }
            ],
            counter: 3,
            interval: null,
            passedChallenge: [],
            challenge: null,
            fixedY: null,
            playCount: 0,
            showPopUpWhen: 5
        }
    },
    methods: {
        async exitPopUp() {
            this.playCount = 0;
            this.handleStart()
        },
        async fetchData() {
            await axios.post('/api/challenge', {
                challenge_ids: this.passedChallenge
            }).then(res => {
                this.challenge = res.data;
            })
        },
        setPlayer() {
            this.player = this.names[Math.floor(Math.random()*this.names.length)];

            const names = this.names.filter(item => item !== this.player);

            console.log(names);

            this.buddy = names[Math.floor(Math.random()*names.length)];
            this.fixedY = names[Math.floor(Math.random()*names.length)];


            let res_challenge = this.challenge.challenge;
            let convert_challenge = res_challenge.replace("Y", this.fixedY);
            convert_challenge = convert_challenge.replace("X", this.player);
            this.challenge.challenge = convert_challenge;
        },
        handleSubmit() {

            if(this.names.length >= 5)
                return

            if(this.names.filter(item => item == this.name.toUpperCase()).length > 0)
                return

            if(this.name != null)
                this.names.push(this.name.toUpperCase())

            this.name = null;
        },
        handleRemove(index) {
            this.names.splice(index, 1);
        },
        async handleStart() {
            await this.setPlayer();
            this.isStart = true;
            this.countdown = false;
            this.counter = 3;
            clearInterval(this.interval);
        },
        async handleCounter() {

            this.playCount = 0;

            if(this.playCount == this.showPopUpWhen) {
                await this.fetchData();
            }else {
                this.countdown = true;
            }

            await this.fetchData();

            this.interval = setInterval(() => {
                if(this.counter > 0)
                    this.counter--
            }, 1000);
        }
    }
}
</script>

<template>
    <div class="screen">
        <template v-if="!isStart">
            <Menu />
            <Logo title="WAS SIND DIE ODDS?" />
            <HowTo :content="howto" :title="howTitle" :rules="rules" />
            <div class="name-area">
                <label for="">Wer spielt alles mit?</label>
                <div class="name-input">
                    <span class="add-icon" @click="handleSubmit">+</span>
                    <input type="text" v-model="name" v-on:keyup.enter="handleSubmit">
                </div>
                <div class="selected-name">
                    <TransitionGroup>
                    <div v-for="(item, index) in names" :key="index" class="name" @click="handleRemove(index)">{{ item }}</div>
                    </TransitionGroup>
                </div>
            </div>
            <div class="bottom-button">
                <button v-if="names.length > 1" class="go-btn" @click="handleStart">LET'S GO</button>
            </div>
        </template>
        <template v-else>
            <template v-if="!countdown">
                <template v-if="playCount == showPopUpWhen">
                    <PopUp @exit-popup="exitPopUp" />
                </template>
                <Menu />
                <HowTo :content="howto" :title="howTitle" :rules="rules" />
                <div>
                    <div class="question-area">
                        <div class="player-name">
                            <p>{{ this.player }}</p>
                        </div>
                        <div class="challenge-title">
                            <br>
                            <p>{{ this.challenge.title }}</p>
                        </div>
                        <br>
                        <div class="challenge-box">
                            <p>{{ this.challenge.challenge }}</p>
                        </div>
                        <div class="difficulty-score">
                            <br>
                            <p>
                                Odds: {{ this.challenge.difficulty }}
                            </p>
                        </div>
                        <br>
                        <div class="player-buddy">
                            <div class="label">Dein Buddy:</div>
                            <div class="buddy-name">{{ this.buddy }}</div>
                        </div>
                    </div>
                    <div class="bottom-button">
                        <button @click="handleCounter" class="go-btn">COUNTDOWN</button>
                    </div>
                </div>
            </template>
            <template v-else>
                <div class="counter-area">
                    <div class="counter-body">
                        <p>{{ counter }}</p>
                    </div>
                </div>
                <div class="bottom-button">
                    <button v-if="counter == 0" class="go-btn" @click="handleStart">NEXT!</button>
                </div>
            </template>
        </template>

    </div>
</template>

<style scoped>

.counter-area {
    width: 100%;
    max-width: 480px;
    position: fixed;
    top: 50%;
    text-align: center;
    margin-top: -100px;
}

.counter-area .counter-body {
    width: 200px;
    height: 200px;
    border: 3px solid #ffffff;
    margin: 0 auto;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 500px;
}

.counter-area .counter-body p {
    font-family: 'LemonMilkProUltraBold';
    color: #ffffff;
    font-size: 42px;
}

.question-area {
    width: 100%;
    max-width: 480px;
    position: fixed;
    top: 20%;
    margin: 0 auto;
    text-align: center;
    display: flex;
    flex-direction: column;
}

.question-area .player-name p {
    font-family: 'LemonMilkProSemiBold';
    color: #ffffff;
    background-color: #8cdf27;
    padding: 2px 15px;
    display: inline;
}

.question-area .challenge-title p {
    color: #ffffff;
    border: 1px solid #fff;
    display: inline;
    padding: 5px;
}

.question-area .challenge-box {
    border: 1px solid #fff;
    width: 90%;
    margin: 0 auto;
}

.question-area .challenge-box p {
    color: #ffffff;
    font-size: 14px;
    padding: 0 10px;
}

.question-area .difficulty-score {
    width: 90%;
    margin: 0 auto;
    text-align: left;
}

.question-area .difficulty-score p {
    border: 1px solid #ffffff;
    display: inline;
    padding: 4px 10px;
    font-size: 14px;
    color: #ffffff;
}

.question-area .player-buddy {
    width: 90%;
    margin: 0 auto;
    text-align: left;
    display: flex;
}

.question-area .player-buddy .label {
    border: 1px solid #ffffff;
    padding: 4px 10px;
    font-size: 14px;
    color: #ffffff;
}

.question-area .player-buddy .buddy-name {
    font-family: 'LemonMilkProSemiBold';
    border: 1px solid #ff00a8;
    background-color: #ff00a8;
    padding: 4px 10px;
    font-size: 14px;
    color: #ffffff;
    margin-left: 10px;
}

.name-area {
    width: 100%;
    height: auto;
    position: fixed;
    top: 40%;
    text-align: center;
    max-width: 480px;
}

.name-area label {
    width: 100%;
    color: #ffffff;
}

.name-area .name-input {
    width: 100%;
    position: relative;
}

.name-area .name-input .add-icon {
    position: absolute;
    font-size: 22px;
    color: #000000;
    background-color: #ffffff;
    padding: 0 9px;
    border-radius: 50px;
    margin: 10px 5px;
}
.name-area .name-input input {
    margin-top: 5px;
    color: #ffffff;
    font-family: 'LemonMilkProSemiBold';
    font-size: 22px;
    width: 70%;
    background: none;
    border: 1px solid #ffffff;
    padding: 5px;
    padding-left: 40px;
    border-radius: 6px;
}

.selected-name {
    width: 80%;
    display: block;
    max-width: 480px;
    text-align: left;
    margin: 0 auto;
    margin-top: 20px;
}

.selected-name .name {
    display: inline-block;
    padding: 5px 10px;
    margin: 5px;
    color: #ffffff;
    border: 1px solid #ffffff;
    border-radius: 6px;
}

.bottom-button {
    width: 100%;
    margin: 0 auto;
    text-align: center;
    position: fixed;
    bottom: 0;
    padding-bottom: 40px;
    margin-bottom: 5px;
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
    animation: button-animation 1s ease infinite;
    background: linear-gradient(90deg, #a9fa44 0%, #ff00a8 100%);
    background-size: 400px 400px;
    border: none;
}

@keyframes button-animation {
    0% {
        padding: 10px 50px;
        background-position: 0% 50%;
    }
    50% {
        padding: 15px 60px;
        background-position: 50% 100%;
    }
    100% {
        padding: 10px 50px;
        background-position: 100% 0%;
    }
}

.v-enter-active,
.v-leave-active {
  transition: opacity 0.2s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}


</style>
