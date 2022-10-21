<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

defineProps([
    'posts', 'auth'
])
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="max-w-7xl mx-auto" v-if="posts">
            <div class="grid grid-cols-4 gap-5 justify-items-center items-center py-5">
                <div v-for="post in posts" class="rounded-3xl hover:w-lg border-blue-500 transform transition duration-700">
                    <Link :href="'/movie/'+ post.title">
                        <img :src="post.poster" class="rounded-t-3xl shadow-md shadow-sky-500 border-t-2 border-x-2 border-blue-500 w-full h-full object-cover">
                        <h1 v-text="post.title" class="font-bold mb-4 p-2 shadow-lg shadow-sky-400 text-center rounded-b-3xl bg-sky-600 text-white" />
                    </Link>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
