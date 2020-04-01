import Repository from './repository';

const resource = 'venues/explore';

export default {
    get(near, query = '', categoryIds = []) {
        return Repository.get(resource, {
            params: {
                near,
                ... (query.length > 0 ) && {query},
                ... (categoryIds.length > 0 ) && {categoryId: categoryIds.join()}
            }
        });
    }
}