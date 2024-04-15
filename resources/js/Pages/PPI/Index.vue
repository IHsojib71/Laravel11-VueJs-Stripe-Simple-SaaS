<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Feature from '@/Components/Feature.vue';

defineProps({
    feature: {
        type: Array,
    },
    answer: {
        type : String,
    }

});
const form = useForm({
    width: '',
    height: '',
    diagonal: '',
});

const submit = () => {
    form.post(route('ppi.calculate'), {

    });
};
</script>

<template>
    <AuthenticatedLayout>
        <Head title="PPI Calculator" />
         <div class="max-w-4xl mx-auto p-8 m-4 rounded-lg bg-gray-800">
            <Feature :feature="feature"/>
            <form @submit.prevent="submit" v-if="feature.required_credits <= $page.props.auth.user.available_credits">
            <div>
                <InputLabel for="width" value="Width (Pixels)" />

                <TextInput
                    id="width"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.width"
                    placeholder="width"
                    autofocus
                    autocomplete="width"
                />

                <InputError class="mt-2" :message="form.errors.width" />
            </div>
            <br>
            <div>
                <InputLabel for="height" value="Height (Pixels)" />

                <TextInput
                    id="height"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.height"
                    placeholder="Height"
                    autofocus
                    autocomplete="height"
                />

                <InputError class="mt-2" :message="form.errors.height" />
            </div>
<br>
            <div>
                <InputLabel for="diagonal" value="Diagonal (Inches)" />

                <TextInput
                    id="diagonal"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.diagonal"
                    placeholder="Diagonal"
                    autofocus
                    autocomplete="diagonal"
                />

                <InputError class="mt-2" :message="form.errors.diagonal" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    calculate
                </PrimaryButton>
            </div>
        </form>

        <div v-else>
            <p class="text-center text-gray-400">
                You don't have enough credits to calculate your PPI.
            </p>
            <p class="text-center text-gray-400">
                You need {{feature.required_credits - $page.props.auth.user.available_credits}} more credits. <Link href="/" class="text-purple-600">Get more credits</Link>
            </p>
        </div>
         </div>

         <div v-if="answer" class="max-w-4xl bg-gray-800 text-white py-4 px-2 mx-auto rounded-lg text-center font-bold">
          Result :  {{ answer ? answer : '' }}
         </div>

    </AuthenticatedLayout>
</template>
