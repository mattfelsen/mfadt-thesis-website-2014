var images = {};
var names = $(".theImage");

var spin = true;
var metaSpin = true;
var forward = false;
var unwindingBacktoZero = false;
var counter = 0;
var spinRate = 100;
var numberOfFrames = 48;
var frameNumber = 0;

// load up images for each person
for (var i = 0; i < names.length; i++) {
    var slug = $(names[i]).attr('data-slug')
    
    images[slug] = [];
    var url = "http://mfadt.parsons.edu/2014/assets/img/students/" + slug + "/";

    for (var j = 1; j <= numberOfFrames; j++) {
        var src = url + j + ".jpg";
        images[slug].push(src);

        // preload the image into a new img element
        var elem = document.createElement('img')
        elem.src = src;
    }
}

//move image when you hover over it
$(".theImage").mousemove(function(e) { 
    // var slug = $(this).attr('data-slug')

    var offset = $(this).offset();
    var xLocInImage = e.pageX - offset.left;

    var interval = $(this).width() / numberOfFrames;
    var frameNumber = parseInt(xLocInImage / interval);  

    for (var i = 0; i < names.length; i++) {
        var slug = $(names[i]).attr('data-slug');
        $(".theImage[data-slug='" + slug + "']").attr("src", images[slug][frameNumber]);
    }
});

//dont let the image auto spin when you are hovering
$(".theImage").hover(function(){
    spin = !spin;
});

//unwind back to zero when you move off
$(".theImage").mouseout(function(){
    unwindingBacktoZero = true;

});

//unwind
setInterval(function () {
    if (unwindingBacktoZero && spin) {
        frameNumber--;
        if (frameNumber < 1)  { unwindingBacktoZero = false; }
        
        for (var i = 0; i < names.length; i++) {
            var slug = $(names[i]).attr('data-slug');
            $(".theImage[data-slug='" + slug + "']").attr("src", images[slug][frameNumber]);
        }
    }
}, spinRate+20);

//spin back and forth for ever
setInterval(function () {
    if (frameNumber < 1) { frameNumber = numberOfFrames - 1; }
    else if (frameNumber > numberOfFrames - 2) { frameNumber = 0; }
    if (spin && !unwindingBacktoZero && metaSpin) {
        if (forward)
            frameNumber++;
        else
            frameNumber--;

        for (var i = 0; i < names.length; i++) {
            var slug = $(names[i]).attr('data-slug');
            $(".theImage[data-slug='" + slug + "']").attr("src", images[slug][frameNumber]);
        }
    }

    if (frameNumber == 7 || frameNumber == images.length-7) { forward = !forward; }
    if (metaSpin) { counter += spinRate; }
    if (counter > 3200 && frameNumber == 0) { metaSpin = false; counter = 0; } 
}, spinRate);


setInterval(function () {
    metaSpin = !metaSpin;
}, 30000);


