<template>
        <div class="flex flex-col item-center">
        <div class="flex flex-col bg-white px-2">
            <div class="mb-3">
                <p class="text-3xl mt-2">{{ recipe.name }}</p>
                <p class="text-sm font-bold mb-2">
                            Auther: {{ recipe.author?.email }}
                </p>
                <p class="mt-2 leading-5 text-gray-500 text-lg">{{ recipe.description }}</p>
            </div>
            <div class="flex flex-row w-full">
                <Ingredients :ingredients="recipe.ingredients" />
                <Steps :steps="recipe.steps" />
            </div>
        </div> 
        <div>
        <NuxtLink to="/" class="text-center">
            <button class="mt-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Back to Recipes
            </button>
        </NuxtLink>
        </div>
    </div>
</template>

<script setup>


const {recipe} =  defineProps({
    recipe: Object,
   })

</script>