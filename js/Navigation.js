ABglobal = {};
ABglobal.navigation = {};

ABglobal.navigation.mainMenuOpened = false;

$('.openMainMenu').on('click', function(){ABglobal.navigation.openSlidingMenu(); toogleMainMenu(this);});
//$('.closeMenuBcgr').on('click', function(){ABglobal.navigation.closeSlidingMenu(); toogleMainMenu(this);});
//toogleMainMenu(this);

ABglobal.navigation.openSlidingMenu = function(){
    
    if(ABglobal.navigation.mainMenuOpened == false){
    $('#mainMenu').animate({'width': '300px'},600);
    $('.mainMenuContent').animate({'right': '0'},400);
    $('.closeMenuBcgr').show();
    
    ABglobal.navigation.mainMenuOpened = true;
    }
    else{
        ABglobal.navigation.closeSlidingMenu();
    }
};

ABglobal.navigation.closeSlidingMenu = function(){
    $('#mainMenu').animate({'width': '50px'},600);
    $('.mainMenuContent').animate({'right': '44px'},400);
    $('.closeMenuBcgr').hide();
    
    ABglobal.navigation.mainMenuOpened = false;
};

function toogleMainMenu(x) {
    x.classList.toggle("change");
}

$( function() {
    $( "#datepicker" ).datepicker();
  } );