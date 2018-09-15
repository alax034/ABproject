ABglobal.navigation.mainMenuOpened = false;

$('.openMainMenu').on('click', function(){ABglobal.navigation.openSlidingMenu(); ABglobal.navigation.toogleMainMenu(this);});
$('.closeMenuBcgr').on('click', function(){ABglobal.navigation.closeSlidingMenu();});

ABglobal.navigation.openSlidingMenu = function(){
    
    if(ABglobal.navigation.mainMenuOpened == false){
        $('.mainMenuContent').hide();
        $('#mainMenu').animate({'width': '300px'},300, function(){
            $('.mainMenuContent').show();
        });
        $('.closeMenuBcgr').show();

        ABglobal.navigation.mainMenuOpened = true;
    }
    else{
        ABglobal.navigation.closeSlidingMenu();
    }
};

ABglobal.navigation.closeSlidingMenu = function(){
    $('.mainMenuContent').hide();
    $('#mainMenu').animate({'width': '50px'},300);
    $('.closeMenuBcgr').hide();
    
    ABglobal.navigation.mainMenuOpened = false;
};

ABglobal.navigation.toogleMainMenu = function(x) {
    x.classList.toggle("change");
};

$( function() {
    $( "#menuCalendar" ).datepicker({
        firstDay: 1,
        changeMonth: true
    });
  } );