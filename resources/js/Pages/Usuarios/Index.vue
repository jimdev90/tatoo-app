<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm} from '@inertiajs/vue3';
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-bootstrap.css';
import {nextTick, ref} from "vue";
import Modal from "@/Components/Modal.vue";

const $toast = useToast();

const form = useForm({
    id: '',
});

const desactivar = (usuario) => {
    form.id = usuario.id
    form.put(route('usuario.desactivar'), {
        preserveScroll: true,
        onSuccess: (value) => {
            $toast.success(`Usuario desactivado exitosamente`, {
                position: 'bottom'
            })
            form.reset()
        },
        onError: (errors) => {

            if (errors.create){
                $toast.error(`${errors.create}`, {
                    position: 'bottom'
                })
            }

            if (form.errors.id) {
                form.reset('id');
            }
        },
    });
}

const activar = (usuario) => {
    form.id = usuario.id
    form.put(route('usuario.activar'), {
        preserveScroll: true,
        onSuccess: (value) => {
            $toast.success(`Usuario activado exitosamente`, {
                position: 'bottom'
            })
            form.reset()
        },
        onError: (errors) => {

            if (errors.create){
                $toast.error(`${errors.create}`, {
                    position: 'bottom'
                })
            }

            if (form.errors.id) {
                form.reset('id');
            }
        },
    });
}

</script>

<template>
    <Head title="Mis citas" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">ROL: {{ $page.props.auth.user.role }}</h2>
        </template>
        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="container py-10 px-10 mx-0 min-w-full flex flex-col items-center">
                            <h2 class="text-5xl mb-3 text-black">Usuarios</h2>
                        </div>
                    </div>
                    <div class="container py-10 px-10 mx-0 min-w-full">
                        <h2 class="text-3xl mb-3 text-black">Bandeja</h2>
                        <section>
                            <div class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
                                <div class="max-w-full overflow-x-auto">
                                    <table class="w-full table-auto">
                                        <thead>
                                        <tr class="bg-gray-2 text-left dark:bg-meta-4">
                                            <th class="min-w-[100px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                                                #
                                            </th>
                                            <th class="min-w-[220px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                                                Nombres
                                            </th>
                                            <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                                                Email
                                            </th>
                                            <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
                                                Rol
                                            </th>
                                            <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                                                Estado
                                            </th>
                                            <th class="py-4 px-4 font-medium text-black dark:text-white">
                                                Acciones
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(usuario, index) in $page.props.usuarios">
                                            <td class="border-b border-[#eee] py-5 px-4 pl-9 dark:border-strokedark xl:pl-11">
                                                {{ index++ + 1 }}
                                            </td>
                                            <td class="border-b border-[#eee] py-5 px-4 pl-9 dark:border-strokedark xl:pl-11">
                                                <p class="text-sm">{{ usuario.name }}</p>
                                            </td>
                                            <td class="border-b border-[#eee] py-5 px-4 pl-9 dark:border-strokedark xl:pl-11">
                                                <p class="text-sm">{{ usuario.email }}</p>
                                            </td>
                                            <td class="border-b border-[#eee] py-5 px-4 pl-9 dark:border-strokedark xl:pl-11">
                                                <p class="text-sm">{{ usuario.role }}</p>
                                            </td>
                                            <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                                <p :class=" `${usuario.estado === 'ACTIVO' ? 'text-green-500' : 'text-red-500'}` ">
                                                    {{ usuario.estado }}
                                                </p>
                                            </td>
                                            <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                                <div class="flex items-center space-x-3.5">
                                                    <button v-if="usuario.estado === 'ACTIVO'" @click="desactivar(usuario)" class="hover:text-primary">
                                                        <svg class="fill-current" width="18" height="18" viewBox="0 0 60.963 60.842" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path style="fill:#231F20;" d="M59.595,52.861L37.094,30.359L59.473,7.98c1.825-1.826,1.825-4.786,0-6.611
	c-1.826-1.825-4.785-1.825-6.611,0L30.483,23.748L8.105,1.369c-1.826-1.825-4.785-1.825-6.611,0c-1.826,1.826-1.826,4.786,0,6.611
	l22.378,22.379L1.369,52.861c-1.826,1.826-1.826,4.785,0,6.611c0.913,0.913,2.109,1.369,3.306,1.369s2.393-0.456,3.306-1.369
	l22.502-22.502l22.501,22.502c0.913,0.913,2.109,1.369,3.306,1.369s2.393-0.456,3.306-1.369
	C61.42,57.647,61.42,54.687,59.595,52.861z"/>
                                                            </svg>
                                                    </button>
                                                    <button v-else @click="activar(usuario)" class="hover:text-primary" >
                                                        <svg class="fill-current" width="18" height="18" viewBox="0 0 80.588 61.158" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path style="fill:#231F20;" d="M29.658,61.157c-1.238,0-2.427-0.491-3.305-1.369L1.37,34.808c-1.826-1.825-1.826-4.785,0-6.611
                                                                c1.825-1.826,4.786-1.827,6.611,0l21.485,21.481L72.426,1.561c1.719-1.924,4.674-2.094,6.601-0.374
                                                                c1.926,1.72,2.094,4.675,0.374,6.601L33.145,59.595c-0.856,0.959-2.07,1.523-3.355,1.56C29.746,61.156,29.702,61.157,29.658,61.157z
                                                                "/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
