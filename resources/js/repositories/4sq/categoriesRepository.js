import Repository from './repository';

const resource = 'venues/categories';

export default {
    get() {
        return Repository.get(resource);
    }
}