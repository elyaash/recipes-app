<template>
    <div >
        <ul v-if="data.recipes.length" class="divide-y divide-gray-100 bg-white px-2 py-2 mt-2">
            <li v-for="recipe in data.recipes" class="flex justify-between gap-x-6" :key="recipe.id">
                <div class="min-w-0 flex-auto mt-4">
                    <div class="flex flex-row justify-between text-sm font-semibold leading-6 text-gray-900 ">

                    </div>
                    <div class="cursor-pointer text-3xl">
                            <NuxtLink :to="`/recipes/${recipe.slug}`" > {{ recipe.name }}</NuxtLink>
                     </div>
                    <div class="text-sm font-bold">
                            Auther Email: {{ recipe.author.email }}
                     </div>
                    <p class="mt-1 text-lg leading-5 text-gray-500 mb-4">{{ recipe.description }}</p>
                    <div class="flex flex-row">
                         <Ingredients :ingredients = "recipe.ingredients" />
                         <Steps :steps = "recipe.steps" />
                   </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script setup>


const {data} = defineProps({
    data: Object
})
</script>
