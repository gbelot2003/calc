<template>
    <v-flex md6 sm12 xs12>
        <h2 class="text-xs-center">{{ title }}</h2>
        <div>
            <p class="text-xs-center">
                1 prima pagadera en Junio de US
                <span class="minimum-price">
                {{ calculatedPrime.toLocaleString('en-US',{ style: 'currency', currency: 'USD' }) }}
            </span></p>

            <p class="text-xs-center">11 colegiaturas de Julio a Mayo de US
                <span class="minimum-price">
                {{ calculatedValue.toLocaleString('en-US',{ style: 'currency', currency: 'USD' }) }}
        </span></p>
        </div>
    </v-flex>
</template>

<script>
    import Vue from 'vue';

    export default {
        props: ['title', 'value', 'prime', 'primetext', 'context'],
        data(){
            return {}
        },
        methods: {
            calculateCuote(val, prime){
                return (val - prime) / 11
            },

            PrimeValue(){
                if (this.context === "A") {
                    return 1000;
                } else {
                    return (this.value / 12);
                }
            },
        },
        computed: {
            calculatedValue(){
                return this.calculateCuote(this.value, this.PrimeValue());
            },
            calculatedPrime(){
                return this.PrimeValue();
            }
        }
    }
</script>