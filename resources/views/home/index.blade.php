@extends('layouts/main')
@section('title', '[CREATE]')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 text-center">
			<div class='chooseSize'>
				<div class='chooseSizeContainer'>
					<p class='chooseSizeText accentText bigText leftText'>Choose a size</p>

					<a href='/size/1' class='sizeOption initialSO size1'>
						<p class='sizeTextDetail darkText mediumText leftText'>2" x 2"</p>
						<div class='sizingHelperContainer'><div class='hoverFadeSingleSize'><div class='sizers sizer1'>
							<p class='sizerText darkText mediumText centerText'>$33</p></div></div></div>
						<div class='SOUnderline'></div>
					</a>
					<a href='/size/2' class='sizeOption initialSO size2'>
						<p class='sizeTextDetail darkText mediumText leftText'>3" x 3"</p>
						<div class='sizingHelperContainer'><div class='hoverFadeSingleSize'><div class='sizers sizer2'>
							<p class='sizerText darkText mediumText centerText'>$36</p></div></div></div>
						<div class='SOUnderline'></div>
					</a>
					<a href='/size/3' class='sizeOption initialSO size3'>
						<p class='sizeTextDetail darkText mediumText leftText'>4" x 4"</p>
						<div class='sizingHelperContainer'><div class='hoverFadeSingleSize'><div class='sizers sizer3'>
							<p class='sizerText darkText mediumText centerText'>$39</p></div></div></div>
						<div class='SOUnderline'></div>
					</a>

					<script>

					$('.sizingHelperContainer').hide();
					$('.SOUnderline').hide();

					setTimeout(function(){ $(".size1").removeClass('initialSO'); }, 200);
					setTimeout(function(){ $(".size2").removeClass('initialSO'); }, 300);
					setTimeout(function(){ $(".size3").removeClass('initialSO'); }, 400);
					setTimeout(function(){ $(".size4").removeClass('initialSO'); }, 500);
					setTimeout(function(){ $(".size5").removeClass('initialSO'); }, 600);
					setTimeout(function(){ $(".size6").removeClass('initialSO'); }, 700);

					</script>

				</div>

			</div>


			<div class='previousDesigns'>

				<div class='prevDesignsLoading'>
					<div class="sk-folding-cube">
						<div class="sk-cube1 sk-cube"></div>
						<div class="sk-cube2 sk-cube"></div>
						<div class="sk-cube4 sk-cube"></div>
						<div class="sk-cube3 sk-cube"></div>
					</div>
				</div>

				<div class='previousDesignsContainer'>

					<div class='spacer'></div>

					<p class='chooseSizeText accentText bigText leftText'>Your Previous Designs</p>

					
					<div class='prevDesignsModal'>
						<!-- PREVIOUS DESIGNS ARE ASYNCHRONOUSLY LOADED HERE --> 
					</div>

					<div class='loginModal'>
						<p class='loginText grayText mediumText centerText'>Login to view your designs</p>

						<a href='' class='facebookLogin lightText smallText centerText'>Login with Facebook</a>
						<a href='' class='emailLogin darkText smallText centerText'>Or login with Email</a>

						<input id="emailForm" class='emailForm leftText darkText smallText' name="email" type="text" value="" maxlength="60" autocomplete="off" placeholder="Enter your email"/>
						<a href='' class='emailSubmit darkText smallText centerText'>Next</a>
					</div>

					<p class='checkEmailText grayText mediumText centerText'>Please check your email! You can close this window for now.</p>

				</div>

				<div class='logoutModal'>
					<a href='' class='logoutButton lightText smallText centerText'>Log out</a>
				</div>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
// Fade in and out to white while loading the edit tool
$('.sizeOption').click(function(){
	var thisUrl = this.href;
	goToEditWithLink(thisUrl);
	return false;
});

// Animate entire size picking lineup on hover
var counter = 0;
$('.sizeOption').hover(
	function() {
		var child = $(this).find('.SOUnderline').stop().fadeIn(300);
		counter++;
		$('.sizingHelperContainer').stop().fadeIn('fast');
	}, function() {
		var child = $(this).find('.SOUnderline').stop().fadeOut(300);
		var prevCounter = counter;
		setTimeout(function(){ if (counter == prevCounter) $('.sizingHelperContainer').stop().fadeOut('fast'); },200);
	}
);

</script>

@endsection