import $ from 'jquery';
import waypoints from '../../../node_modules/waypoints/lib/noframework.waypoints';

class BackTop {
  constructor(){
    this.lazyImages = $(".lazyload");
    this.backTopBtn = $(".faq__backtop");
    this.triggerElement = $("#main-content");
    this.createOptionsWaypoint();
    this.refreshWaypoints();
  }

  


  createOptionsWaypoint() {
    var that = this;
    new Waypoint({
      element: this.triggerElement[0],
      handler: function(direction) {
        if (direction == "down"){
          that.backTopBtn.addClass("faq__backtop--is-visible");
        }else{
          that.backTopBtn.removeClass("faq__backtop--is-visible");
        }
      }
    })
  }


}

export default BackTop;