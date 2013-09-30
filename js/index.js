var bfirst = true;
$(".divloginbtncontainer").click(function(){
        if(bfirst == true)
        {
            $(".divloginbtncontainer").toggleClass("activelogincontainer");
            setTimeout(function(){ $(".divloginbtn").toggleClass('activeloginbutton'); }, 1000);
            $(".loginform").slideToggle(600);
            bfirst = false;
        }
   });
$(".button").click(function(){
   $(".divloginbtncontainer").toggleClass("activelogincontainer");
   setTimeout(function(){ $(".divloginbtn").toggleClass('activeloginbutton'); }, 1000);
   $(".loginform").slideToggle(600);
   bfirst = true;
});
$(".user").focusin(function(){
  $(".inputUserIcon").css("color", "#e74c3c");
}).focusout(function(){
  $(".inputUserIcon").css("color", "white");
});

$(".pass").focusin(function(){
  $(".inputPassIcon").css("color", "#e74c3c");
}).focusout(function(){
  $(".inputPassIcon").css("color", "white");
});


