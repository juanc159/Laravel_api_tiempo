<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Usuarios
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                        <!-- Modal -->
                        <div  :class="form_modal" class="relative p-8 bg-white w-full max-w-md m-auto flex-col flex">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{tilte_modal}}</h5>
                                    <button type="button" class="close" @click="close_modal()">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                
                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            <input type="text" v-model="usuario.name" class="form-control" id="name" placeholder="Ciudad">
                                            <small ></small>
                                        </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button"  data-dismiss="modal" @click="close_modal()" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Cerrar</button>
                                    <button type="button" @click="save();" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin" >Guardar Cambios</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    

                    <table id="tabla_ciudades" class="w-full border" style="width:100%">
                            <thead >
                                <tr class="bg-gray-50 border-b">
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500" scope="col">#</th>
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500" scope="col">Nombre</th>
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500" scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-gray-50 text-center" v-for="usuario in usuarios" :key="usuario.id">
                                    <th class="p-2 border-r" scope="row">{{usuario.id}}</th>
                                    <td class="p-2 border-r">{{usuario.name}}</td>
                                    <td class="p-2 border-r">
                                        <button class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin"   @click="update = true;  open_modal(usuario)">Editar</button>
                                        <button class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin" @click='eliminar(usuario.id)'>Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                            </table>
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
                form_modal: 'hidden',
                tilte_modal:'',
                update : false,
                id : 0,
                usuario: {
                    name : ''
                }
            }
        },
        created(){
            this.list();
            console.log(this.form_modal);
        },
        methods:{
            list(){
                axios.get('/listUsuarios').then(res=>{
                    this.usuarios = res.data;
                    console.log(this.usuarios);
                });
            },
            eliminar(id){
                console.log(id);
                axios.delete('usuarios/'+id).then(res=>{
                    this.list();
                });
                
            },
            open_modal(data){ 
                this.form_modal='';
                if(this.update){
                    console.log(this.form_modal);
                    this.tilte_modal='MODIFICAR USUARIO ' +data.id;
                    this.id = data.id;
                    this.usuario.name = data.name; 
                }
                
            },
            save(){
                if(this.update){
                    axios.put('/usuarios/'+this.id,this.usuario).then(res=>{
                    });
                }
                this.close_modal();
                this.list();
            },
            close_modal(){
                this.form_modal = 'hidden';
            },
        }
    }
</script> 
