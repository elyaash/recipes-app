<template>
    <div class="flex flex-col gap-1 w-1/3"  >
        <h1 class="font-bold">Ingredients:</h1>
        <ul class="px-5 flex flex-col gap-1">
                <li class="divide-y divide-gray-100 list-disc text-base"
                    v-for="item in ingredients.ingredients"  
                    :key = "item.id"  
                >
                    {{ item.ingredient }}
                </li>
        </ul>
    </div>
</template>

<script setup>
const ingredients = defineProps(['ingredients','direction'])
</script>
