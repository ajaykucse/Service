@include('layouts.front-end.header')
<div class="clearfix"></div>
<div class="container">
			<div class="col-sm-12">
				<div class="abt-navigator">
					<h2><strong>Navigator+ Accounting Software</strong></h2><hr>
					<a href="downloads.php"><p class="dwnld-nav">Download Now</p></a><br>
					<div class="row">
						  <div class="column col-sm-4">
						    <img src="{{ asset('front-end/images/page1.jpg') }}" onclick="openModal();currentSlide(1)" class="img-responsive hover-shadow">
						  </div>
						  <div class="column col-sm-4">
						    <img src="{{ asset('front-end/images/page2.jpg') }}" onclick="openModal();currentSlide(2)" class="img-responsive hover-shadow">
						  </div>
						  <div class="column col-sm-4">
						    <img src="{{ asset('front-end/images/page3.jpg') }}" onclick="openModal();currentSlide(3)" class="img-responsive hover-shadow">
						  </div>
				  	</div>
				  	<div class="row">
						  <div class="column col-sm-4">
						    <img src="{{ asset('front-end/images/page4.jpg') }}" onclick="openModal();currentSlide(4)" class="img-responsive hover-shadow">
						  </div>
						  <div class="column col-sm-4">
						    <img src="{{ asset('front-end/images/page5.jpg') }}" onclick="openModal();currentSlide(5)" class="img-responsive hover-shadow">
						  </div>
						   <div class="column col-sm-4">
						    <img src="{{ asset('front-end/images/page6.jpg') }}" onclick="openModal();currentSlide(6)" class="img-responsive hover-shadow">
						  </div>
				  	</div>
					
					<div id="myModal" class="modal">
					  <span class="close cursor" onclick="closeModal()">&times;</span>
					  <div class="modal-content">

					    <div class="mySlides">
					      <div class="numbertext">1 / 6</div>
					        <img src="{{ asset('front-end/images/001.jpg') }}" style="width:100%">
					    </div>

					    <div class="mySlides">
					      <div class="numbertext">2 / 6</div>
					        <img src="{{ asset('front-end/images/002.jpg') }}" style="width:100%">
					    </div>

					    <div class="mySlides">
					      <div class="numbertext">3 / 6</div>
					        <img src="{{ asset('front-end/images/003.jpg') }}" style="width:100%">
					    </div>

					    <div class="mySlides">
					      <div class="numbertext">4 / 6</div>
					        <img src="{{ asset('front-end/images/004.jpg') }}" style="width:100%">
					    </div>

					     <div class="mySlides">
					      <div class="numbertext">5 / 6</div>
					        <img src="{{ asset('front-end/images/005.jpg') }}" style="width:100%">
					    </div>

					     <div class="mySlides">
					      <div class="numbertext">6 / 6</div>
					        <img src="{{ asset('front-end/images/006.jpg') }}" style="width:100%">
					    </div>

					    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
					    <a class="next" onclick="plusSlides(1)">&#10095;</a>

					    <div class="caption-container">
					      <p id="caption"></p>
					    </div>

					    <div class="column">
					      <img class="demo" src="{{ asset('front-end/images/page1.jpg') }}" onclick="currentSlide(1)" alt="Page 1">
					    </div>

					    <div class="column">
					      <img class="demo" src="{{ asset('front-end/images/page2.jpg') }}" onclick="currentSlide(2)" alt="Page 2">
					    </div>

					    <div class="column">
					      <img class="demo" src="{{ asset('front-end/images/page3.jpg') }}" onclick="currentSlide(3)" alt="Page 3">
					    </div>

					    <div class="column">
					      <img class="demo" src="{{ asset('front-end/images/page4.jpg') }}" onclick="currentSlide(4)" alt="Page 4">
					    </div>

					     <div class="column">
					      <img class="demo" src="{{ asset('front-end/images/page5.jpg') }}" onclick="currentSlide(5)" alt="Page 5">
					    </div>

					    <div class="column">
					      <img class="demo" src="{{ asset('front-end/images/page6.jpg') }}" onclick="currentSlide(6)" alt="Page 6">
					    </div>
					  </div>
					</div>
				</div>
			</div>
	</div>
<div class="clearfix"></div>
@include('layouts.front-end.footer')