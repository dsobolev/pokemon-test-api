<script setup>
import PokemonList from '@components/PokemonList.vue'

const pokemons = {"status":"ok","count":1302,"pokemons": [{"id":31,"name":"nidoqueen"},{"id":32,"name":"nidoran-m"},{"id":33,"name":"nidorino"},{"id":34,"name":"nidoking"},{"id":35,"name":"clefairy"},{"id":36,"name":"clefable"},{"id":37,"name":"vulpix"},{"id":38,"name":"ninetales"},{"id":39,"name":"jigglypuff"},{"id":40,"name":"wigglytuff"},{"id":41,"name":"zubat"},{"id":42,"name":"golbat"},{"id":43,"name":"oddish"},{"id":44,"name":"gloom"},{"id":45,"name":"vileplume"},{"id":46,"name":"paras"},{"id":47,"name":"parasect"},{"id":48,"name":"venonat"},{"id":49,"name":"venomoth"},{"id":50,"name":"diglett"},{"id":51,"name":"dugtrio"},{"id":52,"name":"meowth"},{"id":53,"name":"persian"},{"id":54,"name":"psyduck"},{"id":55,"name":"golduck"},{"id":56,"name":"mankey"},{"id":57,"name":"primeape"},{"id":58,"name":"growlithe"},{"id":59,"name":"arcanine"},{"id":60,"name":"poliwag"}]}


</script>

<template>
    <PokemonList :pokemons="pokemons.pokemons"/>
</template>
