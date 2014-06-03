function SpeedometerChart(target, settings) {
    var defaults =
        {
            max: 100,
            value: 0,
            value2: false,
            innerradius: 50,
            outerradius: 80,
            margin: 10,
            animate: true,
            duration: 1000,
            ease: 'cubic-in-out',
            background: '#f0f0f0'
        };

    var settings = settings || {},
        obj = defaults;

    for(var i in settings) {
     if(defaults.hasOwnProperty(i))
         obj[i] = settings[i];
    }

	var svg = d3.select(target).data([obj]).append("svg")
    .attr('height', function(d){ return d.outerradius + d.margin; })
    .attr('width', function(d){ return (d.outerradius + d.margin)*2; });

	var pi = Math.PI;


	var trans = function(d){
		var max = d.outerradius;
		var padding = d.margin ? d.margin : 0;
		return 'translate('+(max+padding)+', '+(max+padding)+')';
	};

	var arc = d3.svg.arc()
		.innerRadius(function(d){ return d.innerradius; })
		.outerRadius(function(d){ return d.outerradius + (d.value2 ? 5 : 0); })
		.startAngle(-90 * (pi/180))
		.endAngle(90 * (pi/180));

	var arc2 = d3.svg.arc()
		.innerRadius(function(d){ return d.innerradius; })
		.outerRadius(function(d){ return d.outerradius; })
		.startAngle(-90 * (pi/180))
		.endAngle(function(d){
				var endAngle = (d.value/d.max) * pi - (90*pi/180);
				return endAngle;
		});

	var arc3 = d3.svg.arc()
		.innerRadius(function(d){ return d.outerradius; })
		.outerRadius(function(d){ return d.outerradius + 5; })
		.startAngle(-90 * (pi/180))
		.endAngle(function(d){
				var endAngle = (d.value2/d.max) * pi - (90*pi/180);
				return endAngle;
		});

	var color = d3.scale.linear()
		.domain([0, 0.25, 0.5, 0.75, 1])
		.range(["#FF4E50", "#FC913A", "#F9D423", "#D2E07F", "#68B3AF"]);

	var vis = svg.append('g')
		.attr('transform', trans);

	vis.append("path")
		.attr("d", arc)
		.attr('fill', obj.background);

	var a = vis.append("path")
		.attr('d', arc2)
		.attr('id', 'bar')
		.attr('fill', '#ff9900')
		.attr('opacity', 1);

	vis.append("path")
		.attr('d', arc3)
		.attr('id', 'secondbar')
		.attr('fill', '#08c')
		.attr('opacity', 1);

	vis.append('text')
		.attr('font-family', 'Helvetica, Arial, sans-serif')
		.attr('fill', function(d){ return color(d.value/d.max); })
		.style('font-size', '20px')
		.style('font-weight', 'bold')
		.style('text-anchor', 'middle')
		.attr('x', function(d){
				return d.cx;
		})
		.text(function(d){ return d.value + '/' + d.max; });

	vis.select('#bar')
		.attr('fill', function(d){ return color(d.value/d.max); });

    function tweenArc(d, a, c) {
        var i = d3.interpolateNumber(0, d.value);
        return function(t) {
            d.value = i(t);
            var n = a(d);
            vis.select("#bar").attr('fill', color(d.value/d.max));
            svg.selectAll('text')
                .text(Math.floor(d.value) + '/' + d.max)
                .attr('fill', color(d.value / d.max));
            return n;
        };
    }

    if(obj.animate) {
        var duration = obj.duration || 1000;
        vis.select("#bar").transition().ease(obj.ease).duration(duration)
           .attrTween("d", function(d){ return tweenArc(d, arc2, color); });
    }
}

$(function(){
  $(".SpeedometerChart").each(function(){
    var chart = new SpeedometerChart('#'+$(this).attr('id'), $(this).data());
  });
});