<footer class="container-fluid ">
  <div class="row">
    <div class="container ">
      <div class="footerContent">
        <div class="row">
          <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12">
            <p class="h4">Contact:</p>
            <p class="text-white text-left">
              <br> Email: pragstore@gmail.com <br>
              phone: 5987777 <br>
              Location: philippines <br>
              <br> Privacy Policy and Security<br>
              Terms and Conditions <br>
            </p>

          </div>
          <div class="col-md-4 col-lg-4 col-sm-12 ">
            <p class="h4">partnership:
            </p>
            <ul id="hexGrid">
              <li class="hex">
                <a class="hexIn" href="#">
                  <img src="{{ asset('img/logo/CK-logo.jpg') }}" alt="" />

                </a>
              </li>
              <li class="hex">
                <a class="hexIn" href="#">
                  <img src="{{ asset('img/logo/nike-logo.jpg') }}" alt="" />

                </a>
              </li>
              <li class="hex">
                <a class="hexIn" href="#">
                  <img src="{{ asset('img/logo/converse-logo.jpg') }}" />

                </a>
              </li>
              <li class="hex">
                <a class="hexIn" href="#">
                  <img src="{{ asset('img/logo/microsoft.png') }}" />

                </a>
              </li>
              <li class="hex">
                <a class="hexIn" href="#">
                  <img src="{{ asset('img/logo/vans-logo.jpg') }}" />

                </a>
              </li>
              <li class="hex">
                <a class="hexIn" href="#">
                  <img src="{{ asset('img/logo/gucci-logo.jpg') }}" />

                </a>
              </li>
              <li class="hex">
                <a class="hexIn" href="#">
                  <img src="{{ asset('img/logo/Fendi-logo.jpg') }}" />

                </a>
              </li>
            </ul>

          </div>
          <div class="col-md-4 col-lg-4 col-sm-12">
            <p class="h4">Locate Us:</p>
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.846740600293!2d121.07810594934003!3d14.607804989747766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b81d69c8e2c9%3A0xbc42fdd79a5f6536!2sPragmanila+Solutions+Inc.!5e0!3m2!1sen!2sph!4v1559550617452!5m2!1sen!2sph"
              width="320px" height="300px" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<div class="bg-secondary text-center text-white p-1 ">
  Copyright @ 2019
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
  $('.multiple-items').slick({
    infinite: false,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [{

      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
     
      }

      }, {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        dots: true
      }

      }, {
        breakpoint: 1300,
      settings: {
        slidesToShow: 4,
        dots: true
      }

      }, {

      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        dots: true
      }

      }, {  

        breakpoint: 300,
      settings: {
        slidesToShow: 1,
        dots: false,
        arrows:	true
      }
      }]
    });
</script>
</body>

</html>