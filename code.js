Vue.component('page', {
    template: '#page'
})
new Vue({
    el: '#app',
    data: {
        drawer: false,
        items: [
            { icon: 'shopping_cart', title: 'Orders', href: "#" },
            { icon: 'store', title: 'Products', href: "#" }
        ],
        title: 'Name Here'
    }
})