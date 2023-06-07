setTimeout(()=>{
  $('html').css('opacity', '1');  
},10)

 
  $('.search-form input').keyup(()=>{  
    var searchSendButton = $('.button-search'); 
    if($('.search-form input').val().length < 3){
      searchSendButton.css('pointerEvents', 'none');
    }else{
      searchSendButton.css('pointerEvents', 'initial');
    } 
  });
  

$(document).ready(function(){
  $('.slider_1').slick({  
      slidesToShow: 4,
      slidesToScroll: 1,
      nextArrow: $('.left-arrow'),
      prevArrow: $('.right-arrow'),
      responsive: [
        {
          breakpoint: 1638,
          settings: {
            centerMode: true,
            centerPadding: '90px',
            slidesToShow: 3
          }
        },
        {
          breakpoint: 1399,
          settings: {
            centerMode: true,
            centerPadding: '90px',
            slidesToShow: 3
          }
        },
        {
          breakpoint: 1199,
          settings: { 
            slidesToShow: 3
          }
        },
        {
          breakpoint: 991,
          settings: {
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 2
          }
        },
        {
          breakpoint: 768,
          settings: {
            arrows: false, 
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 2
          }
        },
        {
          breakpoint: 574,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '35px',
            slidesToShow: 1
          }
        }
      ]
    });
});


$('.burger-lines').click(() => { 
  $('.burger-menu-box').addClass('open-burger-menu');
})
$('.burger-close-btn').click(() => { 
  $('.burger-menu-box').removeClass('open-burger-menu');
})

$(document).ready(function (){
  setTimeout(() => { 
    var alertBox = document.getElementsByClassName("alert");
    $(alertBox).css('display', 'none')
  }, 4000);
});



// Scroll Header

var scrollNum = 35;

$(window).scroll(() => {
  if(scrollY > 10){ 
      $( ".header-1-box" ).addClass('scroll-header-class');
  }else{
      $( ".header-1-box" ).removeClass('scroll-header-class');
  } 
  if(scrollY >= scrollNum){ 
    $( ".header-box" ).css('top', '0px');
  }else{
    $( ".header-box" ).css('top', '35px');
  }
});


$(document).ready(() => {  
  if(scrollY > 10){ 
      $( ".header-1-box" ).addClass('scroll-header-class');
  }else{
      $( ".header-1-box" ).removeClass('scroll-header-class');
  } 
  if(scrollY >= scrollNum){  
    $( ".header-box" ).css('top', '0px'); 
  }else{
    $( ".header-box" ).css('top', '35px');
  }
});

// Scroll Header

//valid input

$('.valid-input-box input').keyup(function(){  
  if($(this).val().length > 0){ 
    $(this).parent().addClass('hidden-validate'); 
  }else{
    $(this).parent().removeClass('hidden-validate');
  }
}) 

$('.valid-textarea-box textarea').keyup(function(){  
  if($(this).val().length > 0){ 
    $(this).parent().addClass('hidden-validate'); 
  }else{
    $(this).parent().removeClass('hidden-validate');
  }
})
$('.sent-valid-input-box input').keyup(function(){  
  if($(this).val().length > 0){ 
    $(this).parent().addClass('hidden-validate'); 
  }else{
    $(this).parent().removeClass('hidden-validate');
  }
}) 

$('.sent-valid-textarea-box textarea').keyup(function(){  
  if($(this).val().length > 0){ 
    $(this).parent().addClass('hidden-validate'); 
  }else{
    $(this).parent().removeClass('hidden-validate');
  }
})
//valid input

$(document).ready(() => {
 $('.close-btn').click(()=>{
  $('.sent-form-det').css('display', 'none');
  $('.send-btn-active').css('display', 'flex');
 });
});
$(document).ready(() => {
$('.send-btn-active').click(()=>{
 $('.sent-form-det').css('display', 'flex');
 $('.send-btn-active').css('display', 'none');
});
});


$(document).ready(()=> {
$('.upload-file-input').change(()=>{ 
  var inpSplit = $('.upload-file-input').val().split('\\'); 
  var index = inpSplit.length - 1;  
  $('.file-text').html(inpSplit[index]);
});
});



$(document).ready(() => { 
  console.log( $('._banner').height() - $('.header-box').height())
    $('html, body').animate({
      scrollTop: $('._banner').offset().top + $('._banner').height() - $('.header-box').height()
  }, 'slow');   
})
 

if($(window).width() >= 992){ 
   
ScrollReveal().reveal('.home-banner-nav', {
  delay: 400,
  duration: 600,
  distance: '300px',
  origin: 'right',
  reset: false,
}); 
ScrollReveal().reveal('.home-banner-image', {
  delay: 400,
  duration: 600,
  distance: '300px',
  origin: 'left',
  reset: false,
}); 
ScrollReveal().reveal('.home-banner-text', {
  delay: 600,
  duration: 600,
  distance: '0', 
  reset: false,
}); 
ScrollReveal().reveal('.important-title', {
  delay: 500,
  duration: 300,
  distance: '0', 
  reset: false,
}); 
ScrollReveal().reveal('.programs-box', {
  delay: 600,
  duration: 600,
  distance: '200px',
  origin: 'bottom',
  reset: false,
}); 
ScrollReveal().reveal('.vacancy-section', {
  delay: 600,
  duration: 400,
  distance: '0', 
  reset: false,
}); 
ScrollReveal().reveal('.vacancy-box', {
  delay: 600,
  duration: 500,
  distance: '300px',
  origin: 'left', 
  reset: false,
});
ScrollReveal().reveal('.vacancy-type-list .vacancy-item:nth-child(1)', {
  delay: 600,
  duration: 700,
  distance: '100px',
  origin: 'left', 
  reset: false,
});
ScrollReveal().reveal('.vacancy-type-list .vacancy-item:nth-child(2)', {
  delay: 600,
  duration: 700,
  distance: '150px',
  origin: 'left', 
  reset: false,
});
ScrollReveal().reveal('.vacancy-type-list .vacancy-item:nth-child(3)', {
  delay: 600,
  duration: 700,
  distance: '200px',
  origin: 'left', 
  reset: false,
});
ScrollReveal().reveal('.vacancy-type-list .vacancy-item:nth-child(4)', {
  delay: 600,
  duration: 700,
  distance: '250px',
  origin: 'left', 
  reset: false,
});
ScrollReveal().reveal('.vacancy-right-box', {
  delay: 600,
  duration: 700,
  distance: '250px',
  origin: 'right', 
  reset: false,
});
ScrollReveal().reveal('.__about-left-image-box', {
  delay: 500,
  duration: 500,
  distance: '250px',
  origin: 'left', 
  reset: false,
});
ScrollReveal().reveal('.right-about-box', {
  delay: 600,
  duration: 700,
  distance: '250px',
  origin: 'right', 
  reset: false,
});
ScrollReveal().reveal('.about-subscribe-box', {
  delay: 800,
  duration: 900,
  distance: '0',  
  reset: false,
});
ScrollReveal().reveal('.home-slider-section', {
  delay: 400,
  duration: 400,
  distance: '0',  
  reset: false,
});
ScrollReveal().reveal('.home-slider', {
  delay: 600,
  duration: 600,
  distance: '0',  
  origin: 'bottom',
  reset: false,
});
ScrollReveal().reveal('.footer-logo-box', {
  delay: 400,
  duration: 400,
  distance: '150px',  
  origin: 'left',
  reset: false,
});
ScrollReveal().reveal('.footer-contact-info', {
  delay: 400,
  duration: 400,
  distance: '0',   
  reset: false,
});
ScrollReveal().reveal('.footer-links', {
  delay: 400,
  duration: 400,
  distance: '0',   
  reset: false,
});
ScrollReveal().reveal('.footer-message-box', {
  delay: 400,
  duration: 400,
  distance: '150px',  
  origin: 'right',   
  reset: false,
});
ScrollReveal().reveal('._banner', {
  delay: 400,
  duration: 800,
  distance: '0',    
  reset: false,
});
ScrollReveal().reveal('.about-content-text', {
  delay: 400,
  duration: 800,
  distance: '0',   
  reset: false,
});
ScrollReveal().reveal('.brc-cont', {
  delay: 600,
  duration: 800,
  distance: '0',   
  reset: false,
});
ScrollReveal().reveal('.contact-box', {
  delay: 400,
  duration: 400,
  distance: '0',       
  reset: false,
});
ScrollReveal().reveal('.left-contact', {
  delay: 500,
  duration: 500,
  distance: '150px',  
  origin: 'left',    
  reset: false,
});
 
ScrollReveal().reveal('.right-cont-form-box', {
  delay: 700,
  duration: 700,
  distance: '0',       
  reset: false,
});
ScrollReveal().reveal('.map-box', {
  delay: 700,
  duration: 700,
  distance: '0',       
  reset: false,
});
ScrollReveal().reveal('.vacancy-det-box h1:first-child', {
  delay: 600,
  duration: 600,
  distance: '100px',  
  origin: 'left',        
  reset: false,
});
ScrollReveal().reveal('.buttons-box', {
  delay: 600,
  duration: 600,
  distance: '150px',  
  origin: 'left',        
  reset: false,
});
ScrollReveal().reveal('.requests-box', {
  delay: 600,
  duration: 600,
  distance: '200px',  
  origin: 'left',        
  reset: false,
});
ScrollReveal().reveal('.text-det-vac', {
  delay: 800,
  duration: 700,
  distance: '0',       
  reset: false,
});
ScrollReveal().reveal('.file-download', {
  delay: 800,
  duration: 700,
  distance: '200px',  
  origin: 'left',        
  reset: false,
});
ScrollReveal().reveal('.socials', {
  delay: 800,
  duration: 700,
  distance: '200px',  
  origin: 'left',        
  reset: false,
});
ScrollReveal().reveal('.v-det-right', {
  delay: 800,
  duration: 900,
  distance: '0',     
  reset: false,
});
ScrollReveal().reveal('.search-input-box', {
  delay: 500,
  duration: 500,
  distance: '30px',
  origin: 'bottom',     
  reset: false,
});
ScrollReveal().reveal('.result-item', {
  delay: 500,
  duration: 500,
  distance: '30px',
  origin: 'bottom',     
  reset: false,
});
ScrollReveal().reveal('.pagintaion_0', {
  delay: 500,
  duration: 500,
  distance: '0',      
  reset: false,
});
}
