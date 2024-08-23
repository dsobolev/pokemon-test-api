<script setup>
const emit = defineEmits({
    doFilter: ({ filter }) => {
        if (filter.length === 0) {
            return false
        }

        if ( /^(\w|\d)+$/.test(filter) ) {
            return true
        } else {
            console.warn('Please use letters and digits only')
            return false
        }
    },
})
const filterValue = defineModel()

function filterEmit() {
    emit('doFilter', { filter: filterValue.value.trim().toLowerCase() })
}
</script>

<template>
    <div>
        <input v-model="filterValue" />
        <button @click="filterEmit">Search</button>
    </div>
</template>

<style scoped>
    input, button {
        font-size: 24px;
        border-radius: .5em;
        padding: .2em 1em;
        border: 3px solid grey;
    }

    input {
        margin-right: .5em;
    }

    button {
        background-color: transparent;
        color: grey;
    }

    button:hover {
        background-color: lightgrey;
    }
</style>
