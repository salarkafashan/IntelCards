<template>
    <app-layout> 
         <div class="relative ">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div>
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium text-gray-900">
                            Edit {{box.name}} Box
                            </h3> 
                            <p class="mt-1 text-sm text-gray-600">
                                Edit or delete this box
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
                                            <span>Box name</span>
                                            </label> 
                                            <input id="name" v-model="form.name" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" type="text" autocomplete="name"/>
                                            <!-- <div class="text-sm text-red-600" v-if="errors.name">{{ errors.name }}</div> -->
                                        </div> 

                                    </div>
                                </div> 
                                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    
                                    <!-- Success notification section -->
                                    <div class="mr-3">
                                        <div class="text-sm text-gray-600" style="display: none;">
                                            <div role="alert" class="px-2 py-1 leading-normal text-green-700  border border-green-500 rounded-md">
                                            <p>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle w-5 h-5 mx-1 inline"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path> <polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                                Saved
                                            </p>
                                            </div>
                                        </div>
                                    </div> 
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

            </div>
        </div>
      
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div>
          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900">
                 {{box.name}} Box
                </h3> 
                <p class="mt-1 text-sm text-gray-600">
                  You have <span class="font-semibold">{{cards.length}}</span> cards in this box, click on them to edit
                </p>
              </div>
            </div> 
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow overflow-hidden sm:rounded-md">
                  <div class="px-4 py-5 bg-white sm:p-">
                    <div class="grid grid-cols-1"> 
                      
                      <!-- Box Name -->
                      <div class="col-span- sm:col-span-4">

                            <div class="grid grid-cols-2 md:grid-cols-3">
                                <div v-for="card in cards" :key="card.id">
                                    <inertia-link :href="'boxes/' + card.id">
                                        <label class="cursor-pointer block font-light text-base text-blue-700 my-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle mx-1 inline mb-1">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            </svg>
                                            {{card.front}}
                                        </label> 
                                    </inertia-link>
                                </div>
                            </div> 
                        </div>
                    </div>
                  </div> 
                </div>
            </div>
          </div> 
        </div>
      </div>


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
                                        Delete Box
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">
                                            Are you sure you want to delete this box? All of your data will be permanently removed. This action cannot be undone.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                            <inertia-link :href="'boxes/' + box.id" method="delete" as="button" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
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

    props: ['cards','box'],

    data() {
        return { 
            form: {
            name: null,
            _token: this.$page.props.csrf_token,
            },
            isOpen: false,
        }
    },
    methods: {
      submit() {
        this.$inertia.put('/boxes', this.form)
      },
  },   
}
</script>

<style>

</style>