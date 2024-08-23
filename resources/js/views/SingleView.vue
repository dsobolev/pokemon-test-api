<script setup>
import { computed } from 'vue'
import { useRoute } from 'vue-router'
import PokemonProfile from '@components/PokemonProfile.vue'
import BackButton from '@components/BackButton.vue'

const route = useRoute()
// route.params.id
const raw = {"status":"ok","data":{"name":"parasect","img":"https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/47.png","height":10,"weight":295,"species":"parasect","abilities":["effect-spore","dry-skin","damp"]}}
const profileData = raw.data;

</script>

<template>
    <div class="single-view">
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
