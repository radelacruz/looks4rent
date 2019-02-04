@extends('layouts.app')
@section('footer')
	<footer id="footer" class="row px-3 justify-content-center text-light mt-5"> <!-- bg-dark fixed-bottom  -->
		<small class="py-5"> <!-- class="text-muted" -->
			<div id="disclaimer" class="text-center">
					<span>DISCLAIMER: I do not own nor claim to own any content within this site. Images in this site are from Google Images. Photos are used for training purposes and not to commercialize nor profit.</span>
					<br>
					<a target="_blank" href="https://radelacruz.github.io/portfolio">Razelle Ann Dela Cruz</a> | Tuitt Coding Bootcamp <span class="font-color-main">&copy;2019 SakuRaz</span>
			</div>
			<hr class="footer-hr">
			<div id="social" class="text-center">
				<!-- start social media -->
				<div>
					<a target="_blank" href="https://www.twitter.com/razelleanndc" class="fa fa-twitter hvr-float mx-3"></a>
					<a target="_blank" href="https://www.facebook.com/razelleanndc" class="fa fa-facebook hvr-float mx-3"></a>
					<a target="_blank" href="https://www.instagram.com/razelleanndc" class="fa fa-instagram hvr-float mx-3"></a>
				</div> <!-- end social media -->

			</div> <!-- end footer body -->
			<a class="float-right" id="back" href="#navbar">Back to Top</a>
		</small>
	</footer>

	<!-- external js -->
	<script type="text/javascript" src="../assets/js/script.js"></script>
@endsection