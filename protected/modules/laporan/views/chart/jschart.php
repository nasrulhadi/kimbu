
/* [ ---- Gebo Admin Panel - charts ---- ] */

        $(document).ready(function() {
                //* bars
                gebo_charts.fl_c();
        });

        //* charts
    gebo_charts = {
        fl_c : function() {
                        var elem = $('#fl_c');

            var d1 = [
                                [new Date('05/23/2012').getTime(),350],
                                [new Date('05/24/2012').getTime(),422],
                                [new Date('05/25/2012').getTime(),550],
                                [new Date('05/26/2012').getTime(),608],
                                [new Date('05/27/2012').getTime(),681],
                                [new Date('05/28/2012').getTime(),591],
                                [new Date('05/29/2012').getTime(),510]
                        ];

           var d2 = [
                                [new Date('05/23/2012').getTime(),1200],
                                [new Date('05/24/2012').getTime(),1400],
                                [new Date('05/25/2012').getTime(),1500],
                                [new Date('05/26/2012').getTime(),1200],
                                [new Date('05/27/2012').getTime(),1340],
                                [new Date('05/28/2012').getTime(),1421],
                                [new Date('05/29/2012').getTime(),1510]
                        ];

            var d3 = [
                                [new Date('05/23/2012').getTime(),120],
                                [new Date('05/24/2012').getTime(),100],
                                [new Date('05/26/2012').getTime(),140],
                                [new Date('05/27/2012').getTime(),153],
                                [new Date('05/28/2012').getTime(),184],
                                [new Date('05/29/2012').getTime(),226]
                        ];

            // add 2h to match utc+2
            for (var i = 0; i < d1.length; ++i) {d1[i][0] += 60 * 120 * 1000};
                        for (var i = 0; i < d2.length; ++i) {d2[i][0] += 60 * 120 * 1000};
                        for (var i = 0; i < d3.length; ++i) {d3[i][0] += 60 * 120 * 1000};

            var ds = new Array();

            ds.push({
                label: "Data 1",
                data:d1,
                bars: {
                    show: true, 
                    barWidth: 60 * 220 * 1000, 
                    order: 1,
                    lineWidth : 2,
                    fill: 1
                }
            });
            ds.push({
                label: "Data 2",
                data:d2,
                bars: {
                    show: true, 
                    barWidth: 60 * 220 * 1000, 
                    order: 2,
                    fill: 1
                }
            });
            ds.push({
                label: "Data 3",
                data:d3,
                bars: {
                    show: true, 
                    barWidth: 60 * 220 * 1000, 
                    order: 3,
                    fill: 1
                }
            });

            var options = {
                grid:{
                    hoverable:true
                },
                xaxis: {
                                        mode: "time",
                                        minTickSize: [1, "day"],
                                        autoscaleMargin: 0.10
                                },
                colors: [ "#b4dbeb", "#8cc7e0", "#64b4d5", "#3ca0ca", "#2d83a6", "#22637e", "#174356", "#0c242e" ]
            };

            fl_c_plot = $.plot(elem, ds, options);

            // Create a tooltip on our chart
            elem.qtip({
                prerender: true,
                content: 'Loading...', // Use a loading message primarily
                position: {
                    viewport: $(window), // Keep it visible within the window if possible
                    target: 'mouse', // Position it in relation to the mouse
                    adjust: { x: 7 } // ...but adjust it a bit so it doesn't overlap it.
                },
                show: false, // We'll show it programatically, so no show event is needed
                style: {
                    classes: 'ui-tooltip-shadow ui-tooltip-tipsy',
                    tip: false // Remove the default tip.
                }
            });

            // Bind the plot hover
            elem.on('plothover', function(event, coords, item) {
                // Grab the API reference
                var self = $(this),
                    api = $(this).qtip(),
                    previousPoint, content,

                // Setup a visually pleasing rounding function
                round = function(x) { return Math.round(x * 1000) / 1000; };

                // If we weren't passed the item object, hide the tooltip and remove cached point data
                if(!item) {
                    api.cache.point = false;
                    return api.hide(event);
                }

                // Proceed only if the data point has changed
                previousPoint = api.cache.point;
                if(previousPoint !== item.seriesIndex)
                {
                    // Update the cached point data
                    api.cache.point = item.seriesIndex;

                    // Setup new content
                    content = item.series.label +': '+ round(item.datapoint[1]);

                    // Update the tooltip content
                    api.set('content.text', content);

                    // Make sure we don't get problems with animations
                    api.elements.tooltip.stop(1, 1);

                    // Show the tooltip, passing the coordinates
                    api.show(coords);
                }
            });

        },
    };