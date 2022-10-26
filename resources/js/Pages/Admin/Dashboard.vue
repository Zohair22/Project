<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

defineProps([
    'posts', 'auth'
])
</script>

<template>
    <Head title="AdminDashboard" />

    <AuthenticatedLayout>
        <div class="xl:max-w-7xl lg:max-w-5xl md:max-w-2xl sm:max-w-md max-w-xs mx-auto" v-if="posts">
            <div class="lg:grid lg:grid-cols-3 sm:grid sm:grid-cols-3 md:grid md:grid-cols-3 gap-4 justify-items-center items-center py-5">
                <div v-for="(post, key) in posts" class="rounded-3xl hover:w-lg transform transition duration-700">
                    <div class="bg-white rounded-t-3xl py-2 px-5 font-bold flex justify-between items-center">
                        <Link :href="'/admin/movie/'+ post.title + '/edit'" v-html="'Edit'" class="text-indigo-400 hover:text-indigo-600" />
                        <Link :href="'/admin/movie/'+ post.title + '/delete'" v-html="'Delete'" class="text-red-400 hover:text-red-600" />
                    </div>
                    <Link :href="'/admin/movie/'+ post.title">
                        <img :src="post.poster" class="shadow-md shadow-sky-500 border-2 border-blue-500 w-full h-full object-cover" alt="">
                        <h1 v-text="post.title" class="font-bold mb-4 p-2 shadow-lg shadow-sky-400 text-center rounded-b-3xl bg-sky-600 text-white" />
                    </Link>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
