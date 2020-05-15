import ScrollMagic from 'scrollmagic';
import { TweenMax, TimelineMax } from 'gsap';
import { ScrollMagicPluginGsap } from 'scrollmagic-plugin-gsap';
ScrollMagicPluginGsap(ScrollMagic, TweenMax, TimelineMax);
import isLoadingSlider from './slider';
import ajaxLoading from './ajax-loading';

function scrollMagic() {
   const counters = document.getElementsByClassName('counter--number');

   const counter = () => {      
      [...counters].map(counter => {
         const dataCount = counter.dataset.count;
         const number = dataCount.split('+')[0];
         const lastChar = dataCount.split('')[dataCount.length - 1];
         const char = isNaN(lastChar) ? lastChar : '';
         const time = 1.7;  
         const step = 1000 * time / number;
   
         let countNum = 0;
         const animation = setInterval(() => startCounter(), step);
   
         function startCounter() {
            if (countNum < number) {
               countNum++;
               counter.innerHTML = countNum + char;
            } 
            else stopCounter();
         }
   
         function stopCounter() {
            clearInterval(animation);
         }
      })
   }

   const controller = new ScrollMagic.Controller();

   if (counters.length > 0) {
      // create a scene
      let scene = new ScrollMagic.Scene({
         triggerElement: '#counter',
         triggerHook: 1,
      })
         .setTween(counter)
      .addTo(controller);
   }
}


// Show or remove class
function toggleClass(elem, className) {
   elem.forEach(el => el.classList.toggle(className));
}

// Remove class
function removeClass(elem, className) {
   elem.forEach(el => el.classList.remove(className));
} 

// Move some a block to another place
function wrap(elem, wrapper) {
   elem = document.querySelector(elem);
   wrapper = document.querySelector(wrapper);
   wrapper.before(elem); 
}

// Menu toggle. Change position menu if text of menu > header
function menuToggle() {
   const hamburger = document.getElementById('hamburger');
   const menu = document.querySelector('.menu');

   hamburger.addEventListener('click', () => {
      toggleClass([hamburger, menu, document.body], 'is-open');
   })

   // if text of menu > header
   const wrapMenu = () => {
      window.matchMedia('(max-width: 1279px)').matches
         ? wrap('.menu', '.site')
         : wrap('.menu', '#hamburger');
   }
   wrapMenu();
   window.addEventListener('resize', wrapMenu);
}

// scroll header, show when scroll to top
function scrollHeader() {
   const header = document.querySelector('.header');
   let scroll = 0;

   if (!document.body.classList.contains('is-open')) {
      document.addEventListener('scroll', () => {
         let scrollTop = document.body.getBoundingClientRect().top;
         if (scrollTop > scroll && scroll * -1 > header.clientHeight) {
            header.classList.add('is-scrolled');
         } 
         else header.classList.remove('is-scrolled');
         scroll = scrollTop;
      })
   }
}

// tabs on click or hover
function showTabs(elem, tab, isHover = false, hideAllTabContent = true, toScroll = false) {
   const tabs = document.querySelectorAll(elem);
   const tabContent = document.querySelectorAll(tab);
   const eventListener = isHover ? 'mouseover' : 'click';
   const classActive = 'is-active';

   const methods = {
      hideTabContent() {
         tabs.forEach(elem => elem.classList.remove(classActive));
         tabContent.forEach(elem => elem.classList.remove(classActive));
      },
      showTabContent(i) {
         tabs[i].classList.add(classActive); 
         tabContent[i].classList.add(classActive); 
      }
   }
   const { hideTabContent, showTabContent } = methods;

   if (tabs.length > 0) {      
      hideTabContent();
      hideAllTabContent && setTimeout(() => showTabContent(0), 300);

      tabs.forEach((elem, i) => {
         const tab = elem.querySelector('.js-tab') || elem;
         tab.addEventListener(eventListener, e => {                   
            if (elem.classList.contains('is-active') && hideAllTabContent === false) {
               hideTabContent();
            } 
            else {
               hideTabContent();
               showTabContent(i);
            }

            //scroll
            if (!e.target.classList.contains('accordion__subtab') && toScroll) {
               const y = elem.getBoundingClientRect().top + window.scrollY;
               setTimeout(() => {
                  window.scroll({
                     top: y - 120,
                     behavior: 'smooth'
                  });
               }, 300)
            }
         })
      })
   }
}

// init all tabs
function initTabs() {
   showTabs('.satellite', '.satellite__tab');
   showTabs('.etaps-list', '.etaps-content__tab', true);
   showTabs('.trusted-us-partner', '.trusted-us-partner .news__content', false, false);

   const accordion = document.querySelector('.accordion');
   if (accordion) {
      accordion.classList.contains('accordion--simple')
         ? showTabs('.accordion__item', '.accordion__tab-content', false, false, true)
         : showTabs('.accordion__item', '.accordion__tab-content', false, false, true);
   }
   showTabs('.accordion-faq .accordion__item', '.accordion-faq .accordion__tab-content', false, true, true);
}


function fancybox() {
   let galleryImg = [],
        postImg,
        imgStart;
   $('.fancy__slide').each(function(i) {
      postImg = $(this).attr('href');
      galleryImg[i] = {
         src: postImg,
         opts: {}
      };
      $(this).on('click', function(e) {
         e.preventDefault();
         $.fancybox.open(galleryImg, {
               loop: true,
               focus: false
         });
         imgStart = i;
         $.fancybox.getInstance().jumpTo(imgStart);
      });
   });
}


function newsletterToggle() {
   const newsletterBtn = document.getElementById('newsletterBtn');
   const newsletter = document.getElementById('newsletter');

   if (newsletterBtn) {
      newsletterBtn.addEventListener('click', () => newsletter.classList.toggle('is-open'));
   }
}


function openFullText(el) {
   const btns = document.querySelectorAll('.more-text-toggle');
   if (btns.length > 0) {
      btns.forEach(btn => {
         btn.addEventListener('click', () => {
            const container = btn.closest(el);
            container.classList.add('is-open');
         });
      })
   }
}

function newsletterCheckAcceptance() {
   const form = document.querySelector('.newsletter-subscribe form');

   if (form) {
      const submitBtn = form.querySelector('.tnp-submit');
      const checkboxs = document.querySelectorAll('.newsletter-checkbox');
      const lengthCheckbox = checkboxs.length;
      let count = 1;        
      
      checkboxs.forEach(checkbox => {
         form.addEventListener('submit', e => {
            e.preventDefault();
            if (checkbox.checked) {
               form.submit();
            }
         })

         checkbox.addEventListener('change', () => {         
            console.log(count);   
            checkbox.checked ? count++ : count--;
            lengthCheckbox < count ? submitBtn.classList.add('is-checked') : submitBtn.classList.remove('is-checked');
         })   
      })  
   }
}

document.addEventListener('DOMContentLoaded', function() {
   // scroll header
   scrollHeader();

   // toggle menu
   menuToggle();

   // load sliders
   isLoadingSlider();

   // init all tabs
   initTabs()

   // scroll to counter
   scrollMagic();


   // Gallery
   fancybox();

   // Toggle newsletter
   newsletterToggle();

   // toggle full text
   openFullText('.checkbox-field');

   // check if newsletter checked
   newsletterCheckAcceptance();
})