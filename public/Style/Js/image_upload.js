    jQuery(document).ready(function($) {
      function readURL(input) {
        $old_img = $('#avatar_show').attr('src');
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
        $("#avatar_show").attr("src", $old_img);
        $("#remove_button").addClass("hidden");
      });


      //-------------

      $( "#confirmed_email" ).change(function() {
        $('#email').val($("#confirmed_email option:selected").text());
      });
    });