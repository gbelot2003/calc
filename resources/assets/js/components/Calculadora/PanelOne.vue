<template>
    <v-flex md6 sm12 xs12>
        <h2 class="text-xs-center">{{ title }}</h2>
        <div>
            <p class="text-xs-center">{{ discountext }} US<span class="minimum-price">{{ calculatedValue.toLocaleString('en-US', { style: 'currency', currency: 'USD' }) }}</span></p>
            <P class="text-xs-center">{{ porcentext }} {{ porcent }}%</P>
        </div>

    </v-flex>
</template>

<script>
    import Vue from 'vue';

    export default {
        props: ['title', 'value', 'porcent', 'porcentext', 'discountext', 'context'],
        data(){
            return {}
        },
        methods: {
            calculatePorcent(val, porcent){
                return (val * porcent) / 100
            }
        },
        computed: {
            calculatedValue(){
                let discount = this.calculatePorcent(this.value, this.porcent);
                if (this.context === 'A') {
                    return this.value - discount;
                } else {
                    return (this.value - discount) / 2;
                }
            }
        }
    }
</script>

<style>

</style>