import axios from 'axios';

const baseURL = 'https://api.foursquare.com/v2';

export default axios.create({
    baseURL,
    params: {
        client_id: process.env.MIX_FOURSQUARE_CLIENT_ID,
        client_secret: process.env.MIX_FOURSQUARE_CLIENT_SECRET,
        v: (new Date).toISOString().slice(0,10).replace(/-/g,"")
    }
});
