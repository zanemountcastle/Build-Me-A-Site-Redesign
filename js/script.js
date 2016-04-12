// Theme Name: Build Me a Site
// Author: Zane Mountcastle
// Version: 1.0 

$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 750);
      return false;
    }
  }
});


  // var messages = $('div[data-type="message"]');
  //check if user updates the email field
  
  // $('.contact_form .cd-email').keyup(function(event){  
  //   //check if user has pressed the enter button (event.which == 13)
  //   if(event.which != 13) {
  //     //if not..
  //     //hide messages and loading bar 
  //     // messages.removeClass('slide-in is-visible');
  //     $('.contact_form').removeClass('second-reveal third-reveal fourth-reveal is-submitted').find('.cd-loading').off('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
  //   }

  //   // var input = $(this),
  //   //     emailInput = $(this),
  //   //     insertedEmail = emailInput.val(),
  //   //     atPosition = insertedEmail.indexOf("@");
  //   //     dotPosition = insertedEmail.lastIndexOf(".");
  //     //check if user has inserted a "@" and a dot
  //   if (atPosition < 1 || dotPosition<atPosition+2 ) {
  //     //if he hasn't..
  //     //hide the submit button
  //     $('.contact_form').removeClass('is-active').find('.cd-loading').off('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
  //   }
  //   else {
  //     //if he has..
  //     //show the submit button
  //     $('.contact_form').addClass('is-active');
  //   }

  // });

  var firstReveal = $('.first-reveal');
  var secondReveal = $('.second-reveal');
  var thirdReveal = $('.third-reveal');

  // secondReveal.removeClass('.is-active');
  // thirdReveal.removeClass('.is-active');
  // fourthReveal.removeClass('.is-active');

  secondReveal.hide();
  thirdReveal.hide();

  function checkInputs(section) {
    var hasValue = true;
    section.each(function() {
      //console.log($(this).val().length);
      if ($(this).val().length === 0 ) {
        hasValue = false;
      } 
    });
    return hasValue;
  };

  function revealNext(current, next){
    current.on('keyup', function(){
        var value = checkInputs(current);
        if (value === true){
          next.show(500);
        }
    });
  };

  function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
  };

  $('.email').keyup(function(event){ 
    if (isValidEmailAddress( $('input.email').val() ) === true) {
      revealNext(firstReveal, secondReveal);
    }
  }); 

  $('.services input').on('change', function() {
    thirdReveal.show(500);
  })

});
