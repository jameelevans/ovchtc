import $ from 'jquery';

//*Tabbed Bios
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
  
/* Map
// Collecting id's and classes
var usa = document.getElementById("usa"),
	stateDetails = document.getElementById("state__details"),
	allStates = usa.getElementsByClassName("state");
	

  // On click of a US state if it has a path add the class active to the state and remove it if another state is clicked
	usa.addEventListener("click", function(e){ 
		var state = e.target.parentNode;
		if(e.target.nodeName == "path") {
		for (var i=0; i < allStates.length; i++) {
			allStates[i].classList.remove("active");
		}
		state.classList.add("active");

    // Collecting the paragraphs from states
		var statePara = state.querySelector("desc p");
   
    //Show the state details in the State Details div and add the show class
		stateDetails.innerHTML = "";
		stateDetails.insertAdjacentHTML("afterbegin", "<p>"+statePara.innerHTML+"</p>");
		stateDetails.classList.add("show");
		}
	});*/

    //* Map dropdown
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

            // if(e.type == 'mouseout'){
            //     // close the dropdown after user leave the list
            //     e.target.nextElementSibling.onmouseleave = closeDropdown;
            // }
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


	
export default Map;
