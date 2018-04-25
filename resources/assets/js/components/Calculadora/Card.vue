<template>
    <v-flex 4 elevation-3 class="strech" >
        <v-card height="100%" >
            <h3 class="text-xs-center text-white" v-bind:class="color" >{{ subtitle }}</h3>
            <P class=" text-xs-center">
                <small>{{ title }}</small>
            </P>

            <h3 class="text-xs-center pricesTag" style="color: #B71C1C">
                {{ total.toLocaleString('en-US', { style: 'currency', currency: 'USD'
                })
                }}
            </h3>
        </v-card>
    </v-flex>
</template>

<script>
    import Vue from 'vue';
    import Vuetify from 'vuetify';
    Vue.use(Vuetify);

    export default {
        props: ['subtitle', 'title', 'total', 'color'],
        data(){
            return {}
        },
    }
</script>
