<template>
    <Error v-if="error"/>
    <div v-if="!error" class="container mx-auto p-2">
        <Title>Recipes | {{ pageTitle }}</Title>
        <RecipeFilterPanel @fetch="handleSearch" :loading="loading"/>
        <div v-if="!data.recipes.length" class="w-full text-center">We're sorry, but we couldn't find any recipe that matches your search. Please try searching for something else</div>
        <Recipes :data="data"  />
        <Pagination v-if="data.recipes.length" :pagination="data.pagination" @handlePageClick="handlePageClick" />  
     </div>
</template>

<script setup>

import apiClient from "~/api/api-client"
import { useRecipes} from "~/composables/useRecipes"
import { useQuery } from '~/composables/useQuery';

const pageTitle = useState("pageTitle");
let query = useQuery();
let data = useRecipes()
let error = ref(false)
let loading = ref(false)

function handlePageClick(page) {
    query.page = page
    fetch(query)
}
function fetch(query) {
    loading.value = true
    apiClient.get("recipes", {params: query})
        .then(response => {
            data.recipes = response.data.data;
            data.pagination = {
                current_page: response.data.current_page,
                from: response.data.from,
                last_page :response.data.last_page,
                total:response.data.total
            }
            error.value = false;
            loading.value = false
    } ).catch(err => {
        console.log(err)
        error.value = true;
        loading.value = false
    })
}
function handleSearch(query) {
    fetch(query)
}

onMounted(() => {
    fetch(query)
});
</script>
