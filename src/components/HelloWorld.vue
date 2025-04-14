<script setup>
import { ref, onMounted, computed } from 'vue'

const logs = ref([])
const selectMethod = ref('')
const currentPage = ref(1)

onMounted(async () => {
    const response = await fetch('http://appachelogs/getLogs.php')
    const data = await response.json()
    logs.value = data.error ? [] : data
})


const filteredLogs = computed(() => {
    return logs.value.filter(log => {
        if (!selectMethod.value) {
            return true;
        } else {
            return log.method === selectMethod.value;
        }
    });
});


const itemsPerPage = 10
const totalPages = computed(() => Math.ceil(filteredLogs.value.length / itemsPerPage))

const paginatedLogs = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage
    return filteredLogs.value.slice(start, start + itemsPerPage)
})

function prevPage() {
    currentPage.value--
}

function nextPage() {
    currentPage.value++
}

</script>

<template>
    <div class="bg-gray-200 p-4">
        <h1 class="text-2xl text-blue-500">Logs</h1>
    </div>

    <div class="mb-4 mt-4 flex flex-col items-center">
        <label class="mb-2">Фильтр по методу:</label>
        <select v-model="selectMethod" class="px-2 py-1 border rounded">
            <option value="">Все методы</option>
            <option value="GET">GET</option>
            <option value="POST">POST</option>
            <option value="PUT">PUT</option>
            <option value="DELETE">DELETE</option>
        </select>
    </div>

    <pre
        class="bg-white text-black p-4 rounded-lg font-mono overflow-x-auto border mb-2"
        v-for="log in paginatedLogs"
        :key="log.id"
    >
        <strong class="text-blue-600">[{{ log.id }}]</strong>
        {{ log.raw }}
    </pre>

    <div class="flex justify-center items-center gap-4 mt-4">
        <button
            class="bg-green-400 px-4 py-2 rounded disabled:bg-gray-300"
            @click="prevPage"
            :disabled="currentPage === 1"
        >
            Назад
        </button>

        <span class="text-black text-center">Страница {{ currentPage }} из {{ totalPages }}</span>

        <button
            class="bg-green-400 px-4 py-2 rounded disabled:bg-gray-300"
            @click="nextPage"
            :disabled="currentPage === totalPages"
        >
            Вперед
        </button>
    </div>

</template>

<style scoped>
</style>