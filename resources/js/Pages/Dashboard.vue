<template>
    <app-layout>
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template> -->

        <MainPanel />
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import MainPanel from '@/Jetstream/MainPanel'

    export default {
        components: {
            AppLayout,
            MainPanel,
        },
    }
</script>
