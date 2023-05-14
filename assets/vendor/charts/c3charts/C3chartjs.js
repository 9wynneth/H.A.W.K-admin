(function(window, document, $, undefined) {
    "use strict";
    $(function() {

        if ($('#c3chart_area').length) {
            var chart = c3.generate({
                bindto: "#c3chart_area",
                data: {
                    columns: [
                        ['Male', 7000, 12800, 12500, 11000, 9000, 12200, 13000,13120,14200,10000,10200,11000],
                        ['Female', 14000, 14350, 16200, 15300, 16700, 17200,14500,13200,16650,13000,12154,17900]
                    ],
                    types: {
                        Male: 'area',
                        Female: 'area-spline'
                    },
                    colors: {
                        Male: '#5969ff',
                        Female: '#ff407b',

                    }

                },
                axis: {

                    y: {
                        show: true




                    },
                    x: {
                        show: true,
                        tick: {
                            values: [0, 1, 2, 3, 4, 5,6,7,8,9,10,11,12],
                            format: function(x) {
                                var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                                return months[x];
                            }
                        }
                    }
                }

            });
        }


        if ($('#c3chart_spline').length) {
            var chart = c3.generate({
                bindto: "#c3chart_spline",
                data: {
                    columns: [
                        ['Male', 30, 200, 100, 400, 150, 250],
                        ['Female', 130, 100, 140, 200, 150, 50]
                    ],
                    type: 'spline',
                    colors: {
                         Male: '#5969ff',
                        Female: '#ff407b',

                    }
                },
                axis: {
                    y: {
                        show: true,


                    },
                    x: {
                        show: true,
                    }
                }
            });
        }

        if ($('#c3chart_zoom').length) {
            var chart = c3.generate({
                bindto: "#c3chart_zoom",
                data: {
                    columns: [
                        ['sample', 30, 200, 100, 400, 150, 250, 150, 200, 170, 240, 350, 150, 100, 400, 150, 250, 150, 200, 170, 240, 100, 150, 250, 150, 200, 170, 240, 30, 200, 100, 400, 150, 250, 150, 200, 170, 240, 350, 150, 100, 400, 350, 220, 250, 300, 270, 140, 150, 90, 150, 50, 120, 70, 40]
                    ],
                    colors: {
                        sample: '#5969ff'


                    }
                },
                zoom: {
                    enabled: true
                },
                axis: {
                    y: {
                        show: true,


                    },
                    x: {
                        show: true,
                    }
                }

            });
        }


        if ($('#c3chart_scatter').length) {
            var chart = c3.generate({
                bindto: "#c3chart_scatter",
                data: {
                    xs: {
                        Man: 'Man_x',
                        Women: 'Women_x',
                    },
                    // iris data from R
                    columns: [
                        ["Man_x", 3.5, 3.0, 3.2, 3.1, 3.6, 3.9, 3.4, 3.4, 2.9, 3.1, 3.7, 3.4, 3.0, 3.0, 4.0, 4.4, 3.9, 3.5, 3.8, 3.8, 3.4, 3.7, 3.6, 3.3, 3.4, 3.0, 3.4, 3.5, 3.4, 3.2, 3.1, 3.4, 4.1, 4.2, 3.1, 3.2, 3.5, 3.6, 3.0, 3.4, 3.5, 2.3, 3.2, 3.5, 3.8, 3.0, 3.8, 3.2, 3.7, 3.3],
                        ["Women_x", 3.2, 3.2, 3.1, 2.3, 2.8, 2.8, 3.3, 2.4, 2.9, 2.7, 2.0, 3.0, 2.2, 2.9, 2.9, 3.1, 3.0, 2.7, 2.2, 2.5, 3.2, 2.8, 2.5, 2.8, 2.9, 3.0, 2.8, 3.0, 2.9, 2.6, 2.4, 2.4, 2.7, 2.7, 3.0, 3.4, 3.1, 2.3, 3.0, 2.5, 2.6, 3.0, 2.6, 2.3, 2.7, 3.0, 2.9, 2.9, 2.5, 2.8],
                        ["Man", 0.2, 0.2, 0.2, 0.2, 0.2, 0.4, 0.3, 0.2, 0.2, 0.1, 0.2, 0.2, 0.1, 0.1, 0.2, 0.4, 0.4, 0.3, 0.3, 0.3, 0.2, 0.4, 0.2, 0.5, 0.2, 0.2, 0.4, 0.2, 0.2, 0.2, 0.2, 0.4, 0.1, 0.2, 0.2, 0.2, 0.2, 0.1, 0.2, 0.2, 0.3, 0.3, 0.2, 0.6, 0.4, 0.3, 0.2, 0.2, 0.2, 0.2],
                        ["Women", 1.4, 1.5, 1.5, 1.3, 1.5, 1.3, 1.6, 1.0, 1.3, 1.4, 1.0, 1.5, 1.0, 1.4, 1.3, 1.4, 1.5, 1.0, 1.5, 1.1, 1.8, 1.3, 1.5, 1.2, 1.3, 1.4, 1.4, 1.7, 1.5, 1.0, 1.1, 1.0, 1.2, 1.6, 1.5, 1.6, 1.5, 1.3, 1.3, 1.3, 1.2, 1.4, 1.2, 1.0, 1.3, 1.2, 1.3, 1.3, 1.1, 1.3],
                    ],
                    type: 'scatter',
                    colors: {
                        Man: '#5969ff',
                        Women: '#ff407b',

                    }
                },
                axis: {
                    y: {
                        show: true,


                    },
                    x: {
                        show: true,
                    }
                }
            });
            setTimeout(function() {
                chart.load({
                    xs: {
                        Unisex: 'Unisex_x'
                    },
                    columns: [
                        ["Unisex_x", 3.3, 2.7, 3.0, 2.9, 3.0, 3.0, 2.5, 2.9, 2.5, 3.6, 3.2, 2.7, 3.0, 2.5, 2.8, 3.2, 3.0, 3.8, 2.6, 2.2, 3.2, 2.8, 2.8, 2.7, 3.3, 3.2, 2.8, 3.0, 2.8, 3.0, 2.8, 3.8, 2.8, 2.8, 2.6, 3.0, 3.4, 3.1, 3.0, 3.1, 3.1, 3.1, 2.7, 3.2, 3.3, 3.0, 2.5, 3.0, 3.4, 3.0],
                        ["Unisex", 2.5, 1.9, 2.1, 1.8, 2.2, 2.1, 1.7, 1.8, 1.8, 2.5, 2.0, 1.9, 2.1, 2.0, 2.4, 2.3, 1.8, 2.2, 2.3, 1.5, 2.3, 2.0, 2.0, 1.8, 2.1, 1.8, 1.8, 1.8, 2.1, 1.6, 1.9, 2.0, 2.2, 1.5, 1.4, 2.3, 2.4, 1.8, 1.8, 2.1, 2.4, 2.3, 1.9, 2.3, 2.5, 2.3, 1.9, 2.0, 2.3, 1.8],
                    ]
                });
            }, 1000);
            setTimeout(function() {
                chart.unload({
                    ids: 'Man'
                });
            }, 2000);
            setTimeout(function() {
                chart.load({
                    columns: [
                        ["Unisex", 0.2, 0.2, 0.2, 0.2, 0.2, 0.4, 0.3, 0.2, 0.2, 0.1, 0.2, 0.2, 0.1, 0.1, 0.2, 0.4, 0.4, 0.3, 0.3, 0.3, 0.2, 0.4, 0.2, 0.5, 0.2, 0.2, 0.4, 0.2, 0.2, 0.2, 0.2, 0.4, 0.1, 0.2, 0.2, 0.2, 0.2, 0.1, 0.2, 0.2, 0.3, 0.3, 0.2, 0.6, 0.4, 0.3, 0.2, 0.2, 0.2, 0.2],
                    ]
                });
            }, 3000);
        }


        if ($('#c3chart_stacked').length) {
            var chart = c3.generate({
                bindto: "#c3chart_stacked",

                data: {
                    columns: [
                        ['Male', 130, 200, 320, 400, 530, 750],
                        ['Female', -130, 10, 130, 200, 150, 250],
                        ['data3', -130, -50, -10, -200, -250, -150]
                    ],
                    type: 'bar',
                    groups: [
                        ['Male', 'Female', 'data3']
                    ],
                    order: 'desc', // stack order by sum of values descendantly. this is default.
                    //      order: 'asc'  // stack order by sum of values ascendantly.
                    //      order: null   // stack order by data definition.

                    colors: {
                        Male: '#5969ff',
                        Female: '#ff407b',
                        data3: '#64ced3'

                    }
                },
                axis: {
                    y: {
                        show: true,


                    },
                    x: {
                        show: true,
                    }
                },
                grid: {
                    y: {
                        lines: [{ value: 0 }]
                    }
                }
            });
            setTimeout(function() {
                chart.load({
                    columns: [
                        ['data4', 1200, 1300, 1450, 1600, 1520, 1820],
                    ]
                });
            }, 1000);
            setTimeout(function() {
                chart.load({
                    columns: [
                        ['data5', 200, 300, 450, 600, 520, 820],
                    ]
                });
            }, 2000);
            setTimeout(function() {
                chart.groups([
                    ['Male', 'Female', 'data3', 'data4', 'data5']
                ])
            }, 3000);
        }


        if ($('#c3chart_combine').length) {
            var chart = c3.generate({
                bindto: "#c3chart_combine",
                data: {
                    columns: [
                        ['Male', 30, 20, 50, 40, 60, 50],
                        ['Female', 200, 130, 90, 240, 130, 220],
                        ['data3', 300, 200, 160, 400, 250, 250],
                        ['data4', 200, 130, 90, 240, 130, 220],
                        ['data5', 130, 120, 150, 140, 160, 150],
                        ['data6', 90, 70, 20, 50, 60, 120],
                    ],
                    type: 'bar',
                    types: {
                        data3: 'spline',
                        data4: 'line',
                        data6: 'area',
                    },
                    groups: [
                        ['Male', 'Female']
                    ],

                    colors: {
                        Male: '#5969ff',
                        Female: '#ff407b',
                        data3: '#25d5f2',
                        data4: '#ffc750',
                        data5: '#2ec551',
                        data6: '#1ba3b9',


                    }

                },
                axis: {
                    y: {
                        show: true,


                    },
                    x: {
                        show: true,
                    }
                }
            });
        }

        if ($('#c3chart_pie').length) {
            var chart = c3.generate({
                bindto: "#c3chart_pie",
                data: {
                    columns: [
                        ['Male', 30],
                        ['Female', 50]
                    ],
                    type: 'pie',

                    colors: {
                         Male: '#5969ff',
                        Female: '#ff407b'


                    }
                },
                pie: {
                    label: {
                        format: function(value, ratio, id) {
                            return d3.format('$')(value);
                        }
                    }
                }
            });
        }

        if ($('#c3chart_donut').length) {
            var chart = c3.generate({
                bindto: "#c3chart_donut",
                data: {
                    columns: [
                        ['Male', 30],
                        ['Female', 120],
                    ],
                    type: 'donut',
                    onclick: function(d, i) { console.log("onclick", d, i); },
                    onmouseover: function(d, i) { console.log("onmouseover", d, i); },
                    onmouseout: function(d, i) { console.log("onmouseout", d, i); },

                    colors: {
                         Male: '#5969ff',
                        Female: '#ff407b'


                    }
                },
                donut: {
                    title: "Category"


                }


            });

            setTimeout(function() {
                chart.load({
                    columns: [
                        ["Man", 0.2, 0.2, 0.2, 0.2, 0.2, 0.4, 0.3, 0.2, 0.2, 0.1, 0.2, 0.2, 0.1, 0.1, 0.2, 0.4, 0.4, 0.3, 0.3, 0.3, 0.2, 0.4, 0.2, 0.5, 0.2, 0.2, 0.4, 0.2, 0.2, 0.2, 0.2, 0.4, 0.1, 0.2, 0.2, 0.2, 0.2, 0.1, 0.2, 0.2, 0.3, 0.3, 0.2, 0.6, 0.4, 0.3, 0.2, 0.2, 0.2, 0.2],
                        ["Women", 1.4, 1.5, 1.5, 1.3, 1.5, 1.3, 1.6, 1.0, 1.3, 1.4, 1.0, 1.5, 1.0, 1.4, 1.3, 1.4, 1.5, 1.0, 1.5, 1.1, 1.8, 1.3, 1.5, 1.2, 1.3, 1.4, 1.4, 1.7, 1.5, 1.0, 1.1, 1.0, 1.2, 1.6, 1.5, 1.6, 1.5, 1.3, 1.3, 1.3, 1.2, 1.4, 1.2, 1.0, 1.3, 1.2, 1.3, 1.3, 1.1, 1.3],
                        ["Unisex", 2.5, 1.9, 2.1, 1.8, 2.2, 2.1, 1.7, 1.8, 1.8, 2.5, 2.0, 1.9, 2.1, 2.0, 2.4, 2.3, 1.8, 2.2, 2.3, 1.5, 2.3, 2.0, 2.0, 1.8, 2.1, 1.8, 1.8, 1.8, 2.1, 1.6, 1.9, 2.0, 2.2, 1.5, 1.4, 2.3, 2.4, 1.8, 1.8, 2.1, 2.4, 2.3, 1.9, 2.3, 2.5, 2.3, 1.9, 2.0, 2.3, 1.8],
                    ]
                });
            }, 1500);

            setTimeout(function() {
                chart.unload({
                    ids: 'Male'
                });
                chart.unload({
                    ids: 'Female'
                });
            }, 2500);
        }

        if ($('#c3chart_gauge').length) {
            var chart = c3.generate({
                bindto: "#c3chart_gauge",
                data: {
                    columns: [
                        ['Male', 91.4]

                    ],
                    type: 'gauge',
                    onclick: function(d, i) { console.log("onclick", d, i); },
                    onmouseover: function(d, i) { console.log("onmouseover", d, i); },
                    onmouseout: function(d, i) { console.log("onmouseout", d, i); },
                    colors: {
                      Male: '#5969ff',
                        Female: '#ff407b',
                        data3: '#25d5f2',
                        data4: '#ffc750',
                        data5: '#2ec551',
                        data6: '#1ba3b9',

                    }
                },
                gauge: {
                    //        label: {
                    //            format: function(value, ratio) {
                    //                return value;
                    //            },
                    //            show: false // to turn off the min/max labels.
                    //        },
                    //    min: 0, // 0 is default, //can handle negative min e.g. vacuum / voltage / current flow / rate of change
                    //    max: 100, // 100 is default
                    //    units: ' %',
                    //    width: 39 // for adjusting arc thickness
                },

                size: {
                    height: 320
                }
            });



        }


    });

})(window, document, window.jQuery);