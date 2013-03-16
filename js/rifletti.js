	(function($){
    $.fn.reflect = function(options){
        
        var defaults = {
            opacity: 0.5,
            height: 0.5
        };
        
        options = $.extend({}, defaults, options);
        
        this.each(function(){
            var $this = $(this);
                $image = $this.clone(true).css('display', 'block'),
                $container = $('<div>'),
                reflectionHeight = Math.floor($this.height()*options.height),
                reflectionWidth = $this.width(),
                divHeight = Math.floor($this.height()*(1+options.height)),
                classes = this.className.split(' '),
                newClasses = '';
            
            // Fetch classes
            for (j=0;j<classes.length;j++) {
                if (classes[j] != "reflect") {
                    if (newClasses) {
                        newClasses += ' '
                    }
                    newClasses += classes[j];
                }
            }

            // Copy classes & styles to container
            $container[0].style.cssText = this.style.cssText;
            this.className = 'reflected';
            $this.wrap($container.attr('class', newClasses));
            
            // TODO: Feature detection instead
            // IE doesn't support canvases, so we use FlipV filter instead
            if ($.browser.msie) {
                $container.append(
                    $image,
                    $image.clone().css({
                        'filter': 'FlipV progid:DXImageTransform.Microsoft.Alpha(opacity='+(options.opacity*100)+', style=1, finishOpacity=0, startx=0, starty=0, finishx=0, finishy='+(options.height*100)+')'
                    })
                );
            } else {
                var canvas = document.createElement('canvas');
                if (canvas.getContext) {
                    var context = canvas.getContext("2d");
                    canvas.style.height = reflectionHeight+'px';
                    canvas.style.width = reflectionWidth+'px';
                    canvas.height = reflectionHeight;
                    canvas.width = reflectionWidth;

                    $container.append($image, canvas);

                    context.save();
                    context.translate(0,this.height-1);
                    context.scale(1,-1);
                    context.drawImage(this, 0, 0, reflectionWidth, this.height);
                    context.restore();
                    context.globalCompositeOperation = "destination-out";
                    
                    var gradient = context.createLinearGradient(0, 0, 0, reflectionHeight);
                    gradient.addColorStop(1, "rgba(255, 255, 255, 1.0)");
                    gradient.addColorStop(0, "rgba(255, 255, 255, "+(1-options.opacity)+")");
        
                    context.fillStyle = gradient;
                    context.rect(0, 0, reflectionWidth, reflectionHeight*2);
                    context.fill();
                }
            }
            // Replace the original image
            $this.replaceWith($container);
        });
    };
})(jQuery);
$(function(){
    $('.reflect').reflect();
});