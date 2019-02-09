window.onload = function(){
	//canvas initialization
	var canvas = document.getElementById("canvas");
	var ctx = canvas.getContext("2d");
	//dimensions
	var W = canvas.width;
	var H = canvas.height;
	//Variables
	var degrees = 0;
	var new_degrees = 0;
	var difference = 0;
	var color = "#b2c831"; //green looks better to me
	var bgcolor = "#222";
	var text;
	var animation_loop, redraw_loop;
	
	function init()
	{
		//Clear the canvas everytime a chart is drawn
		ctx.clearRect(0, 0, W, H);
		
		//Background 360 degree arc
		ctx.beginPath();
		ctx.strokeStyle = bgcolor;
		ctx.lineWidth = 30;
		ctx.arc(W/2, H/2, 100, 0, Math.PI*2, false); //you can see the arc now
		ctx.stroke();
		
		//gauge will be a simple arc
		//Angle in radians = angle in degrees * PI / 180
		var radians = degrees * Math.PI / 180;
		ctx.beginPath();
		ctx.strokeStyle = color;
		ctx.lineWidth = 30;
		//The arc starts from the rightmost end. If we deduct 90 degrees from the angles
		//the arc will start from the topmost end
		ctx.arc(W/2, H/2, 100, 0 - 90*Math.PI/180, radians - 90*Math.PI/180, false); 
		//you can see the arc now
		ctx.stroke();
		
		//Lets add the text
		ctx.fillStyle = color;
		ctx.font = "50px open sans";
		text = Math.floor(degrees/360*100) + "%";
		//Lets center the text
		//deducting half of text width from position x
		text_width = ctx.measureText(text).width;
		//adding manual value to position y since the height of the text cannot
		//be measured easily. There are hacks but we will keep it manual for now.
		ctx.fillText(text, W/2 - text_width/2, H/2 + 15);
	}
	
	function draw()
	{
		//Cancel any movement animation if a new chart is requested
		if(typeof animation_loop != undefined) clearInterval(animation_loop);
		
		//random degree from 0 to 360
		new_degrees = Math.round(Math.random()*360);
		difference = new_degrees - degrees;
		//This will animate the gauge to new positions
		//The animation will take 1 second
		//time for each frame is 1sec / difference in degrees
		animation_loop = setInterval(animate_to, 1000/difference);
	}
	
	//function to make the chart move to new degrees
	function animate_to()
	{
		//clear animation loop if degrees reaches to new_degrees
		if(degrees == new_degrees) 
			clearInterval(animation_loop);
		
		if(degrees < new_degrees)
			degrees++;
		else
			degrees--;
			
		init();
	}
	
	//Lets add some animation for fun
	draw();
	redraw_loop = setInterval(draw, 2000); //Draw a new chart every 2 seconds
	
	
	//canvas init2ialization
	var canvas2 = document.getElementById("canvas2");
	var ctx2 = canvas2.getContext2("2d");
	//dimensions
	var W2 = canvas.width;
	var H2 = canvas.height;
	//Variables
	var degrees2 = 0;
	var new_degrees2 = 0;
	var difference2 = 0;
	var color2 = "#b2c831"; //green looks better to me
	var bgcolor2 = "#222";
	var text2;
	var animation_loop2, redraw2_loop2;
	
	function init2()
	{
		//Clear the canvas everytime a chart is draw2n
		ctx2.clearRect(0, 0, W2, H2);
		
		//Background 360 degree arc
		ctx2.beginPath();
		ctx2.strokeStyle = bgcolor2;
		ctx2.lineWidth = 30;
		ctx2.arc(W2/2, H2/2, 100, 0, Math.PI*2, false); //you can see the arc now
		ctx2.stroke();
		
		//gauge will be a simple arc
		//Angle in radians2 = angle in degrees2 * PI / 180
		var radians2 = degrees2 * Math.PI / 180;
		ctx2.beginPath();
		ctx2.strokeStyle = color2;
		ctx2.lineWidth = 30;
		//The arc starts from the rightmost end. If we deduct 90 degrees2 from the angles
		//the arc will start from the topmost end
		ctx2.arc(W2/2, H2/2, 100, 0 - 90*Math.PI/180, radians2 - 90*Math.PI/180, false); 
		//you can see the arc now
		ctx2.stroke();
		
		//Lets add the text2
		ctx2.fillStyle = color2;
		ctx2.font = "50px open sans";
		text2 = Math.floor(degrees2/360*100) + "%";
		//Lets center the text2
		//deducting half of text2 width from position x
		text_width = ctx2.measureText2(text2).width;
		//adding manual value to position y since the height of the text2 cannot
		//be measured easily. There are hacks but we will keep it manual for now.
		ctx2.fillText2(text2, W/2 - text_width/2, H/2 + 15);
	}
	
	function draw2()
	{
		//Cancel any movement animation if a new chart is requested
		if(typeof animation_loop2 != undefined) clearInterval(animation_loop2);
		
		//random degree from 0 to 360
		new_degrees2 = Math.round(Math.random()*360);
		difference2 = new_degrees2 - degrees2;
		//This will animate the gauge to new positions
		//The animation will take 1 second
		//time for each frame is 1sec / difference2 in degrees2
		animation_loop2 = setInterval(animate_to2, 1000/difference2);
	}
	
	//function to make the chart move to new degrees2
	function animate_to2()
	{
		//clear animation loop if degrees2 reaches to new_degrees2
		if(degrees2 == new_degrees2) 
			clearInterval(animation_loop2);
		
		if(degrees2 < new_degrees2)
			degrees2++;
		else
			degrees2--;
			
		init2();
	}
	
	//Lets add some animation for fun
	draw2();
	redraw2_loop2 = setInterval(draw2, 2000); //Draw a new chart every 2 seconds
	
	
}