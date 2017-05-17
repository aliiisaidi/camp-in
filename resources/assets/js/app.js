require('./bootstrap');

window.Vue = require('vue');
/**
 * VueJs Components
 */

/**
 * Authentication
 */
Vue.component('form-inscription', require('./components/home/form-inscription.vue'));
Vue.component('form-connexion', require('./components/home/form-connexion.vue'));

/**
 * Navigation
 */
Vue.component('camping-card', require('./components/user/card.vue'));
Vue.component('navigation-cards', require('./components/user/navigation-cards.vue'));

/**
 * Favoris
 */
Vue.component('favoris-cards', require('./components/user/favoris-cards.vue'));

/**
 * Administration
 */
Vue.component('form-json-upload', require('./components/admin/form-json-upload.vue'));
Vue.component('form-ajout-camping', require('./components/admin/form-ajout-camping.vue'));
Vue.component('upload-image', require('./components/admin/upload-image.vue'));
Vue.component('edit-image', require('./components/admin/edit-image.vue'));
Vue.component('single-camping', require('./components/admin/single-camping.vue'));
Vue.component('consultation-campings', require('./components/admin/consultation-campings.vue'));
Vue.component('campings-table', require('./components/admin/campings-table.vue'));
Vue.component('clients-table', require('./components/admin/clients.vue'));
Vue.component('edit-password-admin', require('./components/admin/edit-password-admin.vue'));

Vue.component('statistiques-classement', require('./components/admin/statistiques/classement.vue'));
Vue.component('statistiques-categories', require('./components/admin/statistiques/categories.vue'));
Vue.component('statistiques-inscriptions', require('./components/admin/statistiques/inscriptions.vue'));
Vue.component('statistiques-favoris', require('./components/admin/statistiques/favoris.vue'));

Vue.component('carte', require('./components/admin/carte.vue'));




const app = new Vue({
    el: '#app'
});
