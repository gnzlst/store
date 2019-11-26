(function () {
    'use strict';

    OMDC.admin.menuActive = function () {
        $('.nav > li > a[href="' + window.location.pathname + '"]').parent().addClass('active', 'current-menu-item');
    };
})();