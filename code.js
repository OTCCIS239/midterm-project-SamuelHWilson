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
        right: true,
        rightDrawer: false,
        title: 'Name Here'
    }
})