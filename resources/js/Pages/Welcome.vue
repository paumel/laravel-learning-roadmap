<template>
    <Head title="Welcome"/>

    <div class="flex justify-center h-screen bg-gradient-to-r from-violet-500/75 to-fuchsia-500/75">
        <div class="flex items-center">
            <div class="flex flex-col mx-1">
                <div class="text-center">
                    <h1 class="text-6xl font-bold text-white">Laravel learning roadmap</h1>
                    <p class="text-white italic text-center lg:text-left">A tool to track your learning progress</p>
                </div>
                <div class="flex justify-center mt-20">
                    <div>
                        <Link v-if="props.canLogin"  :href="route('login')" class="text-base text-white py-5 px-10 m-1 rounded-xl bg-gradient-to-r from-violet-500 to-blue-500 hover:from-blue-500 hover:to-violet-500">
                            Log in
                        </Link>
                    </div>
                    <div>
                        <Link v-if="props.canRegister" :href="route('register')" class="text-base text-white py-5 px-10 m-1 rounded-xl bg-gradient-to-r from-violet-500 to-blue-500 hover:from-blue-500 hover:to-violet-500">
                            Register
                        </Link>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';

const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
})
</script>
