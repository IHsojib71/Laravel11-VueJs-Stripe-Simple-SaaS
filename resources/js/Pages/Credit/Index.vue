<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CreditPricingCard from '@/Components/CreditPricingCard.vue';

defineProps({
    packages: {
        type: [Array,Object],
    },
    features: {
        type : [Array,Object],
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
        <CreditPricingCard :packages ="packages.data" :features="features.data"/>
    </AuthenticatedLayout>
</template>
