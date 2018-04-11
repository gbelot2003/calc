<template>
    <div class="content">
        <div class="loader" v-if="loader === true">
            <img src="/images/loader.gif" alt="loading"/>
        </div>

        <div class="step_1" v-show="step_1 === true">
            <form @submit.prevent="postValues" v-if="!formSubmitted">
                <fieldset>
                    <legend>Sobre el Estudiante</legend>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-6" :class="{'has-error': errors.has('name') }">
                                    <label>Nombre</label>
                                    <input v-model="custom.name"
                                           v-validate="'required'"
                                           type="text"
                                           class="form-control"
                                           name="name" required
                                    >
                                    <p class="text-danger" v-if="errors.has('name')">{{ errors.first('name') }}</p>
                                </div>


                                <div class="form-group col-md-6" :class="{'has-error': errors.has('last') }">
                                    <label>Apellido</label>
                                    <input type="text"
                                           v-model="custom.last"
                                           v-validate="'required'"
                                           class="form-control"
                                           name="last"
                                           required
                                    >
                                    <p class="text-danger" v-if="errors.has('last')">{{ errors.first('last') }}</p>
                                </div>
                            </div>

                            <div class="row">


                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <label>¿Tiene Hijos en nuestra escuela actualmente?</label>
                                    <div class="checkboxThree">
                                        <input type="checkbox" value="1" id="checkboxThreeInput"
                                               v-model="custom.has_bros"
                                               name="has_bros"/>
                                        <label for="checkboxThreeInput"></label>
                                    </div>
                                    <!-- end .slideTwo -->
                                    <div class="bros" v-if="custom.has_bros === true">
                                        <label>¿Cuantos hijos?</label>
                                        <v-select :options="['1','2','3','4']" v-model="custom.bros"></v-select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6" :class="{'has-error': errors.has('grade_id') }">
                                    <label>¿Que grado cotiza?</label>
                                    <v-select

                                            :options="grades"
                                            placeholder="Grados disponibles..."
                                            label="label"
                                            v-model="custom.grade_id"
                                            required
                                    >
                                    </v-select>
                                    <p class="text-danger" v-if="errors.has('grade_id')">{{ errors.first('grade_id')
                                        }}</p>
                                </div>

                            </div>

                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Acerca del Padres</legend>
                    <div class="row">
                        <div class="form-group col-md-6" :class="{'has-error': errors.has('parent_name') }">
                            <label>Nombre de Padre/Madre</label>
                            <input v-model="custom.parent_name"
                                   v-validate="'required'"
                                   type="text"
                                   class="form-control"
                                   name="parent_name"
                                   required
                            >
                            <p class="text-danger" v-if="errors.has('parent_name')">{{ errors.first('parent_name')}}</p>
                        </div>

                        <div class="form-group col-md-6" :class="{'has-error': errors.has('parent_last') }">
                            <label>Apellido de Padre/Madre</label>
                            <input v-model="custom.parent_last"
                                   v-validate="'required'"
                                   type="text"
                                   class="form-control"
                                   name="parent_last"
                                   required
                            >
                            <p class="text-danger" v-if="errors.has('parent_last')">{{ errors.first('parent_last')}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6" :class="{'has-error': errors.has('phone') }">
                            <label>Teléfono</label>
                            <input type="text"
                                   placeholder="(504) 99999999"
                                   v-mask="'(###) ########'"
                                   v-model="custom.phone"
                                   v-validate="'required'"
                                   class="form-control"
                                   name="phone"
                                   required
                            >
                            <p class="text-danger" v-if="errors.has('phone')">{{ errors.first('phone') }}</p>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Teléfono adicional</label>
                            <input type="text"
                                   placeholder="(504) 99999999"
                                   v-mask="'(###) ########'"
                                   v-model="custom.phone_aditional"
                                   class="form-control"
                                   name="phone"
                            >
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-md-6" :class="{'has-error': errors.has('email') }">
                            <label>Correo Electrónico</label>
                            <input type="email"
                                   v-model="custom.email"
                                   v-validate="'required|email'"
                                   class="form-control"
                                   name="email"
                                   required
                            >
                            <p class="text-danger" v-if="errors.has('email')">{{ errors.first('email') }}</p>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>¡Gracias por contactarnos! Nos preguntabamos...</legend>
                    <div class="form-group col-md-12">
                        <label>¿Como escucho sobre DCIS?</label>
                        <v-select
                                v-model="custom.question"
                                :options="questions"
                                required
                        ></v-select>

                    </div>
                </fieldset>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <hr>
                        <button id="calculate" type="submit" class="btn btn-warning btn-xlg"
                                :disabled="custom.grade_id != null ? false : true">Calcular
                        </button>
                    </div>

                </div>

            </form>
        </div>

        <div class="step_2" v-show="step_2 === true">
            <div class="row">
                <div class="col-md-12 inerPannels">
                    <div class="col-md-12">

                        <div class="text-center">
                            <h1>Precios 2017 - 2018</h1>
                        </div>

                        <h2>
                            <small>Gracias</small>
                            {{ custom.name }} {{ custom.last }}
                        </h2>
                        <p>Estas son las opciones de pagó disponibles para el grado de <strong style="color: #FF9900 ">{{ grade_label
                            }}</strong>:</p>

                    </div>
                    <div class="col-centered col-lg-12">
                        <div class="pricing-tables attached ">
                            <div class="row">
                                <div v-for="price in prices" class="col-sm-4 col-md-4 col-lg-4 repeate">
                                    <div class="plan">
                                        <div class="head">
                                            <h2>{{ price.subtitle}}</h2>
                                        </div>
                                        <ul class="item-list">
                                            <li>
                                                {{ price.title }}
                                            </li>
                                        </ul>
                                        <div class="price mediafix">
                                            <h3>
                                                <span class="symbol">$</span>{{ price.total.toLocaleString(undefined, {
                                                minimumFractionDigits: 2, maximumFractionDigits: 2
                                            })
                                                }}</h3>
                                            <h4></h4>
                                        </div>
                                        <a class="btn-clean btn-pad" href="index.html#contact"> <i
                                                class="ion-ios-unlocked-outline"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- row-->
                        </div>
                        <!-- pricing-tables -->
                    </div>
                    <br>

                </div>

                <div class="col-md-12">
                    <p class="text-center" style="color: #FF9900;">
                        Este resultado solo es un estimado del costo real, los precios pueden variar dependiendo de factores no calculados</p>
                </div>
                <div class="col-md-12 text-center">
                    <hr/>
                    <h1 style="color: black; padding-bottom: 2rem">PLANES DE PAGO DISPONIBLES</h1>
                    <div class="row">
                        <panel-one
                                title="Plan 1"
                                v-bind:value="full_price"
                                discountext="1 Cuota pagadera en Junio de"
                                porcent="7"
                                porcentext="El descuento sobre plan de contado 1 cuota es del "
                                context="A"
                        ></panel-one>
                        <panel-one
                                title="Plan 2"
                                v-bind:value="full_price"
                                discountext="2 Cuotas pagaderas en Junio y Diciembre"
                                porcent="3"
                                porcentext="El descuento sobre plan de contado 2 cuotas es de"
                                context="B"
                        >
                        </panel-one>
                    </div>
                    <div class="row">

                        <panel-two
                                title="Plan 3"
                                v-bind:value="full_price"
                                prime="A"
                        >
                        </panel-two>

                        <panel-two
                                title="Plan 4"
                                v-bind:value="full_price"
                                prime="B"
                        >
                        </panel-two>

                    </div>
                </div>
            </div>
            <hr>
            <div class="col-md-12">
                <button type="button" v-if="loader === false" class="btn" @click="changeToStepOne">Recalcular</button>
            </div>

        </div>
    </div>

</template>

<script>
    import Vue from 'vue'
    import PanelOne from './panels/PlanPanelOne';
    import PanelTwo from './panels/PlanPanelTwo';
    import VeeValidate from 'vee-validate';

    Vue.use(VeeValidate);


    VeeValidate.Validator.updateDictionary(dictionary);

    export default {
        data () {
            return {
                step_1: true,
                step_2: false,
                loader: true,
                grade_label: '',
                full_price: '0',
                questions: ['Pagina Web',
                    'Panfleto o brochure',
                    'Familia DCIS',
                    'Amistades',
                    'Alumni (egresado/a)',
                    'Otros'],
                grades: [
                    {label: 'Toodler', id: 1},
                    {label: 'Nursery', id: 2},
                    {label: 'Pre Kinder', id: 3},
                    {label: 'Kinder', id: 4},
                    {label: 'Primer Grado', id: 5},
                    {label: 'Segundo Grado', id: 6},
                    {label: 'Tercer Grado', id: 7},
                    {label: 'Cuarto Grado', id: 8},
                    {label: 'Quinto Grado', id: 9},
                    {label: 'Sexto Grado', id: 10},
                    {label: 'Septimo Grado', id: 11},
                    {label: 'Octavo Grado', id: 12},
                    {label: 'Noveno Grado', id: 13},
                    {label: 'Decimo Grado', id: 14},
                    {label: 'Onceavo Grado', id: 15},
                    {label: 'Doceavo Grado', id: 16}
                ],
                custom: {
                    name: '',
                    last: '',
                    has_bros: false,
                    bros: 0,
                    grade_id: null,
                    parent_name: '',
                    parent_last: '',
                    phone: '',
                    phone_aditional: '',
                    email: '',
                    question: ''
                },
                prices: {},
                labels:['Normal', '', 'Credomatic Economia 7% Descuento', 'Debito Actomatico']
            }
        },
        created: {},
        mounted(){
            this.whenReady();
        },
        methods: {
            whenReady(){
                return this.loader = false;
            },

            consoleCallback(val){
                console.dir(JSON.stringify(val))
            },

            changeToStepOne(){
                this.step_1 = true;
                this.step_2 = false;
            },

            postValues(){

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

                this.grade_label = this.custom.grade_id.label;

                this.loader = true;

                axios.post('/customs', toSend)
                    .then(resp => {
                        this.prices = resp.data;
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
        computed: {
            validateBeforeSubmit(e) {
                this.$validator.validateAll();
                if (!this.errors.any()) {
                    this.submitForm()
                }
            },
            submitForm(){
                this.formSubmitted = true
            }
        },
        components: {PanelOne, PanelTwo}

    }
</script>

<style>
    h1, h2, h3 {
        font-family: Montserrat !important;
    }


    input::placeholder {
        color: rgba(0, 0, 0, 0.2) !important;
    }

    #calculate {
        width: 20rem;
        height: 7rem;
        font-size: 26px;
    }

    .content {
        position: relative;
    }

    .loader {
        width: 100%;
        height: 100%;
        position: absolute;
        background: whitesmoke;
        z-index: 1;
    }

    .loader img {
        background: white;
        position: relative;
        top: 30%;
        left: 40%;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */
    {
        opacity: 0
    }

    .value {
        font-size: 3rem;
        font-weight: bolder;
        margin-right: 1rem;
    }

    /* pricing table */
    .pricing-tables {
        padding: 20px;
    }

    .pricing-tables h1 {
        font-size: 48px;
    }

    .pricing-tables .plan.first {
        border-bottom-left-radius: 4px;
        border-top-left-radius: 4px !important;
    }

    .pricing-tables .plan.last {
        border-bottom-right-radius: 4px;
        border-top-right-radius: 4px;
    }

    .pricing-tables .plan.recommended {
        border-bottom-left-radius: 4px;
        border-bottom-right-radius: 4px;
    }

    .pricing-tables .plan.recommended .head {
        /*margin-bottom: 20px;*/
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
    }

    .pricing-tables.attached .col-sm-4, .pricing-tables.attached .col-md-4, .pricing-tables.attached .col-sm-3, .pricing-tables.attached .col-md-3 {
        padding-left: 0;
        padding-right: 0;
    }

    .pricing-tables.attached .plan {
        border-radius: 0;
    }

    .pricing-tables.attached .plan .head {
        border-radius: 0;
    }

    .pricing-tables.attached .plan.last {
        border-bottom-right-radius: 4px;
    }

    .pricing-tables.attached .plan.last .head {
        border-top-right-radius: 4px;
    }

    .pricing-tables.attached .plan.first {
        border-bottom-left-radius: 4px;
    }

    .pricing-tables.attached .plan.first .head {
        border-top-left-radius: 4px;
    }

    .plan {
        box-shadow: 0 2px 2px rgba(10, 10, 10, 0.30) !important;
        min-height: 330px;
        height: 261px;
        background: #fff;
        border-radius: 4px;
        margin: 20px 0;
        padding-bottom: 25px;
        text-align: center;
    }

    .plan .head {
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        padding: 12px 16px;
        color: #fff;
        min-height: 11rem;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .repeate:nth-child(1) .plan .head {
        background: #A7001F;
    }

    .repeate:nth-child(1) .price h3 {
        color: #A7001F;
    }

    .repeate:nth-child(2) .plan .head {
        background: #376BD2;
    }

    .repeate:nth-child(2) .price h3 {
        color: #376BD2;
    }

    /*.repeate:nth-child(3) .plan .head {
        background: #376BD2;
    }

    .repeate:nth-child(3) .price h3 {
        color: #376BD2;
    }*/

    .repeate:nth-child(3) .plan .head {
        background: #3FCA46;
    }

    .repeate:nth-child(3) .price h3 {
        color: #3FCA46;
    }

    .plan .head h1, .plan .head h2, .plan .head h3 {
        padding: 0;
        margin: 0;
        font-family:monserrat;
        font-weight: 100;
        color: whitesmoke;
    }

    .plan .price {
        border-top: 1px solid #eee;
        margin: 0 auto 30px auto;
        width: 80%;
    }

    .plan .price h3 {
        font-size: 38px;
        vertical-align: top;
        line-height: 1;
    }

    .plan .price h3 span {
        font-size: 38px;
        vertical-align: top;
        position: relative;
        margin: 6px 0 0 -7px;
    }

    .plan .price h4 {
        color: #aaa;
        font-size: 14px;
    }

    .plan .btn {
        padding: 10px 30px;
        text-transform: uppercase;
        font-weight: 500;
    }

    .plan ul {
        list-style-type: none;
        padding: 20px;
        margin-top: 10px;
    }

    .plan ul li {
        line-height: 22px;
        margin-bottom: 15px;
        font-size: 13px;
        font-weight: 400;
        font-family: Montserrat;
    }

    .plan ul li a {
        text-decoration: underline;
        color: #e6e9ed;
    }

    .plan ul li:last-child {
        border-bottom: none;
    }

    .plan ul strong {
        font-weight: 700;
    }

    .plan.recommended {
        margin-top: 6px;
        box-shadow: 0 0 22px rgba(10, 10, 10, 0.42);
        position: relative;
        z-index: 99;
        border-radius: 4px;
    }

    .plan.recommended .head {
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        background: #4e9a06;
    }

    .head.value {
        background-color: #fdaf17;
        /*margin-bottom: 48px;*/
    }

    .plan.recommended .btn {
        margin-bottom: 10px;
    }

    @media screen and (min-width: 770px) and (max-width: 990px) {
        .plan .mediafix h3 {
            font-size: 55px !important;
            vertical-align: top;
            line-height: 1;
        }
    }


</style>
