<script src="lib/jquery.min.js"></script>

<script>
   $(document).ready(function(){
	   $(window).bind('scroll', function() {
	   var navHeight = $( window ).height() - 545;
			 if ($(window).scrollTop() > navHeight) {
				 $('nav').addClass('fixed');
			 }
			 else {
				 $('nav').removeClass('fixed');
			 }
		});
	});
</script>   
<div class="row">
   <div class="col-md-12">
		    <div class="top_bar">
			    <div class="box">
				    <a href="index.php"><img id="logo" class="img-responsive" src="images/logo.png" alt="logo"></a>
                </div>				
				<div>
				<img  id="slogan" class="img-responsive" src="images/slogan.png" alt="Talent Meet Opportunity">
			    </div>				
			</div>	
		</div>
	</div>
   <div class="row">
   <div class="col-md-12"> <nav>  
		    <div class="nav_bar" align="center">
			    <ul id="navigation">
				    <li>
					<!-- icon source https://fortawesome.github.io/Font-Awesome/icons/ -->
					    <a href="index.php">
                        <i class="fa fa-home"></i> Home
                        </a>
					</li>					
					<li>
					    <a href="videos.php?category=mix"><i class="fa fa-play-circle"></i>&nbsp;Videos</a>
					</li>
					<li>
					    <a href="audios.php?category=mix"><i class="fa fa-file-audio-o"></i>&nbsp;Audio</a>
				    </li>
					<li>
					    <a href="photos.php?category=mix"><i class="fa fa-photo"></i>&nbsp;Images</a>
					</li>
					<li>
					    <a href="quotes.php?category=mix"><i class="fa fa-pencil-square-o"></i>Quotes</a>
				    </li>
					<li>
					    <a href="upload_step1.php">Upload</a>
					</li>
					<li>
					<?php 
					if($_SESSION['login_check']==1)
					{
					    echo "<a href='logout.php'>LogOut</a>";
					}
					else
					{
						echo "<a href='reg.php'>SignUp</a>";
					}
					?>
					</li>

					<li>
					    <a href="feedback.php">Feedback</a>
					</li>
					</ul>
			</div></nav>
			</div>

	</div>