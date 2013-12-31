$(document).ready(function(){
	var cat = $("#categories");
	var catW = $("#cat-wrapper");
	cat.hide();
	
	$("#pers").change(function(){
		
		
		if($("#pers").val() == "Perspective 1") {
			
			if($("#categories").is(":visible")) {
				cat.hide();
				cat.fadeToggle("slow");
				$("#ct1").html("<a href='#'>Category 1</a>" +
						"<ul>" +
						"<li id='s-cat1'><a id='sub-link-1' href='javascript:void(0'>Sub Category 1.1 of Category 1</a></li>" +
						"<li id='s-cat2'><a id='sub-link-2' href='javascript:void(0)'>Sub Category 1.2 of Category 1</a></li>" +
						"<li id='s-cat3'><a id='sub-link-3' href='javascript:void(0)'>Sub Category 1.3 of Category 1</a></li>" +
						"<li id='s-cat4'><a id='sub-link-4' href='javascript:void(0)'>Sub Category 1.4 of Category 1</a></li>" +
						"<li id='s-cat5'><a id='sub-link-5' href='javascript:void(0)'>Sub Category 1.5 of Category 1</a></li>" +
						"</ul>");
				$("#ct2").html("<a href='#'>Category 2</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 2.1 of Category 2</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 2.2 of Category 2</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 2.3 of Category 2</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 2.4 of Category 2</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 2.5 of Category 2</a></li>" +
						"</ul>");
				$("#ct3").html("<a href='#'>Category 3</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 3.1 of Category 3</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 3.2 of Category 3</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 3.3 of Category 3</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 3.4 of Category 3</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 3.5 of Category 3</a></li>" +
						"</ul>");
				$("#ct4").html("<a href='#'>Category 4</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 4.1 of Category 4</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 4.2 of Category 4</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 4.3 of Category 4</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 4.4 of Category 4</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 4.5 of Category 4</a></li>" +
						"</ul>");
				$("#ct5").html("<a href='#'>Category 5</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 5.1 of Category 5</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 5.2 of Category 5</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 5.3 of Category 5</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 5.4 of Category 5</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 5.5 of Category 5</a></li>" +
						"</ul>");
				
			}	else {
				$("#ct1").html("<a href='#'>Category 1</a>" +
						"<ul>" +
						"<li id='s-cat1'><a id='sub-link-1' href='javascript:void(0'>Sub Category 1.1 of Category 1</a></li>" +
						"<li id='s-cat2'><a id='sub-link-2' href='javascript:void(0)'>Sub Category 1.2 of Category 1</a></li>" +
						"<li id='s-cat3'><a id='sub-link-3' href='javascript:void(0)'>Sub Category 1.3 of Category 1</a></li>" +
						"<li id='s-cat4'><a id='sub-link-4' href='javascript:void(0)'>Sub Category 1.4 of Category 1</a></li>" +
						"<li id='s-cat5'><a id='sub-link-5' href='javascript:void(0)'>Sub Category 1.5 of Category 1</a></li>" +
						"</ul>");
				$("#ct2").html("<a href='#'>Category 2</a>"  +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 2.1 of Category 2</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 2.2 of Category 2</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 2.3 of Category 2</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 2.4 of Category 2</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 2.5 of Category 2</a></li>" +
						"</ul>");
				$("#ct3").html("<a href='#'>Category 3</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 3.1 of Category 3</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 3.2 of Category 3</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 3.3 of Category 3</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 3.4 of Category 3</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 3.5 of Category 3</a></li>" +
						"</ul>");
				$("#ct4").html("<a href='#'>Category 4</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 4.1 of Category 4</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 4.2 of Category 4</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 4.3 of Category 4</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 4.4 of Category 4</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 4.5 of Category 4</a></li>" +
						"</ul>");
				$("#ct5").html("<a href='#'>Category 5</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 5.1 of Category 5</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 5.2 of Category 5</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 5.3 of Category 5</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 5.4 of Category 5</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 5.5 of Category 5</a></li>" +
						"</ul>");	
					cat.fadeToggle();
			}
		}
		if($("#pers").val() == "Perspective 2") {
			
			if($("#categories").is(":visible")) {
				cat.hide()
				cat.fadeToggle("slow");
				$("#ct1").html("<a href='#'>Category 6</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 6.1 of Category 6</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 6.2 of Category 6</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 6.3 of Category 6</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 6.4 of Category 6</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 6.5 of Category 6</a></li>" +
						"</ul>");
				$("#ct2").html("<a href='#'>Category 7</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 7.1 of Category 7</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 7.2 of Category 7</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 7.3 of Category 7</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 7.4 of Category 7</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 7.5 of Category 7</a></li>" +
						"</ul>");
				$("#ct3").html("<a href='#'>Category 8</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 8.1 of Category 8</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 8.2 of Category 8</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 8.3 of Category 8</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 8.4 of Category 8</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 8.5 of Category 8</a></li>" +
						"</ul>");
				$("#ct4").html("<a href='#'>Category 9</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 9.1 of Category 9</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 9.2 of Category 9</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 9.3 of Category 9</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 9.4 of Category 9</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 9.5 of Category 9</a></li>" +
						"</ul>");
				$("#ct5").html("<a href='#'>Category 10</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 10.1 of Category 10</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 10.2 of Category 10</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 10.3 of Category 10</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 10.4 of Category 10</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 10.5 of Category 10</a></li>" +
						"</ul>");
			}	else{
				$("#ct1").html("<a href='#'>Category 6</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 6.1 of Category 6</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 6.2 of Category 6</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 6.3 of Category 6</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 6.4 of Category 6</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 6.5 of Category 6</a></li>" +
						"</ul>");
				$("#ct2").html("<a href='#'>Category 7</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 7.1 of Category 7</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 7.2 of Category 7</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 7.3 of Category 7</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 7.4 of Category 7</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 7.5 of Category 7</a></li>" +
						"</ul>");
				$("#ct3").html("<a href='#'>Category 8</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 8.1 of Category 8</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 8.2 of Category 8</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 8.3 of Category 8</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 8.4 of Category 8</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 8.5 of Category 8</a></li>" +
						"</ul>");
				$("#ct4").html("<a href='#'>Category 9</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 9.1 of Category 9</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 9.2 of Category 9</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 9.3 of Category 9</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 9.4 of Category 9</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 9.5 of Category 9</a></li>" +
						"</ul>");
				$("#ct5").html("<a href='#'>Category 10</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 10.1 of Category 10</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 10.2 of Category 10</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 10.3 of Category 10</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 10.4 of Category 10</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 10.5 of Category 10</a></li>" +
						"</ul>");
					cat.fadeToggle();
			}
			
		}
		
		if($("#pers").val() == "Perspective 3") {
		
			if($("#categories").is(":visible")) {
				cat.hide();
				cat.fadeToggle("slow");
				$("#ct1").html("<a href='#'>Category 11</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 11.1 of Category 11</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 11.2 of Category 11</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 11.3 of Category 11</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 11.4 of Category 11</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 11.5 of Category 11</a></li>" +
						"</ul>");
				$("#ct2").html("<a href='#'>Category 12</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 12.1 of Category 12</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 12.2 of Category 12</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 12.3 of Category 12</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 12.4 of Category 12</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 12.5 of Category 12</a></li>" +
						"</ul>");
				$("#ct3").html("<a href='#'>Category 13</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 13.1 of Category 13</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 13.2 of Category 13</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 13.3 of Category 13</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 13.4 of Category 13</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 13.5 of Category 13</a></li>" +
						"</ul>");
				$("#ct4").html("<a href='#'>Category 14</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 14.1 of Category 14</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 14.2 of Category 14</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 14.3 of Category 14</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 14.4 of Category 14</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 14.5 of Category 14</a></li>" +
						"</ul>");
				$("#ct5").html("<a href='#'>Category 15</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 15.1 of Category 15</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 15.2 of Category 15</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 15.3 of Category 15</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 15.4 of Category 15</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 15.5 of Category 15</a></li>" +
						"</ul>");
		
			}	else{
					cat.fadeToggle();
					$("#ct1").html("<a href='#'>Category 11</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 11.1 of Category 11</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 11.2 of Category 11</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 11.3 of Category 11</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 11.4 of Category 11</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 11.5 of Category 11</a></li>" +
						"</ul>");
				$("#ct2").html("<a href='#'>Category 12</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 12.1 of Category 12</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 12.2 of Category 12</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 12.3 of Category 12</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 12.4 of Category 12</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 12.5 of Category 12</a></li>" +
						"</ul>");
				$("#ct3").html("<a href='#'>Category 13</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 13.1 of Category 13</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 13.2 of Category 13</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 13.3 of Category 13</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 13.4 of Category 13</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 13.5 of Category 13</a></li>" +
						"</ul>");
				$("#ct4").html("<a href='#'>Category 14</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 14.1 of Category 14</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 14.2 of Category 14</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 14.3 of Category 14</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 14.4 of Category 14</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 14.5 of Category 14</a></li>" +
						"</ul>");
				$("#ct5").html("<a href='#'>Category 15</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 15.1 of Category 15</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 15.2 of Category 15</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 15.3 of Category 15</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 15.4 of Category 15</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 15.5 of Category 15</a></li>" +
						"</ul>");
			}
			
		}
		
		if($("#pers").val() == "Perspective 4") {
		
			if($("#categories").is(":visible")) {
				cat.hide();
				cat.fadeToggle("slow");
				$("#ct1").html("<a href='#'>Category 16</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 16.1 of Category 16</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 16.2 of Category 16</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 16.3 of Category 16</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 16.4 of Category 16</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 16.5 of Category 16</a></li>" +
						"</ul>");
				$("#ct2").html("<a href='#'>Category 17</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 17.1 of Category 17</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 17.2 of Category 17</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 17.3 of Category 17</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 17.4 of Category 17</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 17.5 of Category 17</a></li>" +
						"</ul>");
				$("#ct3").html("<a href='#'>Category 18</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 18.1 of Category 18</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 18.2 of Category 18</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 18.3 of Category 18</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 18.4 of Category 18</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 18.5 of Category 18</a></li>" +
						"</ul>");
				$("#ct4").html("<a href='#'>Category 19</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 19.1 of Category 19</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 19.2 of Category 19</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 19.3 of Category 19</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 19.4 of Category 19</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 19.5 of Category 19</a></li>" +
						"</ul>");
				$("#ct5").html("<a href='#'>Category 20</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 20.1 of Category 20</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 20.2 of Category 20</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 20.3 of Category 20</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 20.4 of Category 20</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 20.5 of Category 20</a></li>" +
						"</ul>");
	
			}	else{
					cat.fadeToggle();
					$("#ct1").html("<a href='#'>Category 16</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 16.1 of Category 16</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 16.2 of Category 16</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 16.3 of Category 16</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 16.4 of Category 16</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 16.5 of Category 16</a></li>" +
						"</ul>");
				$("#ct2").html("<a href='#'>Category 17</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 17.1 of Category 17</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 17.2 of Category 17</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 17.3 of Category 17</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 17.4 of Category 17</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 17.5 of Category 17</a></li>" +
						"</ul>");
				$("#ct3").html("<a href='#'>Category 18</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 18.1 of Category 18</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 18.2 of Category 18</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 18.3 of Category 18</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 18.4 of Category 18</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 18.5 of Category 18</a></li>" +
						"</ul>");
				$("#ct4").html("<a href='#'>Category 19</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 19.1 of Category 19</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 19.2 of Category 19</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 19.3 of Category 19</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 19.4 of Category 19</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 19.5 of Category 19</a></li>" +
						"</ul>");
				$("#ct5").html("<a href='#'>Category 20</a>" +
						"<ul>" +
						"<li id='s-cat1'><a href='#'>Sub Category 20.1 of Category 20</a></li>" +
						"<li id='s-cat2'><a href='#'>Sub Category 20.2 of Category 20</a></li>" +
						"<li id='s-cat3'><a href='#'>Sub Category 20.3 of Category 20</a></li>" +
						"<li id='s-cat4'><a href='#'>Sub Category 20.4 of Category 20</a></li>" +
						"<li id='s-cat5'><a href='#'>Sub Category 20.5 of Category 20</a></li>" +
						"</ul>");
			}
			
		}
		
	}).change();
	


	var navLinks = $("#nav-links");
	navLinks.hide();
	
	$(".cats").delegate("#sub-link-1", "click", function(){
		if($("#nav-links").is(":visible")) {
			$("#nav-links h1").text("Links of Sub Category 1.1");
			navLinks.hide();
			navLinks.fadeToggle();
			$("#links-1").html("<a href='javascript:void(0)'>Link 1</a>");
			$("#links-2").html("<a href='javascript:void(0)'>Link 1</a>");
			$("#links-3").html("<a href='javascript:void(0)'>Link 1</a>");
			$("#links-4").html("<a href='javascript:void(0)'>Link 1</a>");
			return false;
			} else {
				$("#nav-links h1").text("Links of Sub Category 1.1");
				navLinks.fadeToggle();
				$("#links-1").html("<a href='javascript:void(0)'>Link 1</a>");
				$("#links-2").html("<a href='javascript:void(0)'>Link 1</a>");
				$("#links-3").html("<a href='javascript:void(0)'>Link 1</a>");
				$("#links-4").html("<a href='javascript:void(0)'>Link 1</a>");
				return false;
			}
	});
	
	$(".cats").delegate("#sub-link-2", "click", function(){
		if($("#nav-links").is(":visible")) {
			$("#nav-links h1").text("Links of Sub Category 1.2");	
		navLinks.hide();
		navLinks.fadeToggle();
		$("#links-1").html("<a href='#'>Link 2</a>");
		$("#links-2").html("<a href='#'>Link 2</a>");
		$("#links-3").html("<a href='#'>Link 2</a>");
		$("#links-4").html("<a href='#'>Link 2</a>");
		
		} else {
			$("#nav-links h1").text("Links of Sub Category 1.2");
			navLinks.fadeToggle();
			$("#links-1").html("<a href='#'>Link 2</a>");
			$("#links-2").html("<a href='#'>Link 2</a>");
			$("#links-3").html("<a href='#'>Link 2</a>");
			$("#links-4").html("<a href='#'>Link 2</a>");
		
		}
	});
	
	$(".cats").delegate("#sub-link-3", "click", function(){
		if($("#nav-links").is(":visible")) {
			$("#nav-links h1").text("Links of Sub Category 1.3");	
		navLinks.hide();
		navLinks.fadeToggle();
		$("#links-1").html("<a href='#'>Link 3</a>");
		$("#links-2").html("<a href='#'>Link 3</a>");
		$("#links-3").html("<a href='#'>Link 3</a>");
		$("#links-4").html("<a href='#'>Link 3</a>");
		
		} else {
			$("#nav-links h1").text("Links of Sub Category 1.3");
			navLinks.fadeToggle();
			$("#links-1").html("<a href='#'>Link 3</a>");
			$("#links-2").html("<a href='#'>Link 3</a>");
			$("#links-3").html("<a href='#'>Link 3</a>");
			$("#links-4").html("<a href='#'>Link 3</a>");
		
		}
	});
	
	
	

});
