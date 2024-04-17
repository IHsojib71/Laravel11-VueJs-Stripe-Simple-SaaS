<script setup>
import { router } from '@inertiajs/vue3'
defineProps({
    packages: {
        type: Array,
    },
    features: {
        type : Array,
    },
});

const submit = (pkg) => {

    router.post(route('credit.buy',pkg), {
  
})
};

</script>

<template>
	<section class="py-6">
		<div class="container p-4 mx-auto sm:p-10">
			<div class="mb-12 space-y-4 text-center">
				<h1 class="text-4xl font-semibold leading-tight text-white">Pricing</h1>

			</div>
			<div class="grid max-w-md grid-cols-1 gap-6 mx-auto auto-rows-fr lg:grid-cols-3 lg:max-w-full">

                <div v-for="(pkg,index) in packages" :key="index" class="flex flex-col overflow-hidden border-2 rounded-md ">
					<div class="flex flex-col items-center justify-center px-2 py-8 space-y-4 ">
						<p class="text-lg font-medium text-white">{{ pkg.name }}</p>
						<p class="text-5xl font-bold text-white flex">${{ pkg.price }}/
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[50px] text-yellow-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                            </svg>


                                {{ pkg.credits }}
						</p>
					</div>
					<div class="flex flex-col items-center justify-center px-2 py-8 ">
						<ul class="self-stretch flex-1 space-y-2">
							<li class="flex justify-center space-x-2" v-for="(feature,index) in features" :key="index">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 dark:text-violet-600">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
								</svg>
								<span class="text-white">{{ feature.name }}</span>

							</li>

						</ul>
                        <form @submit.prevent="submit(pkg)">
                            <button type="submit" class="px-8 py-3 mt-6 text-lg font-semibold rounded sm:mt-12 dark:bg-violet-600 dark:text-gray-50">Buy</button>
                        </form>
					</div>
				</div>
		</div>
        </div>
	</section>
</template>


