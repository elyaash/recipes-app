<template>
    <div class="flex flex-col gap-1">
        <h1 class="font-bold">Steps:</h1>
        <ul class="px-5">
                <li class="divide-y divide-gray-100 mt-1 py-1 leading-5"
                    v-for="(item,index) in steps.steps"   
                    :key = "item.id"   
                >
                   <span class="px-3 font-bold text-sm">{{ index+1 }}.</span>{{ item.step }}
                </li>
        </ul>
    </div>
</template>

<script setup>
const steps = defineProps(['steps'])
</script>
