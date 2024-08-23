<script setup>
import { ref, computed } from 'vue'
import { useRoute } from 'vue-router'
import PokemonProfile from '@components/PokemonProfile.vue'
import BackButton from '@components/BackButton.vue'

const route = useRoute()

const loading = ref(false)
const error = ref(false)

const profileData = ref({})
axios.get(`/api/pokemons/${route.params.id}`)
    .then(response => {
        if (response.data.status === 'fail') {
            loading.value = false
            error.value = true
        } else {
            profileData.value = response.data.profile
            loading.value = false
        }
    })
    .catch(e => {
        loading.value = false
        error.value = true
    })

</script>

<template>
    <div v-if="loading">Loading...</div>
    <div v-else-if="error">Data can not be fetched</div>
    <div v-else
         class="single-view">
        <BackButton class="back-button"/>
        <PokemonProfile :profile="profileData" />
    </div>
</template>

<style scoped>
.single-view {
    position: relative;
}

.back-button {
    position: absolute;
    top: -120px;
}
</style>
