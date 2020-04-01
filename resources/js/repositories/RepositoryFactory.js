import CategoriesRepository4sq from './4sq/categoriesRepository';
import ExploreRepository4sq from './4sq/exploreRepository';

import CategoriesRepositoryLocal from './local/categoriesRepository';

import CategoriesRepositoryStatic from './static/categoriesRepository';
import ExploreRepositoryStatic from './static/exploreRepository';


const repositories = {
    categories: CategoriesRepositoryStatic,
    explore: ExploreRepositoryStatic
};

export default {
    get: name => repositories[name]
};