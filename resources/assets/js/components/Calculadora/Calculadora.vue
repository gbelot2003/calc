<template>
    <v-app>

        <Header></Header>

        <main v-if="step_1">
            <v-container fill-height>
                <div class="loader" v-if="loader">
                    <img class="icon-play-circle" src="/images/loader.gif">
                </div>
                <v-layout row wrap align-center>
                    <v-flex xd12 class="text-xs-center">
                        <v-form v-model="valid">
                            <v-layout row wrap>

                                <v-flex md12 xs12>
                                    <h4 class="green1 text-sm-centar text-md-left">Sobre el Estudiante</h4>
                                </v-flex>

                                <v-flex xs12 md6 style="padding: 0 10px 0 0;">
                                    <v-text-field
                                            label="Nombre del Estudiante"
                                            v-model="custom.name"
                                            :rules="nameRules"
                                            :counter="30"
                                            required
                                    ></v-text-field>
                                </v-flex>

                                <v-flex xs12 md6 style="padding: 0 10px 0 0;">

                                    <v-text-field
                                            label="Apellido del Estudiante"
                                            v-model="custom.last"
                                            :rules="lastRules"
                                            :counter="30"
                                            required
                                    ></v-text-field>

                                </v-flex>

                                <v-flex xs12 md6 style="padding: 0 10px 0 0;">

                                    <v-switch
                                            :label="`¿Tiene hijos actualmente en DCS?`"
                                            v-model="custom.has_bros"
                                            color="primary"
                                            value="1"
                                    ></v-switch>

                                    <div v-if="custom.has_bros">
                                        <v-select
                                                :items="['1','2','3','4']"
                                                v-model="custom.bros"
                                                label="¿Cuantos hijos?"
                                                single-line>
                                        </v-select>
                                    </div>
                                </v-flex>

                                <v-flex xs12 md6 style="padding: 0 10px 0 0;">
                                    <v-select
                                            :items="grades"
                                            :rules="gradeRules"
                                            v-model="custom.grade_id"
                                            label="¿Que grado cotiza?"
                                            single-line>
                                    </v-select>
                                </v-flex>

                                <v-flex xs10><h4 class="green1 text-md-left">Acerca del Padre/Madre/Tutor</h4></v-flex>

                                <v-flex xs12 md6 style="padding: 0 10px 0 0;">
                                    <v-text-field
                                            label="Nombre del Padre/Madre/Tutor "
                                            v-model="custom.parent_name"
                                            :rules="nameRules"
                                            :counter="30"
                                            required
                                    ></v-text-field>
                                </v-flex>

                                <v-flex xs12 md6 style="padding: 0 10px 0 0;">
                                    <v-text-field
                                            label="Apellido del Padre/Madre/Tutor"
                                            v-model="custom.parent_last"
                                            :rules="nameRules"
                                            :counter="30"
                                            required
                                    ></v-text-field>
                                </v-flex>

                                <v-flex xs12 md6 style="padding: 0 10px 0 0;">
                                    <v-text-field
                                            label="Telefono"
                                            :mask="mask"
                                            :rules="phoneRules"
                                            v-model="custom.phone"></v-text-field>
                                </v-flex>

                                <v-flex xs12 md6 style="padding: 0 10px 0 0;">
                                    <v-text-field label="Telefono Adicional" :mask="mask"
                                                  v-model="custom.phone_aditional"></v-text-field>
                                </v-flex>

                                <v-flex xs12 md6 style="margin: 0 10px 0 0;">
                                    <v-text-field
                                            label="E-mail"
                                            v-model="custom.email"
                                            :rules="emailRules"
                                    ></v-text-field>
                                </v-flex>

                                <v-flex xs12 v-if="pregunta_a">
                                    <h4 class="green1">
                                        <div>
                                            <p class="text-md-left">¡Gracias por contactarnos! Nos preguntabamos...</p>
                                        </div>
                                    </h4>
                                </v-flex>

                                <v-flex xs12 md12 v-if="pregunta_a">

                                    <v-select
                                            :items="questions"
                                            v-model="custom.question"
                                            label="¿Como escucho sobre DCS?"
                                            single-line>
                                    </v-select>
                                </v-flex>

                                <v-flex xs12 md12>
                                    <v-btn large
                                           color="success"
                                           @click="submit"
                                           :disabled="!valid"
                                    >
                                        calcular
                                        <v-icon right dark>send</v-icon>
                                    </v-btn>
                                </v-flex>

                            </v-layout>
                        </v-form>
                    </v-flex>
                </v-layout>
            </v-container>
        </main>

        <main v-if="step_2">
            <v-container fill-height>
                <v-layout row wrap align-center>
                    <v-layout row wrap>
                        <v-flex xs12><h1 class="text-xs-center">Precios {{ config_name }}</h1></v-flex>
                        <v-flex xs12>
                            <h2>
                                <small>Gracias</small>
                                {{ custom.parent_name }} {{ custom.parent_last }}
                            </h2>
                            <br>
                            <p>Estas son las opciones de pagó disponibles para el grado de <strong
                                    style="color: #FF9900 ">{{ grade_label }}</strong>:</p>
                        </v-flex>

                        <v-layout row wrap align-center>
                            <Card
                                    v-bind:subtitle="prices[0].subtitle"
                                    v-bind:title="prices[0].title"
                                    v-bind:total="prices[0].total"
                                    color="red darken-4">
                            </Card>

                            <Card
                                    v-bind:subtitle="prices[1].subtitle"
                                    v-bind:title="prices[1].title"
                                    v-bind:total="prices[1].total"
                                    color="light-blue darken-3">
                            </Card>

                            <Card
                                    v-bind:subtitle="prices[2].subtitle"
                                    v-bind:title="prices[2].title"
                                    v-bind:total="prices[2].total"
                                    color="green darken-1">
                            </Card>



                            <v-flex md12 class="text-xs-center">
                                <p class="small_message" style="color:#E65100">Este resultado solo es un estimado del
                                    costo real, los precios pueden variar dependiendo de factores no calculados</p>
                                <hr/>
                                <br/>
                                <br/>
                            </v-flex>

                            <v-flex xs12><h1 class="text-xs-center planesTitulo">PLANES DE PAGO DISPONIBLES</h1></v-flex>

                            <panel-one v-if="plans[0].show"
                                    v-bind:title="plans[0].title"
                                    v-bind:value="full_price"
                                    v-bind:discountext="plans[0].discountext"
                                    v-bind:porcent="plans[0].porcent"
                                    v-bind:porcentext="plans[0].porcentext"
                                    v-bind:context="plans[0].context"
                            ></panel-one>

                            <panel-one v-if="plans[1].show"
                                    v-bind:title="plans[1].title"
                                    v-bind:value="full_price"
                                    v-bind:discountext="plans[1].discountext"
                                    v-bind:porcent="plans[1].porcent"
                                    v-bind:porcentext="plans[1].porcentext"
                                    v-bind:context="plans[1].context"
                            >
                            </panel-one>

                            <panel-two v-if="plans[2].show"
                                    v-bind:title="plans[2].title"
                                    v-bind:value="full_price"
                                    v-bind:context="plans[2].context"
                            >
                            </panel-two>

                            <panel-two v-if="plans[3].show"
                                    v-bind:title="plans[3].title"
                                    v-bind:value="full_price"
                                    prime="B"
                            >
                            </panel-two>

                            <panel-three v-if="plans[4].show"
                                    v-bind:title="plans[4].title"
                                    v-bind:value="full_price"
                            >
                            </panel-three>




                            <v-flex xs12 text-xs-center>
                                <v-btn large
                                       color="success"
                                       @click="changeToStepOne"
                                       :disabled="!valid"
                                       v-if="loader === false"
                                >
                                    Recalcular
                                    <v-icon right dark>send</v-icon>
                                </v-btn>
                            </v-flex>
                        </v-layout>


                    </v-layout>
                </v-layout>
            </v-container>
        </main>

        <Footer></Footer>
    </v-app>
</template>

<script>
    import PanelOne from './PanelOne.vue';
    import PanelTwo from './PanelTwo.vue';
    import PanelThree from './PanelThree.vue'
    import Header from './Header.vue';
    import Footer from './Footer.vue';
    import Card from './Card.vue';
    import Plan from './Plan.vue';

    export default {

        data: () => ({
            step_1: true,
            step_2: false,
            loader: true,
            valid: false,

            nameRules: [
                v => !!v || 'El nombre es un campo necesario',
                v => v.length <= 30 || 'El nombre debe tener menos de 10 caracteres'
            ],

            gradeRules: [
                v => !!v || 'Selección de Grado es necesario',
            ],

            emailRules: [
                v => !!v || 'El campo de e-mail es necesario',
                v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'El correo debe ser valido'
            ],

            lastRules: [
                v => !!v || 'Apellido es un campo necesario',
                v => v.length <= 30 || ''
            ],

            phoneRules: [
                v => !!v || 'El Numero de telefono es un campo necesario',
            ],

            questions: [
                'Pagina Web',
                'Panfleto o brochure',
                'Familia DCIS',
                'Amistades',
                'Alumni (egresado/a)',
                'Otros'],

            mask: '(###)####-####',

            grades: [
                {text: 'Toodler', id: 1},
                {text: 'Nursery', id: 2},
                {text: 'Pre Kinder', id: 3},
                {text: 'Kinder', id: 4},
                {text: 'Primer Grado', id: 5},
                {text: 'Segundo Grado', id: 6},
                {text: 'Tercer Grado', id: 7},
                {text: 'Cuarto Grado', id: 8},
                {text: 'Quinto Grado', id: 9},
                {text: 'Sexto Grado', id: 10},
                {text: 'Septimo Grado', id: 11},
                {text: 'Octavo Grado', id: 12},
                {text: 'Noveno Grado', id: 13},
                {text: 'Decimo Grado', id: 14},
                {text: 'Onceavo Grado', id: 15},
                {text: 'Doceavo Grado', id: 16}
            ],

            custom: {
                name: '',
                last: '',
                has_bros: 0,
                bros: 0,
                grade_id: {},
                parent_name: '',
                parent_last: '',
                phone: '',
                phone_aditional: '',
                email: '',
                question: ''
            },
            prices: {},
            labels: ['Normal', '', 'Credomatic Economia 7% Descuento', 'Debito Actomatico'],
            grade_label: '',
            config_name: '',
            pregunta_a: '',
            plans: [],

        }),
        created: {},
        mounted(){
            this.whenReady();
        },
        methods: {
            whenReady(){
                this.loader = false;
                axios.get('/config').
                    then(resp => {
                        this.pregunta_a = resp.data.pregunta_a;
                })
            },
            changeToStepOne(){
                this.step_1 = true;
                this.step_2 = false;
            },
            submit (){

                let toSend = {
                    name: this.custom.name,
                    last: this.custom.last,
                    has_bros: this.custom.has_bros,
                    bros: this.custom.bros,
                    grade_id: this.custom.grade_id.id,
                    parent_name: this.custom.parent_name,
                    parent_last: this.custom.parent_last,
                    phone: this.custom.phone,
                    phone_aditional: this.custom.phone_aditional,
                    email: this.custom.email,
                    question: this.custom.question
                };

                this.grade_label = this.custom.grade_id.text;

                this.loader = true;

                axios.post('/customs', toSend)
                    .then(resp => {
                        this.prices = resp.data;
                        this.config_name = resp.data.config_name;
                        this.plans = resp.data.plans;
                        this.step_1 = false;
                        this.step_2 = true;
                        setTimeout(function () {
                            this.loader = false
                        }.bind(this), 2000)
                    })
                    .catch(function (err) {
                        should.throw.error.to.console();
                        var respErr = JSON.parse(err.error);
                        var errorResult = {
                            origUrl: respErr.origUrl,
                            error: respErr
                        };
                        results.push(errorResult);
                    })
                    .catch(function (err) {
                        console.error(err); // This will print any error that was thrown in the previous error handler.
                    });

                axios.get('customs/grade/' + this.custom.grade_id.id)
                    .then(resp => {
                        this.full_price = resp.data;
                    })
            }
        },

        components: {PanelOne, PanelTwo, Header, Footer, Card, PanelThree, Plan}
    }
</script>

<style>

    @import url('https://fonts.googleapis.com/css?family=Montserrat');

    .container {
        max-width: 980px;
        font-family: 'Montserrat', sans-serif;
    }

    .panel {
        outline: 1px;
    }

    .text-white {
        color: white;
        padding: 25px 0px;
        margin: 0 0 25px 0;
    }

    .layout:nth-child(1) .repeate:nth-child(1) {
        background: #A7001F;
    }

    .layout .repeate:nth-child(2) {
        background: #376BD2;
    }

    .layout .repeate:nth-child(3) {
        background: #3FCA46;
    }

    .pricesTag {
        font-size: 3.5rem;
        margin: 40px 0 60px 0;
    }

    .small_message {
        padding-top: 45px;
    }

    .hedadTitle {
        color: white;
        padding: 5px 10px 0 10px;
    }

    .green1 {
        color: #2A5319;
    }

    .footer1 {
        height: 6rem;
        padding: 6.5rem 0;
    }

    .planesTitulo{
        margin-bottom:3rem;
    }

    .loader {
        position: absolute;
        display: flex;
        width: 100%;
        height: 100%;
        background: white;
        z-index: 99;
    }

    .container {
        position: relative;
    }

    .icon-play-circle {
        position: absolute;
        top: 40%;
        left: 40%;
    }

    @media all and (min-width: 1024px) {
        .strech {
            width : 25%;
        }
    }

</style>
