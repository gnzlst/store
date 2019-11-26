(function () {
    'use strict';

    OMDC.admin.dashboard = function () {
        chartRevenue();
        chartOrder();
        //setInterval(chartOrder, 9000);
        //setInterval(chartRevenue, 9000);

        $(".sync-monthly-revenue").on('click', function (e) {
            chartRevenue();
            e.preventDefault();
        });

        $(".sync-monthly-orders").on('click', function (e) {
            chartOrder();
            e.preventDefault();
        });
    };

    function chartRevenue() {
        var revenue = document.getElementById('revenue');
        var revenueLabels = [];
        var revenueData = [];

        axios.get('/admin/charts').then(function (response) {
            response.data.revenues.forEach(function (monthly) {
                revenueData.push(monthly.amount);
                revenueLabels.push(monthly.new_date);
            });

            new Chart(revenue, {
                type: 'bar',
                data: {
                    labels: revenueLabels,
                    datasets: [
                        {
                            label: '# Revenue',
                            data: revenueData,
                            backgroundColor: [
                                '#f57c00',
                                "#0d47a1",
                                "#4BC0C0",
                                "#FFCE56",
                                "#1b5e20",
                                "#36A2EB",
                                '#311b92',
                                '#dd2c00',
                                '#263238',
                                '#81c784',
                                '#b9f6ca',
                                '#FF6384'
                            ]
                        }
                    ]
                },
                options: {
                    legend: {display: false},
                    title: {
                        display: true,
                        text: 'Revenue per Month'
                    },
                    animation: {
                        duration: 1800,
                        easing: 'easeInOutCubic'
                    }
                }
            });
        })
    }

    function chartOrder() {
        var order = document.getElementById('order');
        var orderLabels = [];
        var orderData = [];

        axios.get('/admin/charts').then(function (response) {
            response.data.orders.forEach(function (monthly) {
                orderData.push(monthly.count);
                orderLabels.push(monthly.new_date);
            });

            new Chart(order, {
                type: 'line',
                data: {
                    labels: orderLabels,
                    datasets: [
                        {
                            label: '# Orders',
                            data: orderData,
                            backgroundColor: [
                                '#f57c00',
                                "#0d47a1",
                                "#4BC0C0",
                                "#FFCE56",
                                "#1b5e20",
                                "#36A2EB",
                                '#311b92',
                                '#dd2c00',
                                '#263238',
                                '#81c784',
                                '#b9f6ca',
                                '#FF6384'
                            ]
                        }
                    ]
                },
                options: {
                    legend: {display: false},
                    title: {
                        display: true,
                        text: 'Orders per Month'
                    },
                    animation: {
                        duration: 1800,
                        easing: 'easeInOutCubic'
                    }
                }
            });
        })
    }

})();