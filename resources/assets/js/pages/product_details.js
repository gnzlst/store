(function () {
    'use strict';

    OMDC.product.details = function () {
        var app = new Vue({
            el:'#product',
            data: {
                product: [],
                category: [],
                subCategory: [],
                similarProducts: [],
                productId: $('#product').data('id'),
                loading: false
            },
            methods:{
                getProductDetails: function () {
                    this.loading = true;
                    setTimeout(function () {
                        axios.get('/product-details/' + app.productId).then(function (response) {
                            app.product = response.data.product;
                            app.category = response.data.category;
                            app.subCategory = response.data.subCategory;
                            app.similarProducts = response.data.similarProducts;
                            app.loading = false;
                        });
                    }, 900);
                },
                stringLimit: function (string, value) {
                    return OMDC.module.truncateString(string, value);
                },
                addToCart: function (id) {
                    OMDC.module.addItemToCart(id, function (message) {
                        $(".notify").css("display", 'block').delay(4500).fadeOut(1000).html(message);
                    });
                }
            },
            created: function () {
                this.getProductDetails();
            }
        });
    }

})();
