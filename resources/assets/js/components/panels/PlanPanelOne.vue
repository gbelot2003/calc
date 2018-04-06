<template>
    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-header">
                <h2>{{ title }}</h2>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        {{ discountext }} US$.<span class="minimum-price">
                        {{ calculatedValue.toLocaleString(undefined, {
                        minimumFractionDigits: 2, maximumFractionDigits: 2
                    }) }}
                        </span></div>
                </div>
                <div class="row">
                    <div class="col-md-12">{{ porcentext }} {{ porcent }}%</div>
                </div>
            </div>
        </div>
    </div>
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
    .minimum-price {
        color: #0E6E15;
        font-weight: bold;
    }
</style>