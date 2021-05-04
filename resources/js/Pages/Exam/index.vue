<template>
    <app-layout>
      <!-- Show User's boxes -->
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div>
          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900">
                  Your Boxes
                </h3> 
                <p class="mt-1 text-sm text-gray-600">
                  Please choose one of your boxes
                </p>
              </div>
            </div> 
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow overflow-hidden sm:rounded-md">
                  <div class="px-4 py-5 bg-white sm:p-">
                    <div class="grid grid-cols-6 gap-6"> 
                      
                      <!-- Box Name -->
                      <div class="col-span-6 sm:col-span-4">
                        <div v-for="box in boxes" :key="box.id">
                          <inertia-link :href="'exams/' + box.id +'-'+box.slug">
                              <label class="cursor-pointer block font-medium text-sm text-blue-700 my-2" for="first_name">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle mx-1 inline mb-1">
                                  <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                {{box.name}}
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
    </app-layout>
</template>
<script>

  import AppLayout from '@/Layouts/AppLayout'


  export default {
    components: 
    {
      AppLayout,
    },
    props: {
      boxes: Object,
    },
  }
</script>