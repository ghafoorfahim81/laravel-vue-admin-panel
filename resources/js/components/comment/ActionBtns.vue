<template>
    <div
        class="z-10 w-36 bg-white absolute right-5 rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
            aria-labelledby="dropdownMenuIconHorizontalButton">
            <li>
                <a href="#"
                   @click="$emit('edit')"
                   class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                    <span class="material-icons text-xs">edit</span>
                    Edit</a>
            </li>
            <li>
                <a href="#"
                   @click="$emit('delete')"
                   class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                    <span class="material-icons text-xs">delete</span>
                    Remove</a>
            </li>
        </ul>
    </div>
</template>

<script>

export default {
    props: ['recordId','showAddTracker','showInfo','permissions'],
    data() {
        return {
            methods: {}
        }
    }
}
</script>
