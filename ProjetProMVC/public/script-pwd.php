<!-- scipt pour afficher maquer les mot de passe  -->
<!-- Hide show MDP -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
  // hide / show password 
  $(document).ready(function () {
    var checkbox = $("#checkbox");
    var password = $("#pwd");
    checkbox.click(function () {
      if (checkbox.prop("checked")) {
        password.attr("type", "text");
      } else {
        password.attr("type", "password");
      }
    });
  });
</script>
<!-- Hide show MDP -->