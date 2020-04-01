<template>
    <li class="list-group-item">
        <label>
            <input type="checkbox" v-model="selectedCategories" :value="category.id">
            <span>{{ category.name }}</span>
        </label>
        <ul class="list-group" v-if="category.categories.length > 0">
            <template v-for="subCategory in category.categories">
                <categories-list-item :category="subCategory" :key="subCategory.id"/>
            </template>
        </ul>
    </li>
</template>

<script>
    export default {
        name: 'categoriesListItem',
        props: {
            category: {
                type: Object
            }
        },
        computed: {
            selectedCategories: {
                get() {
                    return this.$store.getters.selectedCategories
                },
                set(val) {
                    this.$store.dispatch('setSelectedCategories', val);
                },
            }
        }
    }
</script>