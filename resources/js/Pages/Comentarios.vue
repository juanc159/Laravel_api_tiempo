<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Comentarios
            </h2>
        </template>

        <div class="py-1 ">
            <div class="grid grid-cols-3 gap-4"> 

                    <div v-for="comentario in comentarios" :key="comentario.id"  class="max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-2">
                        <div>
                            <h2 class="text-gray-800 text-3xl font-semibold">{{comentario.username}}</h2>
                            <p class="mt-2 text-gray-600">{{comentario.comentario}}</p>
                        </div>
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
                comentarios: [],
                usu:[],
                info:''
            }
        },
        created(){ 
            this.list();
            
        },
        methods:{ 
            list(){
                axios.get('/listComentarios').then(res=>{ 
                        this.comentarios = res.data;  
                });
            },
        }
        
    }
</script>