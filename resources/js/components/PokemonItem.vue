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
        <RouterLink :to="{ name: 'profile', params: { id: pokemon.id }}">{{ pokemon.name }}</RouterLink>
    </li>
</template>

<style scoped>
li {
    margin-bottom: .5em;
    text-align: center;
}

a {
    width: 100%;
    display: inline-block;
    border: 3px solid #ffc908;
    border-radius: 1em;
    font-size: 18px;
    padding: .5em;
    text-transform: capitalize;
    text-decoration: none;
    color: #3858a6;
}

a:hover {
    background-color: #eeeeee;
}
</style>
