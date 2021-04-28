<template>
    <transition name="slide-fade">
        <div v-if="$page.props.flash.message">
            <div v-if="show" class="fixed z-40 container mt-2.5 text-right">
                <div class="bg-white shadow inline-block leading-normal px-2 py-1 rounded-md text-green-700 text-sm">
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle w-5 h-5 mx-1 inline"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path> <polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        {{$page.props.flash.message}}
                    </p>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    data() {
        return { 
            // visible: true,
            show: true
        }
    },
    // watch:{
    //     flash: {
    //         handler(){
    //             this.visible = true;
    //         }
    //     }
    // },
}
</script>

<style>
    .slide-fade-enter-active {
    transition: all .3s ease;
    }
    .slide-fade-leave-active {
        transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter, .slide-fade-leave-to{
        transform: translateX(10px);
        opacity: 0;
    }
</style>