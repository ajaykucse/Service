<div class="footer">
		<div class="col-sm-12" id="foot1">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="links">
							<h4>Quick Links</h4><hr>
							<ul>
								<li><a href="{{ url('/about-us') }}">Company Profile</a></li>
								<li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
								<li><a href="{{ url('/service') }}#automation">Business Automation Services</a></li>
								<li><a href="{{ url('/service') }}">Our Valued Assignments</a></li>
								<li><a href="{{ url('/solution') }}">Business Application Solution</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="midfooter">
							<img src="{{ asset('front-end/images/ca.jpg') }}" class="img-responsive">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="contact-info">
							<h4>Contact Us</h4><hr>
							<ul>
								<li>C.S.T.C. Pvt. Ltd.</li>
								<li>New Plaza Road, Putalisadak</li>
								<li>Kathmandu-44600, Nepal</li>
								<li>(+977) 01-4418816 / 970, 01-4424756</li>
								<li>cstc@vianet.com.np</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12" id="foot2">
			<div class="container">
				<div class="rights">
					<p>Copyright 2017 C.S.T.C. Pvt. Ltd. All Rights Reserved</p>
				</div>
			</div>
		</div>
</div>

 
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script type="text/javascript" src="{{ asset('front-end/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="{{ asset('front-end/js/modernizr.custom.79639.js') }}"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script type="text/javascript">
		function openModal() {
		  document.getElementById('myModal').style.display = "block";
		}

		function closeModal() {
		  document.getElementById('myModal').style.display = "none";
		}

		var slideIndex = 1;
		showSlides(slideIndex);

		function plusSlides(n) {
		  showSlides(slideIndex += n);
		}

		function currentSlide(n) {
		  showSlides(slideIndex = n);
		}

		function showSlides(n) {
		  var i;
		  var slides = document.getElementsByClassName("mySlides");
		  var dots = document.getElementsByClassName("demo");
		  var captionText = document.getElementById("caption");
		  if (n > slides.length) {slideIndex = 1}
		  if (n < 1) {slideIndex = slides.length}
		  for (i = 0; i < slides.length; i++) {
		    slides[i].style.display = "none";
		  }
		  for (i = 0; i < dots.length; i++) {
		    dots[i].className = dots[i].className.replace(" active", "");
		  }
		  slides[slideIndex-1].style.display = "block";
		  dots[slideIndex-1].className += " active";
		  captionText.innerHTML = dots[slideIndex-1].alt;
		}
	</script>

 

<script>
  @if(Session::has('message'))
    var type="{{Session::get('alert-type','info')}}"

    switch(type){
      case 'info':
             toastr.info("{{ Session::get('message') }}");
             break;
          case 'success':
              toastr.success("{{ Session::get('message') }}");
              break;
          case 'warning':
              toastr.warning("{{ Session::get('message') }}");
              break;
          case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
</script>

</body>
</html>