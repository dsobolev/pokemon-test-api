<script setup>
import { computed } from "vue"
import PokemonItem from "@components/PokemonItem.vue"

const props = defineProps({
    pokemons: {
        type: Array,
        required: true,
    },
})

const isEmptyList = computed(() => props.pokemons.length === 0)
</script>

<template>
    <ul>
        <div v-if="isEmptyList">No pokemons found</div>
        <PokemonItem v-else
                     v-for="pokemon in pokemons"
                     :pokemon="pokemon"
                     :key="pokemon.id" />
    </ul>
</template>

<style scoped>
ul {
    list-style: none;
    text-align: center;
}

div {
    font-size: 24px;
    margin-top: 2em;
}
</style>
