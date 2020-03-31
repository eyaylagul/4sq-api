<template>
    <div>
        App.vue
    </div>
</template>
<script>
    import RepositoryFactory from '@repositories/RepositoryFactory';
    const CategoriesRepository = RepositoryFactory.get('categories');

    export default {
        name: 'App',
        async created() {
            const {data} = await CategoriesRepository.get();
            console.log(data);
        }
    }
</script>