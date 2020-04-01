<template>
    <div>
        <ul class="list-group" id="categoryList">
            <template v-for="category in categories">
                <category-list-item :category="category"/>
            </template>
        </ul>
    </div>
</template>

<script>
    import categoryListItem from './categoriesListItem';

    import RepositoryFactory from '@repositories/RepositoryFactory';

    const CategoriesRepository = RepositoryFactory.get('categories');

    export default {
        name: 'categoriesList',
        data: () => ({
            categories: []
        }),
        components: {
            categoryListItem
        },
        async created() {
            const {data: {response: {categories}}} = await CategoriesRepository.get();
            this.categories = categories;
        }
    }
</script>


<style lang="scss">
    #categoryList {
        max-height: calc(100vh - 66px);
        overflow-y: scroll;
    }
</style>