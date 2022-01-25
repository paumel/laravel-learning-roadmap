<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-violet-500 to-blue-500 hover:from-blue-500 hover:to-violet-500 rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">
        <slot />
    </button>
</template>

<script>
export default {
    props: {
        type: {
            type: String,
            default: 'submit',
        },
    }
}
</script>
