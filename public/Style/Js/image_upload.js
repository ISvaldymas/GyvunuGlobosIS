    jQuery(document).ready(function($) {
      function readURL(input) {
        if (input.files && input.files[0])
        {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('#avatar_show').attr('src', e.target.result);
            $("#remove_button").removeClass("hidden");
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
      $("#avatar").change(function(){
        readURL(this);
      })

      $( "#remove_button" ).click(function() {
        $('#avatar').val('');
        $("#avatar_show").attr("src", "/Style/Images/avatar.jpg");
      });
    });