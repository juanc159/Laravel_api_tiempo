hola<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Usuarios
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" v-model="usuario.name" class="form-control" id="name" placeholder="Name">
                            <small ></small>
                        </div>
                    </form>
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
                usuarios: [],
                form_modal: false,
                tilte_modal:'',
                update : true,
                id : 0,
                usuario: {
                    name : ''
                }
            }
        },
        created(){
            this.list();
        },
        methods:{
            
        }
    }
</script>
