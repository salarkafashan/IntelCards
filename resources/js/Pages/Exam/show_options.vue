<template>
    <app-layout>
      <div class="max-w-7xl mx-auto pt-5 sm:px-6 lg:px-8">
        <div>
          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900">
                  Test
                </h3> 
                <p class="mt-1 text-sm text-gray-600">
                  Test yourself with random cards and see your scoor!! 
                </p>
              </div>
            </div> 

            <div class="mb-8 md:col-span-2">
                <button class="inline-flex items-center px-4 py-2 m-4 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">
                    <inertia-link :href="'/exams/test/' + box.id +'-'+box.slug">
                        Test yourself
                    </inertia-link>
                </button>
            </div>
          </div> 

          <div class="hidden sm:block">
            <div class="py-8">
              <div class="border-t border-gray-200"></div>
            </div>
          </div>

        </div>
      </div>

    <div class="max-w-7xl mx-auto pb-5 sm:px-6 lg:px-8">
        <div>
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900">
                            Practice
                        </h3> 
                    <p class="mt-1 text-sm text-gray-600">
                        You can see answer side of cards if you can't remember them  
                    </p>
                </div>
            </div> 

            <div class="mb-8 md:col-span-2">
                <button class="inline-flex items-center px-4 py-2 m-4 bg-indigo-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-800 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">
                    <inertia-link :href="'/exams/practice/' + box.id +'-'+box.slug">
                        More Practice
                    </inertia-link>
                </button>
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
      box: Object,
    },
  }
</script>




<style>

</style>