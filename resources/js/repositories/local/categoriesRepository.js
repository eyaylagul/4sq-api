import Repository from './repository';

const resource = '/categories';

export default {
    get() {
        return Repository.get(resource);
    }
}