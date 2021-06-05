<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    
                    <select v-model="pais_seleccionado" @change="paisId(pais_seleccionado); buscarPais(pais_seleccionado)">
                        <option v-for="pais in paises" :key="pais.id" :value="pais.id">{{pais.name}}</option>
                    </select>
                    <select v-model="ciudad_seleccionada" @change="infoTiempo()">
                        <option v-for="ciudad in ciudades" :key="ciudad.id" :value="ciudad.name">{{ciudad.name}}</option>
                    </select>
                </div>
            <div v-if="info">
                <ul>
                    <li>PAIS: {{info['sys']['country']}}</li>
                    <li>ESTADO: {{info['name']}}</li>
                </ul>
                <ul>
                    <li>longitud: {{info['coord']['lon']}}</li>
                    <li>latitud: {{info['coord']['lat']}}</li>
                </ul>
                <ul>
                    <li>Condición Climatica: {{info['weather']['description']}}</li>
                </ul>

                <ul>
                    <li>Temperatura: {{info['main']['feels_like']}} Kelvin</li>
                    <li>Temperatura mínima en este momento: {{info['main']['temp_min']}} Kelvin</li>
                    <li>Temperatura máxima en este momento: {{info['main']['temp_max']}} Kelvin</li>
                    <li>Presión atmosférica: {{info['main']['pressure']}} hPa</li>
                    <li>Humedad: {{info['main']['humidity']}} %  </li>
                </ul>

                <ul>
                    <li>Velocidad del viento: {{info['wind']['speed']}} metro / seg</li>
                    <li>Dirección del viento: {{info['wind']['deg']}} grados (meteorológicos)</li>
                    <li>Ráfaga de viento: {{info['wind']['gust']}} metro / seg</li>
                </ul>
                <ul>
                    <li>Nubosidad: {{info['clouds']['all']}} %</li>
                </ul>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        },
        data() {
            return {
                pais_seleccionado: '',
                ciudad_seleccionada: '',
                paises: [],
                ciudades: [],
                paisCod:'',
                info:null
            }
        },
        created(){
            this.listar_paises();
            this.infoTiempo();
        },
        methods:{
            listar_paises(){
                axios.get(route('paises.index')).then(res=>{
                    this.paises = res.data;
                })
            },
            paisId(id){
                axios.get(route('ciudades.index',id)).then(res=>{
                    this.ciudades = res.data;
                })
            },
            buscarPais(id){
                axios.get(route('paises.buscar',id)).then(res=>{
                    this.paisCod = res.data;console.log(this.paisCod.cod);
                })
            },
            infoTiempo(){
                if(!this.ciudad_seleccionada==''){
                    axios.get('prueba/'+this.ciudad_seleccionada+'/'+this.paisCod).then(res=>{
                    this.info = res.data;
                    })
                }
                
            }
        }
    }
</script>
