<template>
    <div class="flex-1 flex flex-col bg-white overflow-hidden">
        <template v-if="activeChannel === null">
            <div class="flex items-center content-center justify-center h-full">
                Loading, please wait...
            </div>
        </template>
        <template v-else>
            <!-- Top bar -->
            <div class="border-b flex px-6 py-2 items-center flex-none">
                <div class="flex flex-col">
                    <h3 class="text-grey-darkest mb-1 font-extrabold">#{{ activeChannel.name }}</h3>
                    <div class="text-grey-dark text-sm truncate" v-text="activeChannel.description"></div>
                </div>
            </div>
            <!-- Chat messages -->
            <div class="px-6 py-4 flex-1 overflow-y-scroll">
                <!-- A message -->
                <div v-for="(message, index) in activeChannel.messages" :key="index" class="flex items-start mb-4 text-sm">
                    <img src="https://placehold.it/10x10" class="w-10 h-10 rounded mr-3">
                    <div class="flex-1 overflow-hidden">
                        <div>
                            <span class="font-bold" v-text="message.name"></span>
                            <span class="text-grey text-xs" v-text="message.date"></span>
                        </div>
                        <p class="text-black leading-normal" v-text="message.content"></p>
                    </div>
                </div>
            </div>
            <div class="pb-6 px-4 flex-none">
                <div class="flex rounded-lg border-2 border-grey overflow-hidden">
                    <span class="text-3xl text-grey border-r-2 border-grey p-2">
                        <svg class="fill-current h-6 w-6 block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M16 10c0 .553-.048 1-.601 1H11v4.399c0 .552-.447.601-1 .601-.553 0-1-.049-1-.601V11H4.601C4.049 11 4 10.553 4 10c0-.553.049-1 .601-1H9V4.601C9 4.048 9.447 4 10 4c.553 0 1 .048 1 .601V9h4.399c.553 0 .601.447.601 1z"/></svg>
                      </span>
                    <input type="text" class="w-full px-4" placeholder="Message #general" />
                </div>
            </div>
        </template>
    </div>
</template>

<script>
    export default {
        props: {
            activeChannel: {
            },
        },

        watch: {
            activeChannel(newValue, oldValue) {
                if (newValue !== null) {

                }
            }
        },
    }
</script>