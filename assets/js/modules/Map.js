import $ from 'jquery';



$('.mobile-navigation__menu').click(function() {
    
  /*Check and alternate attribute's value,
  then show/hide accordingly using chaining. */
  if ($('.mobile-navigation__menu')
    .attr('aria-expanded') == 'false')
    $('.mobile-navigation__menu')
    .attr('aria-expanded', 'true')
  
  else
    $('.mobile-navigation__menu')
    .attr('aria-expanded', 'false')
  
  
  /*Check and alternate attribute's value,
  then show/hide accordingly using chaining. */
  if ($('.mobile-navigation__nav')
    .attr('aria-hidden') == 'true')
    $('.mobile-navigation__nav')
    .attr('aria-hidden', 'false')
  else
    $('.mobile-navigation__nav')
    .attr('aria-hidden', 'true')
});




// * Tabbed Bios


  $('.bios__list > li > a').click(function(event) {
    event.preventDefault(); //stop browser to take action for clicked anchor
  
    //get displaying tab content jQuery selector
    var active_tab_selector = $('.bios__list > li.active > a').attr('href');
  
    //find actived navigation and remove 'active' css
    var actived_nav = $('.bios__list > li.active');
    actived_nav.removeClass('active');
  
    //add 'active' css into clicked navigation
    $(this).parents('li').addClass('active');
  
    //hide displaying tab content
    $(active_tab_selector).removeClass('active');
    $(active_tab_selector).addClass('hide');
    
    //show target tab content
    var target_tab_selector = $(this).attr('href');
    $(target_tab_selector).removeClass('hide');
    $(target_tab_selector).addClass('active');
  });

  // * Improve trainings Tabs
  $('.improve-trainings__list > li > a').click(function(event) {
    event.preventDefault(); //stop browser to take action for clicked anchor
  
    //get displaying tab content jQuery selector
    var active_tab_selector = $('.improve-trainings__list > li.active > a').attr('href');
  
    //find actived navigation and remove 'active' css
    var actived_nav = $('.improve-trainings__list > li.active');
    actived_nav.removeClass('active');
  
    //add 'active' css into clicked navigation
    $(this).parents('li').addClass('active');
  
    //hide displaying tab content
    $(active_tab_selector).removeClass('active');
    $(active_tab_selector).addClass('hide');
    
    //show target tab content
    var target_tab_selector = $(this).attr('href');
    $(target_tab_selector).removeClass('hide');
    $(target_tab_selector).addClass('active');
  });


    // * Map dropdown
	// Get all the dropdown from document
document.querySelectorAll('.dropdown-toggle').forEach(dropDownFunc);

// Dropdown Open and Close function
function dropDownFunc(dropDown) {
    console.log(dropDown.classList.contains('click-dropdown'));

    if(dropDown.classList.contains('click-dropdown') === true){
        dropDown.addEventListener('click', function (e) {
            e.preventDefault();        
    
            if (this.nextElementSibling.classList.contains('dropdown-active') === true) {
                // Close the clicked dropdown
                this.parentElement.classList.remove('dropdown-open');
                this.nextElementSibling.classList.remove('dropdown-active');
    
            } else {
                // Close the opend dropdown
                closeDropdown();
    
                // add the open and active class(Opening the DropDown)
                this.parentElement.classList.add('dropdown-open');
                this.nextElementSibling.classList.add('dropdown-active');
            }
        });
    }

    if(dropDown.classList.contains('hover-dropdown') === true){

        dropDown.onmouseover  =  dropDown.onmouseout = dropdownHover;

        function dropdownHover(e){
            if(e.type == 'mouseover'){
                // Close the opend dropdowns
                closeDropdown();

                // add the open and active class(Opening the DropDown)
                this.parentElement.classList.add('dropdown-open');
                this.nextElementSibling.classList.add('dropdown-active');
                
            }

             //if(e.type == 'mouseout'){
            //     // close the dropdown after user leave the list
               // e.target.nextElementSibling.onmouseleave = closeDropdown;
             //}
        }
    }

};


// Listen to the doc click
window.addEventListener('click', function (e) {

    // Close the menu if click happen outside menu
    if (e.target.closest('#dropdown-container') === null) {
        // Close the opend dropdown
        closeDropdown();
    }

});


// Close the openend Dropdowns
function closeDropdown() { 
    console.log('run');
    
    // remove the open and active class from other opened Dropdown (Closing the opend DropDown)
    document.querySelectorAll('#dropdown-container').forEach(function (container) { 
        container.classList.remove('dropdown-open')
    });

    document.querySelectorAll('.dropdown-menu').forEach(function (menu) { 
        menu.classList.remove('dropdown-active');
    });
}

// close the dropdown on mouse out from the dropdown list
document.querySelectorAll('#dropdown-menu').forEach(function (dropDownList) { 
    // close the dropdown after user leave the list
    dropDownList.onmouseleave = closeDropdown;
});


// * Accessible Faqs 
var accordion = $('body').find('[data-behavior="accordion"]');
var expandedClass = 'is-expanded';

$.each(accordion, function () { // loop through all accordions on the page

  var accordionItems = $(this).find('[data-binding="expand-accordion-item"]');

  $.each(accordionItems, function () { // loop through all accordion items of each accordion
    var $this = $(this);
    var triggerBtn = $this.find('[data-binding="expand-accordion-trigger"]');
    
    var setHeight = function (nV) {
      // set height of inner content for smooth animation
      var innerContent = nV.find('.faqs__content-inner')[0],
          maxHeight = $(innerContent).outerHeight(),
          content = nV.find('.faqs__content')[0];

      if (!content.style.height || content.style.height === '0px') {
        $(content).css('height', maxHeight);
      } else {
        $(content).css('height', '0px');
      }
    };
    
    var toggleClasses = function (event) {
      var clickedItem = event.currentTarget;
      var currentItem = $(clickedItem).parent();
      var clickedContent = $(currentItem).find('.faqs__content')
      $(currentItem).toggleClass(expandedClass);
      setHeight(currentItem);
      
      if ($(currentItem).hasClass('is-expanded')) {
        $(clickedItem).attr('aria-selected', 'true');
        $(clickedItem).attr('aria-expanded', 'true');
        $(clickedContent).attr('aria-hidden', 'false');

      } else {
        $(clickedItem).attr('aria-selected', 'false');
        $(clickedItem).attr('aria-expanded', 'false');
        $(clickedContent).attr('aria-hidden', 'true');
      }
    }
    
    triggerBtn.on('click', event, function (e) {
      e.preventDefault();
      toggleClasses(event);
    });

    // open tabs if the spacebar or enter button is clicked whilst they are in focus
    $(triggerBtn).on('keydown', event, function (e) {
      if (e.keyCode === 13 || e.keyCode === 32) {
        e.preventDefault();
        toggleClasses(event);
      }
    });
  });

});





	
export default Map;
