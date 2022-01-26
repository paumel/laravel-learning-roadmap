<template>
    <Head title="Roadmap" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-white leading-tight">
                Roadmap
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="text-white bg-gradient-to-r from-violet-500/75 to-fuchsia-500/50 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b-4" v-for="level in levels" :key="level">
                        <p class="text-2xl font-extrabold">{{level.name}}</p>
                        <p>{{level.description}}</p>
                        <div v-for="parent_topic in level.parent_topics" :key="parent_topic.id" class="pt-8">
                            <div class="flex border-b-2">
                                <label class="text-xl ">
                                    <input type="checkbox">
                                    {{parent_topic.name}}
                                </label>
                            </div>
                            <div v-for="topic in parent_topic.children" :key="topic.id" class="flex justify-between items-center border-dashed border-b-2 min-h-fit">
                                <div>
                                    <label>
                                        <input type="checkbox">
                                        {{topic.name}}
                                    </label>
                                </div>
                                <div class="text-right">
                                    <div v-for="link in topic.links" class="py-1">
                                        <a :href="link.url" target="_blank">{{link.title}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-xl border-b-2 pt-6" v-if="level.projects.length > 0">Projects</p>
                        <div v-for="project in level.projects" :key="project.id" class="pt-6">
                            <label class="font-bold">
                                <input type="checkbox">
                                {{project.name}}
                            </label>
                            <p>{{project.description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';

export default {
    props:{
        levels: Array
    },
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
}
</script>
