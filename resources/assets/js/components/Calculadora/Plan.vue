<template>
    <v-flex md6 sm12 xs12>
        <h2 class="text-xs-center">{{ title }}</h2>
        <div v-html="body"></div>
    </v-flex>
</template>

<script>
    import Vue from 'vue';
    import Vuetify from 'vuetify';
    Vue.use(Vuetify);

    export default {
        props: ['title', 'body'],
        data(){
            return {}
        },
    }

</script>