<template>
    <div class="bg-gray-100 min-h-screen text-gray-900">
        <Title>{{ pageTitle }}</Title>
        <nav class="bg-white shadow text-lg px-6 py-2">
            <div class="container mx-auto flex items-center justify-betweeb px-6">
               <div>
                    <NuxtLink to="/"><img src="/logo.svg" width="50"></NuxtLink>
               </div> 
               <div>
                    <ul class="flex space-x-12 px-8">
                        <li>
                            <NuxtLink to="/">Recipes</NuxtLink>
                        </li>
                    </ul>
               </div>
            </div>
        </nav>
        <slot />
    </div>

</template>

<script setup>
const pageTitle = useState("pageTitle", ()=> "WAC Recipies")
</script>