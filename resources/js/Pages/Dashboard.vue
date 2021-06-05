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
                    
                    <select v-model="pais">
                        <option value="VE">Venezuela</option>
                        <option value="CO">Colombia</option>
                    </select>
                    <select v-model="ciudad">
                        <option value="Caracas">Caracas</option>
                        <option value="Bogota">Bogota</option>
                    </select>

                    {{pais}}
                    {{ciudad}}

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
                pais: '',
                ciudad: ''
            }
        },
        created(){

        }
    }
</script>
