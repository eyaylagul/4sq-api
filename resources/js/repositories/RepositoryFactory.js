import CategoriesRepository4sq from './4sq/categoriesRepository';
import CategoriesRepositoryLocal from './local/categoriesRepository';
import CategoriesRepositoryStatic from './static/categoriesRepository';


const repositories = {
    categories: CategoriesRepositoryStatic
};

export default {
    get: name => repositories[name]
};