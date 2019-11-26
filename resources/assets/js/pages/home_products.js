(function () {
    'use strict';

    OMDC.homeslider.homePageProducts = function () {
        var app = new Vue({
            el: '#root',
            data: {
                featured: [],
                products: [],
                count: 0,
                loading: false
            },
            methods: {
                getFeaturedProducts: function () {
                    this.loading = true;
                    axios.all(
                        [
                            axios.get('/featured-products'),
                            axios.get('/get-products')
                        ]
                    ).then(axios.spread(function (featuredResponse, productsResponse) {
                        app.featured = featuredResponse.data.featured;
                        app.products = productsResponse.data.products;
                        app.count = productsResponse.data.count;
                        app.loading = false;
                    }));
                },
                stringLimit: function (string, value) {
                    return OMDC.module.truncateString(string, value);
                },
                addToCart: function (id) {
                    OMDC.module.addItemToCart(id, function (message) {
                        $(".notify").css("display", 'block').delay(4500).fadeOut(1000).html(message);
                    });
                },
                loadMoreProducts: function () {
                    var token = $('.display-products').data('token');
                    this.loading = true;
                    var postdata = { next: 2, token: token, count: this.count };
                    OMDC.module.loadMore('/load-more', postdata, function (response) {
                        app.products = response.products;
                        app.count = response.count;
                        app.loading = false;
                    });
                }
            },
            created: function () {
                this.getFeaturedProducts();
            },
            mounted: function () {
                $(window).scroll(function () {
                    if($(window).scrollTop() + $(window).height() == $(document).height()){
                        app.loadMoreProducts();
                    }
                })
            }
        });
    }
})();
