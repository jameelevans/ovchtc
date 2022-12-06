import $ from 'jquery';
/*
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

 $(document).ready(function() {


  
    
  //When page loads...
  $(".bio__content").hide(); //Hide all content
  $(".bios__item:first").addClass("active").show(); //Activate first tab
  $(".bio__content:first").show(); //Show first tab content
  //On Click Event
  $(".bios__item").click(function() {

    $(".bios__item").removeClass("active"); //Remove any "active" class
        $(this).addClass("active"); //Add "active" class to selected tab
        $(".bio__content").hide(); //Hide all tab content

        var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
        $(activeTab).fadeIn(); //Fade in the active ID content
        return false;
    });
  
});






export default TabbedBios;*/