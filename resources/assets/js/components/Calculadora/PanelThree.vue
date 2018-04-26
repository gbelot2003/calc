<template>
    <v-container grid-list-xl text-xs-center class="uppera">
        <v-layout row wrap>

            <v-flex md6 xs12>
                <h2 class="text-xs-center">{{ title }}</h2>
                <div>
                    <p class="text-xs-center"> Un cuota pagadera en Junio de US $1,000.00 </span></p>
                    <p class="text-xs-center">Una cuota pagadera en Diciembre de US $1,000.00 </span></p>
                    <P class="text-xs-center">10 cuotas mensuales de <strong>US ${{ calculatedValue }}.00</strong></P>
                </div>
            </v-flex>
        </v-layout>
    </v-container>

</template>

<script>
    import Vue from 'vue';

    export default {
        props: ['title', 'value', 'discountext', 'context', 'discountext2'],
        data(){
            return {}
        },
        methods: {
            calculatePorcent(val){
                return (val - 2000) / 10
            }
        },
        computed: {
            calculatedValue(){
                let discount = this.calculatePorcent(this.value);
                return discount;
            }
        }
    }
</script>

<style>
    .uppera {
        margin-bottom: 15px;
    }

</style>