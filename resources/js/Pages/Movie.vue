<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
defineProps([
    'movie','auth'
]);
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="py-3">
            <div class=" max-w-5xl mx-auto">
                <div class="flex grid grid-cols-5 p-2">
                    <div class="col-span-1">
                        <img :src="'/'+movie.poster" class="w-full h-full object-cover rounded-2xl shadow-xl">
                    </div>
                    <div class="col-span-4">
                        <div class="px-8">
                            <div class="flex grid grid-cols-5 p-2">
                                <h1 v-text="'Movie Name:'" class="font-bold text-gray-600 text-gray-700 "/>
                                <h1 v-text="movie.title" class="text-gray-400 col-span-4"/>
                            </div>
                            <hr>

                            <!--Description-->
                            <div class="flex grid grid-cols-5 p-2">
                                <h1 v-text="'Language:'" class="font-bold text-gray-600 text-gray-700 " />
                                <p v-text="movie.lang" class="text-gray-400 col-span-4"/>
                            </div>
                            <hr>
                            <div class="flex grid grid-cols-5 p-2">
                                <h1 v-text="'Kind:'" class="font-bold text-gray-600 text-gray-700" />
                                <p v-text="movie.kind" class="text-gray-400 col-span-4"/>
                            </div>
                            <hr>
                            <div class="flex grid grid-cols-5 p-2">
                                <h1 v-text="'Rate:'" class="font-bold text-gray-600 text-gray-700 " />
                                <p v-text="movie.rate+'%'" class="text-gray-400 col-span-4"/>
                            </div>
                            <hr>
                            <div class="flex grid grid-cols-5 p-2">
                                <h1 v-text="'Description:'" class="font-bold text-gray-600 text-gray-700 " />
                                <p v-text="movie.description" class="text-gray-400 col-span-4"/>
                            </div>
                            <hr>
                            <div class="flex grid grid-cols-5 p-2">
                                <h1 v-text="'Time:'" class="font-bold text-gray-600 text-gray-700 " />
                                <p v-text="movie.time" class="text-gray-400 col-span-4"/>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-6">

                <div class="max-w-3xl mx-auto mb-4">
                    <video :src="'/' + movie.movie" class="mx-auto w-full h-full max-h-96 object-cover rounded-3xl shadow-xl" controls />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
