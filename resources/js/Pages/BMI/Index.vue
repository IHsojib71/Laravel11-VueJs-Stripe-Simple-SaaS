<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    weight: '',
    height: '',
});

const submit = () => {
    form.post(route('bmi.calculate'), {

    });
};
</script>

<template>
    <AuthenticatedLayout>
        <Head title="BMI Calculator" />
         <div class="max-w-2xl mx-auto py-4">
            <form @submit.prevent="submit">
            <div>
                <InputLabel for="weight" value="Weight" />

                <TextInput
                    id="weight"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.weight"

                    autofocus
                    autocomplete="weight"
                />

                <InputError class="mt-2" :message="form.errors.weight" />
            </div>

            <div>
                <InputLabel for="height" value="Height" />

                <TextInput
                    id="height"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.height"

                    autofocus
                    autocomplete="height"
                />

                <InputError class="mt-2" :message="form.errors.height" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    calculate
                </PrimaryButton>
            </div>
        </form>
         </div>

    </AuthenticatedLayout>
</template>
