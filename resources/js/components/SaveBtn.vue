<template>
    <button  type="button"
            :style="(loading || isdisable)?'pointer-events: none;':''"
             @click="$emit('click')"
             class="px-2 py-2 mr-2 text-xs font-medium text-center inline-flex items-center text-white bg-teal-500 rounded-lg hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <span v-if="loading">
            {{ loading_text }}...
        </span>
        <template v-if="!loading">{{btn_name}}<i class="material-icons ml-1 text-xs">{{ icon }}</i> </template>
    </button>


</template>

<script>
export default {
    props: [ "icon", 'loading_text','btn_name','isdisable','loading'],
    data() {
        return {
            methods: {}
        }
    }
}
</script>

<style>

</style>

