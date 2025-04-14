<script setup>
import { ref, onMounted } from 'vue'

const logs = ref('Загрузка...')

onMounted(async () => {
    const response = await fetch('http://appachelogs/getLogs.php')
    const text = await response.text()
    logs.value = text
})
</script>

<template>
    <div>
        <h2>Логи:</h2>
        <pre  v-html="logs"></pre>

    </div>
</template>

<style scoped>
h2{
    color: #000000;
}

pre {
    background: #ffffff;
    color: #000000;
    padding: 1rem;
    border-radius: 8px;
    font-family: monospace;
    overflow-x: auto;
}
</style>