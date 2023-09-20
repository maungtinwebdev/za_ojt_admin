<template>
    <div>
        <!-- <h1>Laravel + Vue VuePage</h1> -->
        <CompanyComponent/>
    </div>
</template>

<script>
import CompanyComponent from './CompanyComponent.vue';
export default {
    name: 'laravelvue',
    components: [
        CompanyComponent,
    ],
    components: { CompanyComponent }
}
</script>
