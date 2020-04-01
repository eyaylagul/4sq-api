### Install dependencies and configuration
```
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ npm install
```

### Resources
There are three api-resource option for Client-Side
* [ ] 4sq (direct)- api.foursquare.com
   - `client_id` , `client_secret` **required**
* [ ] local (Laravel) -  127.0.0.1
   - `client_id`, `client_secret` **required**
* [x] static (files) - `categories.json`, `explores.json`

<br />
<br />

#### Set client_id & client_secret key
```
.env

FOURSQUARE_CLIENT_ID=XXXXXX
FOURSQUARE_CLIENT_SECRET=XXXXXX
```

<br />

##### You can choose these option from:

`resources/js/repositories/RepositoryFactory.js`
```js
// 4sq
import CategoriesRepository4sq from './4sq/categoriesRepository';
import ExploreRepository4sq from './4sq/exploreRepository';

// local
import CategoriesRepositoryLocal from './local/categoriesRepository';
import ExploreRepositoryLocal from './local/exploreRepository';

// static
import CategoriesRepositoryStatic from './static/categoriesRepository';
import ExploreRepositoryStatic from './static/exploreRepository';

const repositories = {
    categories: CategoriesRepositoryStatic,
    explore: ExploreRepositoryStatic
};
```

<br />
<br />


### Build and create web server
```
$ npm run prod
$ php artisan serve
```

Available on: http://127.0.0.1:8000