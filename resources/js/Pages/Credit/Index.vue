<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CreditPricingCard from '@/Components/CreditPricingCard.vue';

defineProps({
    packages: {
        type: Array,
    },
    features: {
        type : Array,
    },
    success: {
        type : String,
    },
    error: {
        type : String,
    },

});
</script>


<template>
    <AuthenticatedLayout>
        <CreditPricingCard/>

    </AuthenticatedLayout>
</template>
