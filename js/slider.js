export default isLoadingSlider;

function sliderInit() {

   // Main slider
   const slider = $('.our-poducts__slider').not('.slick-initialized');
   slider.slick({
      dots: false,
      arrows: true,
      prevArrow: '#productsSlider .arrow--prev',
      nextArrow: '#productsSlider .arrow--next',
      infinite: true,
      autoplay: false,
      speed: 300,
      slidesToShow: 3,
      responsive: [
         {
            breakpoint: 767,
            settings: 'unslick'
         }
      ]
   });  

   // Slider reviews clients
   $('#reviews-client-slider').not('.slick-initialized').slick({
      centerMode: true,
      centerPadding: 0,
      margin: '15px',
      arrows: true,
      prevArrow: '.rewiews-clients .arrow--prev',
      nextArrow: '.rewiews-clients .arrow--next',
      infinite: true,
      autoplay: false,
      speed: 900,
      slidesToShow: 3,
      slidesToScroll: 1,
      focusOnSelect: true,
      responsive: [
         {
            breakpoint: 1023,
            settings: 'unslick'
         },
      ]
   });

   // Slider reviews experts
   const expertsSlider = $('#experts-slider').not('.slick-initialized');
   expertsSlider.slick({
      arrows: true,
      prevArrow: '.our-experts .arrow--prev',
      nextArrow: '.our-experts .arrow--next',
      infinite: true,
      autoplay: false,
      speed: 100,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
         {
            breakpoint: 767,
            settings: 'unslick'
         },
      ]
   });

   //partners
   $('#partnersSlider').not('.slick-initialized').slick({
      dots: false,
      arrows: true,
      prevArrow: '.partners-slider--nav.arrow--prev',
      nextArrow: '.partners-slider--nav.arrow--next',
      infinite: true,
      autoplay: false,
      speed: 300,
      slidesToShow: 5,
      responsive: [
         {
            breakpoint: 1023,
            settings: {
               slidesToShow: 4,
            }
         },
         {
            breakpoint: 767,
            settings: 'unslick'
         }
      ]
   });  


   // Slider reviews clients
   $('#gallery-slider').not('.slick-initialized').slick({
      arrows: true,
      prevArrow: '.gallery-slider--arrow.arrow--prev',
      nextArrow: '.gallery-slider--arrow.arrow--next',
      infinite: true,
      autoplay: false,
      speed: 500,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
         {
            breakpoint: 767,
            settings: 'unslick'
         },
      ]
   });
}  

// When the sliders are loaded 
function isLoadingSlider() {
   const sliders = document.querySelectorAll('.is-loading');

   sliderInit();
   sliders.forEach(slider => {
      slider.classList.remove('is-loading');
   })
}

window.addEventListener('resize', sliderInit);