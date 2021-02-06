<template>
    <div v-if="$page.props.flash.message && visible">
        <!-- Success notification section -->
        <div class="asolute flex max-w-xs w-full mx-6">
            <div class="text-sm text-gray-600">
            <div role="alert" class="px-2 py-1 leading-normal text-green-700  border border-green-500 rounded-md">
                <p>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle w-5 h-5 mx-1 inline"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path> <polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                {{$page.props.flash.message}}
                </p>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:{
        // flash:Array,
    },
    data() {
        return { 
            visible: true,
        }
    },
    watch:{
        flash: {
            handler(){
                this.visible = true;
            }
        }
    },
}
</script>

<style>

</style>