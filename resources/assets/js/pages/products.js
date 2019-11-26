(function () {
    'use strict';

    OMDC.products.display = function () {
        var app = new Vue({
            el:'#root',
            data: {
                products: [],
                count: 0,
                loading: false,
                next: 6,
                targetElement: $('.display-products'),
                loadMoreEndpoint: '/products/category/load-more'
            },
            methods:{
                stringLimit: function (string, value) {
                    return OMDC.module.truncateString(string, value);
                },
                addToCart: function (id) {
                    OMDC.module.addItemToCart(id, function (message) {
                        $(".notify").css("display", 'block').delay(4000).slideUp(300)
                            .html(message);
                    });
                },
                loadMoreProducts: function () {
                    var token = this.targetElement.data('token');
                    var urlParams = this.targetElement.data('urlparams');
                    this.loading = true;
                    var postData = { next: this.next, token: token, count: this.count };

                    if(typeof urlParams !== 'undefined' && urlParams){
                        postData.slug = urlParams.slug;
                        if(typeof urlParams.subcategory !== 'undefined'){
                            postData.subcategory = urlParams.subcategory;
                        }
                    }
                    OMDC.module.loadMore(this.loadMoreEndpoint, postData, function (response) {
                        app.products = response.products;
                        app.count = response.count;
                        app.loading = false;
                        app.next  += 1;
                    });
                }
            },
            created: function () {
                this.loadMoreProducts();
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
