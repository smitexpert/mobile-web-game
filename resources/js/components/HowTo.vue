<script>
export default {
    props: {
        content: null,
        title: null,
    },
    data() {
        return {
            show: false,
        }
    },
    methods: {
        toggleContent() {
            this.show = !this.show;
        }
    }
}
</script>

<template>
    <div class="area">
        <div class="text-area">
            <p @click="toggleContent"><span class="question" v-if="!show">?</span><span class="back" v-else>&#10149;</span> How to</p>
        </div>
        <template v-if="show && (content != null)">
            <div class="how-to">
                <p class="center">{{ title }}</p>
                {{ content }}
            </div>
        </template>
    </div>
</template>

<style scoped>

.area {
    display: block;
    width: 90%;
    position: relative;
    margin: 0 auto;
}

.text-area {
    width: 100%;
    display: flex;
    justify-content: end;
    font-size: 14px;
}

.text-area p {
    color: #ffffff;
    margin: 0;
    padding: 0;
}

.text-area p .question {
    padding: 3px 9px;
    background-color: #ffffff;
    color: #000000;
    border-radius: 500px;
}
.text-area p .back {
    transform: rotate(180deg);
    position: absolute;
    font-size: 18px;
    margin-left: -20px;
}

.how-to {
    color: #ffffff;
    font-size: 12px;
    position: absolute;
    height: auto;
    background: rgba(000, 000, 000, 0.6);
    padding: 14px;
    margin-top: 10px;
    border-radius: 10px;
    box-shadow: 2px 5px 12px 3px rgba(0,0,0,0.31);
    z-index: 889;
}

.how-to .center {
    font-family: 'LemonMilkProSemiBold';
    text-align: center;
    font-weight: bolder;
}

</style>
