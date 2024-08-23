<script setup>
import { computed } from 'vue'

const props = defineProps({
    profile: {
        type: Object,
        required: true,
    }
})

const abilities = computed(() =>
    props.profile.abilities.map(item =>
        item.replaceAll('-', ' ')
))
</script>

<template>
    <section>
        <h3>{{ profile.name }}</h3>
        <div class="profile">
            <img :src="profile.img" />
            <table>
                <tr>
                    <th>Height/Weight</th>
                    <td>{{ profile.height }}/{{ profile.weight }}</td>
                </tr>
                <tr>
                    <th>Spieces</th>
                    <td>{{ profile.species }}</td>
                </tr>
                <tr>
                    <th>Abilities</th>
                    <td>
                        <ul>
                            <li v-for="ability in abilities"
                                  class="ability">
                                {{ ability }}
                            </li>
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
    </section>
</template>

<style scoped>
h3 {
    font-size: 36px;
    text-transform: capitalize;
    text-align: center;
}

.profile {
    display: flex;
    align-items: center;
}

img {
    width: 400px;
    margin-right: 1em;
}

table {
    font-size: 24px;
}

td, th {
    padding-bottom: .5em;
}

th {
    text-align: left;
    padding-right: 1em;
}

ul {
    margin-left: 1em;
}

li {
    text-transform: capitalize;
}
</style>
