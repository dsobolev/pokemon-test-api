<script setup>
import PokemonList from '@components/PokemonList.vue'

const pokemons = {"status":"ok","count":1302,"0":{"id":31,"name":"nidoqueen"},"1":{"id":32,"name":"nidoran-m"},"2":{"id":33,"name":"nidorino"},"3":{"id":34,"name":"nidoking"},"4":{"id":35,"name":"clefairy"},"5":{"id":36,"name":"clefable"},"6":{"id":37,"name":"vulpix"},"7":{"id":38,"name":"ninetales"},"8":{"id":39,"name":"jigglypuff"},"9":{"id":40,"name":"wigglytuff"},"10":{"id":41,"name":"zubat"},"11":{"id":42,"name":"golbat"},"12":{"id":43,"name":"oddish"},"13":{"id":44,"name":"gloom"},"14":{"id":45,"name":"vileplume"},"15":{"id":46,"name":"paras"},"16":{"id":47,"name":"parasect"},"17":{"id":48,"name":"venonat"},"18":{"id":49,"name":"venomoth"},"19":{"id":50,"name":"diglett"},"20":{"id":51,"name":"dugtrio"},"21":{"id":52,"name":"meowth"},"22":{"id":53,"name":"persian"},"23":{"id":54,"name":"psyduck"},"24":{"id":55,"name":"golduck"},"25":{"id":56,"name":"mankey"},"26":{"id":57,"name":"primeape"},"27":{"id":58,"name":"growlithe"},"28":{"id":59,"name":"arcanine"},"29":{"id":60,"name":"poliwag"}}


</script>

<template>
    <PokemonList :pokemons="pokemons"/>
</template>
