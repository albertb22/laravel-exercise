<template>
    <div  class="flex items-start mb-4 text-sm">
        <img src="https://placehold.it/10x10" class="w-10 h-10 rounded mr-3">
        <div class="flex-1 overflow-hidden">
            <div>
                <span class="font-bold" v-text="message.name"></span>
                <span class="text-grey text-xs" v-text="message.date"></span>
            </div>
            <p class="text-black leading-normal" v-text="message.content"></p>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            message: {
                type: Object,
                default: ''
            },
        },
    }
</script>