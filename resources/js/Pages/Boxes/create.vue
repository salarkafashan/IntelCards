<template>
     <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div>
          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900">
                  Add New Box
                </h3> 
                <p class="mt-1 text-sm text-gray-600">
                  You can add as many box want from here
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
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">
                      Save
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
</template>
<script>

  export default {

    props: {
    errors: Object,
  },
    data() {
      return { 
        form: {
          name: null,
          _token: this.$page.props.csrf_token,
        },
      }
    },
    methods: {
      submit() {
        this.$inertia.post('/boxes', this.form)
      },
  }, 
  }
</script>
