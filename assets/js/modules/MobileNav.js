import $ from 'jquery';

class MobileNav {
  constructor() {
    this.mobileBackground = $(".mobile-navigation__background");
    this.mobileMenu = $(".mobile-navigation__menu");
    this.mobileContent = $(".mobile-navigation__nav");
    this.mobileIcon = $(".mobile-navigation__icon");
    this.body = $(".container");

    
    this.events();
  }



  events() {



    this.mobileMenu.click(this.toggleTheMenu.bind(this));
   // pushe escape to exit menu
   $(document).keyup(this.keyPressHandler.bind(this));


    // Button click action
    this.mobileMenu.click(this.toggleTheAria.bind(this));

   
  }
  
    
  

  keyPressHandler(e){
    if (e.keyCode == 27) {
      if (this.mobileIcon.hasClass("mobile-navigation__icon--close-x")) {this.toggleTheMenu()} ;
    }
  }
  

  toggleTheAria(){
    var toggleAria = function(attrSuffix) {
      var fullAttr = 'aria-' + attrSuffix;
      this.attr(fullAttr, function (i, attr) {
        return attr == 'true' ? 'false' : 'true'
      });
      return this;}
    this.toggleAria('expanded');
    this.mobileContent.toggleAria('hidden');
  }



  toggleTheMenu(){
    this.mobileContent.toggleClass("mobile-navigation__nav--is-visible");
    this.mobileBackground.toggleClass("mobile-navigation__background--is-expanded");
    this.mobileIcon.toggleClass("mobile-navigation__icon--close-x");
    this.body.toggleClass("fixed-position");
  }






  

}

export default MobileNav;