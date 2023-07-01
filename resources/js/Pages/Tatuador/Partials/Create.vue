<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

defineProps({
    status: {
        type: String,
    },

});

const user = usePage().props.auth.user;

const form = useForm({
    nombres: '',
    dni: '',
});

const register = () => {
    form.post(route('tatuador.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.nombres) {
                form.reset('nombres', 'dni');

            }
            if (form.errors.dni) {
                form.reset('dni');
            }
        },
    });
};


</script>

<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">Registrar Tatuadores</h2>
                    </header>

                    <form @submit.prevent="register" class="mt-6 space-y-6">
                        <div>
                            <InputLabel for="nombres" value="Nombres" />

                            <TextInput
                                id="nombres"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.nombres"
                                autofocus
                                autocomplete="nombres"
                            />

                            <InputError class="mt-2" :message="form.errors.nombres" />
                        </div>

                        <div>
                            <InputLabel for="dni" value="Nro DNI" />

                            <TextInput
                                id="dni"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.dni"
                                autocomplete="dni"
                            />

                            <InputError class="mt-2" :message="form.errors.dni" />
                        </div>

                        <div class="flex items-center gap-4">
                            <PrimaryButton :disabled="form.processing">Registrar</PrimaryButton>

                            <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Registrado.</p>
                            </Transition>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

</template>
