<template>
    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-header">
                <h2>{{ title }}</h2>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        1 prima pagadera en Junio de US$.<span class="minimum-price">{{ calculatedPrime.toLocaleString(undefined, {
                        minimumFractionDigits: 2, maximumFractionDigits: 2
                    }) }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        11 colegiaturas de Julio a Mayo de US$.<span class="minimum-price">{{ calculatedValue.toLocaleString(undefined, {
                        minimumFractionDigits: 2, maximumFractionDigits: 2
                    }) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue';

    export default {
        props: ['title', 'value', 'prime', 'primetext', 'cuotext'],
        data(){
            return {}
        },
        methods: {
            calculateCuote(val, prime){
                return (val - prime) / 11
            },

            PrimeValue(){
                if (this.prime === "A") {
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

<style>
    .minimum-price {
        color:#0E6E15;
        font-weight: bold;
    }
</style>