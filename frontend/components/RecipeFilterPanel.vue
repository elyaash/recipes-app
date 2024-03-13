<template>
    <div >
    <div class="container mx-auto flex gap-x-2 mb-1 bg-gray-100">
        <div class="flex gap-x-2">

            <!-- <div class="flex gap-x-6 px-3 mb-6 md:mb-0"> -->
            <label class="hidden md:block mt-2 px-2 tracking-wide align-middle text-nowrap text-gray-700 text-xs font-bold" for="author-email">
                Author Email
            </label>
            <input class="appearance-none block bg-gray-200 text-gray-700 border rounded
                py-1 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" id="author-email"
                type="text"
                v-model="email"
                placeholder="Search By Author Email"
                >
            <label class="hidden md:block mt-2 text-nowrap tracking-wide text-gray-700 text-xs font-bold mb-2" for="keywords">
                Keyword
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded
                py-1 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" id="keywords"
                type="text"
                v-model="keyword"
                placeholder="Search By Keyword">
            <label class="hidden md:block mt-2 tracking-wide text-gray-700 text-xs font-bold mb-2" for="ingredients">
               Ingredient
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded
                py-1 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" id="ingredients"
                type="text"
                v-model="ingredient"
                placeholder="Search By Ingredient">
        </div>

        <div>
            <button

                @click="handleSearch" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded-full">
                Search {{ loading ? "...":"" }}
             </button>
        </div>
    </div>
</div>
</template>

<script setup>

import { useQuery } from '~/composables/useQuery';

let email = "";
let keyword = "";
let ingredient ="";

const emits = defineEmits(['fetch'])
let query = useQuery()
const {loading} = defineProps(['loading'])

function handleSearch() {

    query.email = email;
    query.keyword = keyword;
    query.ingredient = ingredient;
    emits("fetch",query)
}
</script>
