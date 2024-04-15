<template>
   <AuthenticatedLayout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
        </div>
    </div>


   </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from "@inertiajs/vue3";
export default {
    components: {
        AuthenticatedLayout,
        Head,
        Link
    },
    data() {
        return {
            availableCredits : 0,
        }
    },
    created() {
        let auth = usePage().props;
        this.availableCredits = auth.user.available_credits;
    }
}

</script>


