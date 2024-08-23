<script setup>
import { useRouter } from 'vue-router'

const router = useRouter()

function back() {
    router.push({ name: 'main' })
}
</script>

<template>
    <button @click="back()">&#10094; Back</button>
</template>

<style scoped>
button {
    font-size: 16px;
    padding: .5em 1em;
    border: 3px solid grey;
    border-radius: 1em;
    background-color: transparent;
    color: grey;
}

button:hover {
    background-color: lightgrey;
}
</style>
