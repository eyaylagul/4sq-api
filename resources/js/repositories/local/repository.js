import axios from 'axios';

const baseURL = `${process.env.MIX_APP_URL}/api`;
export default axios.create({
    baseURL
});
