import Vue from 'vue';
import Vuex from 'vuex';
import RepositoryFactory from '@repositories/RepositoryFactory';
Vue.use(Vuex);

const ExploreRepository = RepositoryFactory.get('explore');

export default new Vuex.Store({
    state: {
        venue: 'valletta',
        categoryQuery: '',
        selectedCategories: [],
        groups: [],
    },
    getters: {
        venue: state => state.venue,
        categoryQuery: state => state.categoryQuery,
        selectedCategories: state => state.selectedCategories,
        groups: state => state.groups
    },
    mutations: {
        SET_VENUE (state, venue) {
            state.venue = venue;
        },
        SET_SELECTED_CATEGORIES (state, categories) {
            Vue.set(state, 'selectedCategories', categories);
        },
        SET_GROUPS (state, groups) {
            Vue.set(state, 'groups', groups);
        },
        SET_CATEGORY_QUERY(state, categoryName) {
            state.categoryQuery = categoryName;
        }
    },
    actions: {
        setVenue({ commit, dispatch }, val) {
            commit('SET_VENUE', val);
        },
        setCategoryQuery({ commit }, categoryName) {
            commit('SET_CATEGORY_QUERY', categoryName);
        },
        setSelectedCategories({ commit }, categories) {
            commit('SET_SELECTED_CATEGORIES', categories);
        },
        async getGroups({commit, getters}) {
            const {data: {response: {groups}}} = await ExploreRepository.get(
                getters.venue,
                getters.categoryQuery,
                getters.selectedCategories
            );

            commit('SET_GROUPS', groups);
        }
    }
});
