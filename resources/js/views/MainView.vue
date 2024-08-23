<script setup>
import { ref, computed } from "vue"
import PokemonList from '@components/PokemonList.vue'
import Filter from '@components/Filter.vue'

const pokemons = ref([])
const loading = ref(false)
const error = ref(false)

const pokemonsData = window.sessionStorage.getItem('pokemons')
if (null !== pokemonsData) {
    pokemons.value = JSON.parse(pokemonsData)
} else {
    loading.value = true

    axios.get("/api/pokemons")
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

function doFilter(event) {
    filterValue.value = event.filter
}

const filterValue = ref('')
const filteredPokemons = computed(() => {
    if (filterValue.value === '') {

        return pokemons.value
    }

    if (/^\d+$/.test(filterValue.value)) {
        // search by id
        const searchId = parseInt(filterValue.value)

        return pokemons.value.filter(item => item.id === searchId)
    } else {
        // search by name
        const searchTerm = filterValue.value

        return pokemons.value.filter(item => item.name.startsWith(searchTerm) )
    }
})
</script>

<template>
    <div v-if="loading">Loading...</div>
    <div v-else-if="error">Data can not be fetched</div>
    <div v-else>
        <Filter @do-filter="doFilter"
                class="filter" />
        <PokemonList :pokemons="filteredPokemons"/>
    </div>
</template>

<style scoped>
.filter {
    margin-bottom: 1em;
    text-align: center;
}
</style>
