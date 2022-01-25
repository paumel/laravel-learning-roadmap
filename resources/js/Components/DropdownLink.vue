<template>
    <Link class="block w-full px-4 py-2 text-left text-sm leading-5 text-white bg-violet-500 focus:outline-none focus:bg-violet-500 hover:text-gray-700 transition duration-150 ease-in-out">
        <slot />
    </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    }
}
</script>
