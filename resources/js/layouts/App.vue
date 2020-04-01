<template>
    <div class="container">
        <hr />
        <div class="row">
            <div class="col-md-3">
                <categories class="border-right"/>
            </div>
            <div class="col-md-9">
                <location-result />
            </div>
        </div>
    </div>
</template>
<script>
    import categories from '@components/categories'
    import locationResult from '@components/locationResult';

    export default {
        name: 'App',
        components: {
            categories,
            locationResult
        }
    }
</script>