<script setup>
import PokemonItem from "@components/PokemonItem.vue"

defineProps({
    pokemons: {
        type: Array,
        required: true,
    },
})
</script>

<template>
    <ul>
        <PokemonItem v-for="pokemon in pokemons"
                     :pokemon="pokemon"
                     :key="pokemon.id" />
    </ul>
</template>

<style scoped>
ul {
    columns: 4;
    list-style: none;
}
</style>
