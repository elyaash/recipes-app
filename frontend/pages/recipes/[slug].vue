<template>
    <div class="container mx-auto p-2">
      <Title>{{ $route.params.slug }} | {{ pageTitle }}</Title>
      <div v-if="!data.recipe" class="w-full text-center">We apologize for the inconvenience, but unfortunately, we could not locate the recipe you were looking for. Please feel free to browse through our other recipes and find something else that interests you.</div>
      <RecipeCard v-if="data.recipe" :recipe="data.recipe" />
    </div>
</template>


<script setup>
import apiClient from "~/api/api-client"

const route = useRoute()
const pageTitle = useState("pageTitle");
let data = reactive({
  recipe: {}
})
let error = ref(false)

onMounted(() => {  
  apiClient.get("recipes/"+route.params.slug)
        .then(response => {
          data.recipe = response.data;
          error.value = false
    } ).catch(errpr => {
        error.value = true
    })
});    

</script>