var textBoxHeight = $(".projectTextHolder").height();
$(".projectImageHolder").height(textBoxHeight-30);

console.log($(".projectInfoHolder").height());

var pp = "http://54.235.78.70/3Dtest/portrait";
var images = new Array();
var spin = true; 
var metaSpin = true;
var forward = false;
var unwindingBacktoZero = false;
var counter = 0;
var spinRate = 100;
//load images into array
for (var i=1;i<48;i++){
    if(i<10){
        images.push(pp+'0'+i+'.jpg');
        src = images[i-1];
        $("#theImage").attr("src", src);
    }
    else{
        images.push(pp+i+'.jpg');
        src = images[i-1];
        $("#theImage").attr("src", src);
    }
}
images.push(pp+'01.jpg');

//make a million unnessisary variables!
var offset = $( "#theImage" ).offset();
var numberOfFrames = images.length;
var widthOfImage = $("#theImage").width();
var interval = widthOfImage/numberOfFrames;
var xLocInImage;
var frameNumber = 0;

//move image when you hover over it
$("#theImage").mousemove(function(e){ 
  xLocInImage = e.pageX - offset.left;
  frameNumber = parseInt(xLocInImage/interval);  
  src = images[frameNumber];
  $(this).attr("src", src);
});

//dont let the image auto spin when you are hovering
$("#theImage").hover(function(){
    spin = !spin;
});

//unwind back to zero when you move off
$("#theImage").mouseout(function(){
    unwindingBacktoZero = true;

});

//unwind
setInterval(function () {
    if(unwindingBacktoZero && spin){
        frameNumber--;
        $("#theImage").attr("src", images[frameNumber]);
        if(frameNumber < 1){ unwindingBacktoZero = false;}
    }
}, spinRate+20);

//spin back and forth for ever
setInterval(function () {
    if(frameNumber < 1){ frameNumber = images.length-1; }
    else if(frameNumber > images.length-2){ frameNumber = 0; }
    if(spin && !unwindingBacktoZero && metaSpin){
        if(forward){
            frameNumber++;
            $("#theImage").attr("src", images[frameNumber]);
        }
        else{
            frameNumber--;
            $("#theImage").attr("src", images[frameNumber]);
        }
    }
    if(frameNumber == 7 || frameNumber == images.length-7){forward = !forward}
    if(metaSpin){ counter += spinRate; }
    if(counter > 3200 && frameNumber == 0){ metaSpin = false; counter = 0; } 
}, spinRate);


setInterval(function () {
    metaSpin = !metaSpin;
}, 30000);


