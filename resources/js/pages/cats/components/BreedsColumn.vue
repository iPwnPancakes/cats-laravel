<script setup lang="ts">
import { Breed } from '@/types/models';
import { PropType } from 'vue';

const {getValue} = defineProps({
    getValue: {
        type: Function as PropType<() => Breed[]>,
        required: true
    }
});

const breeds = getValue();
</script>

<template>
    <span>
        <template v-if="breeds.length > 0">
            <span v-for="(breed, index) in breeds" :key="index">
                {{ breed.name }} ({{ breed.pivot.percentage }}%)<span v-if="index < breeds.length - 1">, </span>
            </span>
        </template>
        <span v-else>No breeds available</span>
    </span>
</template>