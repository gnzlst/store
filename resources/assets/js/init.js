(function () {
    'use strict';
    $(document).foundation();

    $(document).ready(function ($) {
        switch ($("body").data("page-id")) {
            case 'home':
                OMDC.admin.menuActive();
                OMDC.admin.stickyNav();
                OMDC.homeslider.initCarousel();
                OMDC.homeslider.homePageProducts();
                break;
            case 'product':
                OMDC.product.details();
                break;
            case 'adminUsers':
                OMDC.admin.registerUser();
                break;
            case 'products':
            case 'categories':
                OMDC.products.display();
                break;
            case 'cart':
                OMDC.product.cart();
                break;
            case 'adminProduct':
                OMDC.admin.menuActive();
                OMDC.admin.stickyNav();
                OMDC.admin.changeEvent();
                OMDC.admin.delete();
                break;
            case 'adminDashboard':
                OMDC.admin.dashboard();
                break;
            case 'adminProductCategories':
                OMDC.admin.menuActive();
                OMDC.admin.stickyNav();
                OMDC.admin.update();
                OMDC.admin.delete();
                OMDC.admin.create();
                OMDC.admin.loadTimeAgo();
                break;
            default:
                OMDC.admin.menuActive();
                OMDC.admin.stickyNav();
        }
    })
})();