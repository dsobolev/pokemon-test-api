<script setup>
import axios from "axios"
import { ref } from "vue"
import PokemonList from '@components/PokemonList.vue'

const pokemons = ref([])
const loading = ref(false)
const error = ref(false)

const pokemonsData = window.sessionStorage.getItem('pokemons')

if (null !== pokemonsData) {
    pokemons.value = JSON.parse(pokemonsData)
} else {
    loading.value = true

    axios.get("api/pokemons")
        .then(response => {
            if (response.data.status === 'fail') {
                loading.value = false
                error.value = true
            } else {
                pokemons.value = response.data.pokemons
                window.sessionStorage.setItem('pokemons', JSON.stringify(response.data.pokemons))

                loading.value = false
            }
        })
        .catch(e => {
            loading.value = false
            error.value = true
        })
}
</script>

<template>
    <div v-if="loading">Loading...</div>
    <div v-else-if="error">Data can not be fetched</div>
    <PokemonList v-else
                 :pokemons="pokemons"/>
</template>
