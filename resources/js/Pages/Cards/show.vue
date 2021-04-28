<template>
    <app-layout> 
         <div class="relative ">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div>
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium text-gray-900">
                            Edit card
                            </h3> 
                            <p class="mt-1 text-sm text-gray-600">
                                Edit or delete this card
                            </p>
                        </div>
                    </div> 

                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form @submit.prevent="submit">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        
                                        <!-- input section -->
                                        <div class="col-span-6 sm:col-span-4">
                                            <label class="block font-medium text-sm text-gray-700" for="box_name">
                                                <span>Front </span>
                                            </label> 
                                            <input id="front" v-model="form.front" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" type="text" autocomplete="front"/>
                                            <div class="text-sm text-red-600" v-if="errors.front">{{ errors.front }}</div>
                                        </div> 
                                        <div class="col-span-6 sm:col-span-4">
                                            <label class="block font-medium text-sm text-gray-700" for="box_name">
                                                <span>Back </span>
                                            </label> 
                                            <input id="back" v-model="form.back" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" type="text" autocomplete="back"/>
                                            <div class="text-sm text-red-600" v-if="errors.back">{{ errors.back }}</div>
                                        </div> 
                                    </div>
                                </div> 
                                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button type="button" @click="isOpen = !isOpen" class="inline-flex items-center justify-center px-4 py-2 mr-6 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                                        Delete Box
                                    </button>
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">
                                    Edit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 

                <div class="hidden sm:block">
                    <div class="py-8">
                    <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium text-gray-900">
                            Card Detail
                            </h3> 
                            <p class="mt-1 text-sm text-gray-600">
                                Detail of this card like, level, create date, etc.
                            </p>
                        </div>
                    </div> 

                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="py-2"> 
                                    <svg class="inline h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path d="M21.5 12H16c-.7 2-2 3-4 3s-3.3-1-4-3H2.5"/><path d="M5.5 5.1L2 12v6c0 1.1.9 2 2 2h16a2 2 0 002-2v-6l-3.4-6.9A2 2 0 0016.8 4H7.2a2 2 0 00-1.8 1.1z"/>
                                    </svg>
                                    <span class="font-medium text-sm text-gray-700 pl-2">Box: {{box.name}}</span> 
                                </div>

                                <div class="py-2">
                                    <svg class="inline h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path d="M3 3v18h18"/><path d="M18.7 8l-5.1 5.2-2.8-2.7L7 14.3"/>
                                    </svg>
                                    <span class="font-medium text-gray-700 text-sm pl-2"> Level: {{card.level}} </span>    
                                </div>
                                
                                <div class="py-2">
                                    <svg class="inline h-5 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline>
                                    </svg>
                                    <span class="font-medium text-gray-700 text-sm pl-2">Create date : {{card.created_at.substring(0, 10)}}</span> 
                                </div>
                            </div> 
                        </div>
                    </div>
                </div> 

            </div>
        </div>
        <!-- Modal View -->
        <div v-show="isOpen">
            <div class="fixed z-10 inset-0 overflow-y-auto">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <!-- Heroicon name: exclamation -->
                                    <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                        Delete <span class="font-semibold">card</span>
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">
                                            - This action cannot be undone.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                            <inertia-link v-bind:href="'/cards/'+ card.id" method="delete" as="button" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                Delete
                            </inertia-link>
                            <button type="button" @click="isOpen = !isOpen" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'


export default {
    components: { 
        AppLayout,
    },

    props:{
        box: Object,
        card: Object,
        errors: Object,
    },
    data() {
        return { 
            form: {
            front: this.card.front,
            back: this.card.back
            },
            isOpen: false,
        }
    },
    methods: {
        submit() {
            this.$inertia.put('/cards/'+this.card.id, this.form)
        },
    },   
}
</script>

<style>

</style>