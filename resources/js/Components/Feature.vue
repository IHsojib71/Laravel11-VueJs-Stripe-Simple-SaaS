<template>
    <div class="py-12">
        <div class="flex justify-between">
            <div>
                <h2
                    class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
                >
                    {{ feature ? feature.name : "" }}
                </h2>
                <p class="text-white text-justify">{{ feature ? feature.description : "" }}</p>
            </div>

            <div>
                <h2
                    class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
                >
                    Credit Required
                </h2>
                <div class="flex gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] text-yellow-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                    </svg>

                    <p class="text-white text-justify">{{feature ? feature.required_credits : 0 }}</p>

                </div>
            </div>



        </div>
    </div>
</template>

<script>
import { Head, Link, usePage } from "@inertiajs/vue3";
export default {
    components: {
        Head,
        Link,
    },
    props: {
        feature: Object,
    },
    data() {
        return {};
    },
};
</script>
