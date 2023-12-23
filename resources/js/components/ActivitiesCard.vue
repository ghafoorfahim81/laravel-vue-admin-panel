<template>
    <div class="w-full max-w-md p-4 bg-gray-50 border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700"
         :class="exClass?'bg-red-200':''"
     >
        <div class="flex items-center justify-between mb-4">
            <h5 class="text-xs font-bold leading-none text-gray-900 dark:text-white">{{ from }} > {{to}}</h5>
            <dropdown ></dropdown>
        </div>
        <div class="flow-root">
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    props: ['from', 'to', 'user','exClass'],
    computed: {
        firstCharacter() {
            // Extract and return the first character of the user's name
            return this.user.charAt(0).toUpperCase();
        }
    }
};
</script>

<style>
/* Add any styling as needed */
</style>
