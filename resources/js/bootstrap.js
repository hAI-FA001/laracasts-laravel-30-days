// this file bootstraps the frontend dependencies
// in this case, hx-request are common to make so Laravel sets up initial config

import axios from "axios";
window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
