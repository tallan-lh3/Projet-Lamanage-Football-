$("#connexionHide").hide();
$("#connexion").click(function () {
  $("#connexionHide").fadeToggle("slow");
  $("#infossite").toggle("slow");

});

$("#Bgoal").hide();
$("#Bassist").hide();
$(".btn-Bgoal").click(function () {
  $("#Bgoal").fadeToggle("slow");
  $(".table-stats").toggle("slow");
});


$(".btn-Bassist").click(function () {
  $("#Bassist").fadeToggle("slow");
  $(".table-stats").toggle("slow");
});

$(".btn-back-assist").click(function () {
  $("#Bassist").fadeToggle("slow");
  $(".table-stats").toggle("slow");
});

$(".btn-back-goal").click(function () {
  $("#Bgoal").fadeToggle("slow");
  $(".table-stats").toggle("slow");
});


// change la fleche de sens pour afficher / cacher les joueurs 


// ATTAQUANT atk
$(".slideDown-middle-js-atk").hide()
$(".slideUp-middle-js-atk").click(function () {
  $(".toggle-middle-js-atk").fadeToggle("slow");
  $(".slideDown-middle-js-atk").fadeToggle("slow")
  $(".slideUp-middle-js-atk").hide();
});


$(".slideDown-middle-js-atk").click(function () {
  $(".toggle-middle-js-atk").fadeToggle("slow");
  $(".slideUp-middle-js-atk").fadeToggle("slow")
  $(".slideDown-middle-js-atk").hide();
});

// MILIEU mdl
$(".slideDown-middle-js-mdl").hide()
$(".slideUp-middle-js-mdl").click(function () {
  $(".toggle-middle-js-mdl").fadeToggle("slow");
  $(".slideDown-middle-js-mdl").fadeToggle("slow")
  $(".slideUp-middle-js-mdl").hide();
});


$(".slideDown-middle-js-mdl").click(function () {
  $(".toggle-middle-js-mdl").fadeToggle("slow");
  $(".slideUp-middle-js-mdl").fadeToggle("slow")
  $(".slideDown-middle-js-mdl").hide();
});

// DEFENSUER def
$(".slideDown-middle-js-def").hide()
$(".slideUp-middle-js-def").click(function () {
  $(".toggle-middle-js-def").fadeToggle("slow");
  $(".slideDown-middle-js-def").fadeToggle("slow")
  $(".slideUp-middle-js-def").hide();
});


$(".slideDown-middle-js-def").click(function () {
  $(".toggle-middle-js-def").fadeToggle("slow");
  $(".slideUp-middle-js-def").fadeToggle("slow")
  $(".slideDown-middle-js-def").hide();
});

// GARDIEN gk
$(".slideDown-middle-js-gk").hide()
$(".slideUp-middle-js-gk").click(function () {
  $(".toggle-middle-js-gk").fadeToggle("slow");
  $(".slideDown-middle-js-gk").fadeToggle("slow")
  $(".slideUp-middle-js-gk").hide();
});


$(".slideDown-middle-js-gk").click(function () {
  $(".toggle-middle-js-gk").fadeToggle("slow");
  $(".slideUp-middle-js-gk").fadeToggle("slow")
  $(".slideDown-middle-js-gk").hide();
});
// REMPALCANT sub
$(".slideDown-middle-js-sub").hide()
$(".slideUp-middle-js-sub").click(function () {
  $(".toggle-middle-js-sub").fadeToggle("slow");
  $(".slideDown-middle-js-sub").fadeToggle("slow")
  $(".slideUp-middle-js-sub").hide();
});


$(".slideDown-middle-js-sub").click(function () {
  $(".toggle-middle-js-sub").fadeToggle("slow");
  $(".slideUp-middle-js-sub").fadeToggle("slow")
  $(".slideDown-middle-js-sub").hide();
});



$(".FadeIn").hide();
$(".FadeIn").fadeIn(2000);


// edit profil Admin
$(function () {
  $("#PwdPopover")
    .popover({
      title: 'Aide',
      content: 'Le mot de passe doit être de 8 caractères minimum et contenir au moins 1 chiffre.',
      trigger: 'hover'
    })
    .blur(function () {
      $(this).popover('hide');
    });
});


// scroll compo player 
$(document).ready(function () {
  new WOW().init();
});



////////////////////// incrementation stats Game

var game = $('#game').val();

$(document).ready(function () {

  $("#plusGame").click(function () {
    game++;

    $("#game").val(game);
  });

});

////////////////  decrementation stats Game   


$(document).ready(function () {

  $("#lessGame").click(function () {
    game--;

    $("#game").val(game);
  });

});
///////////////// incrementation stats Goal

var goal = $('#goal').val();

$(document).ready(function () {

  $("#plusGoal").click(function () {
    goal++;

    $("#goal").val(goal);
  });

});

/////////////////////////  decrementation stats Goal 
$(document).ready(function () {

  $("#lessGoal").click(function () {
    goal--;

    $("#goal").val(goal);
  });

});

/////////////////////////// incrementation stats Assist

var assist = $('#assist').val();

$(document).ready(function () {

  $("#plusAssist").click(function () {
    assist++;

    $("#assist").val(assist);
  });

});

/////////////////////////  decrementation stats Assist 
$(document).ready(function () {

  $("#lessAssist").click(function () {
    assist--;

    $("#assist").val(assist);
  });

});