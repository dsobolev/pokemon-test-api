<script setup>
defineProps({
    pokemon: {
        type: Object,
        required: true,
    }
})
</script>

<template>
    <li>
        {{ pokemon.name }}
    </li>
</template>

<style scoped>
li {
    font-size: 18px;
    margin-bottom: .5em;
    padding: .5em;
    border: 3px solid #ffc908;
    border-radius: 1em;
    color: #3858a6;
    text-align: center;
    text-transform: capitalize;
}
</style>
