<template>
    <div class="well">
        <h1>Valetta Locations by
            <input type="text" v-model="category" placeholder="Category Name">
            <button type="button" class="btn btn-primary" @click="getGroups">GET</button>
        </h1>

        <ul class="list-group" v-for="group in groups">
            <li class="list-group-item">
                {{ group.type}}
                <ul class="list-group">
                    <li v-for="item in group.items">
                        {{item.venue.name}}
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    export default {
        name: 'locationResult',
        computed: {
            ...mapGetters([
                'groups'
            ]),

            category: {
                get() {
                    return this.$store.getters.categoryQuery;
                },
                set(val) {
                    this.$store.dispatch('setCategoryQuery', val);
                }
            }
        },
        methods: {
            ...mapActions([
                'getGroups'
            ]),
        }

    }
</script>