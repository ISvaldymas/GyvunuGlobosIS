      jQuery(document).ready(function($) {
        $("#logged_field").hide();
        $("#error").hide();
        $("#login_form").submit(function(form){
            //$("#submit").button('loading');
            form.preventDefault();
            var form_data = $("#login_form").serialize();
            var form_action = $("#login_form").attr('action');
            var form_method = $("#login_form").attr('method');
            $.ajax({
                type    : form_method,
                dataType: "json",
                url     : form_action,
                data    : form_data,
                success : function(data){
                    if(data['state'] == 'succses')
                    {
                        //prisijungta:
                        $("#login_field").hide();
                        $("#error").hide();
                        $("#logged_field").show();
                        setTimeout(function(){
                            window.location.href = "/home";
                        }, 3000);
                    }else
                    {
                        //nepavyko:
                        $("#submit").button('reset');
                        $("#error").html('<strong>Klaida: </strong> ' + data['email']);
                        $("#error").show();
                    }
                    console.log(data.status + " MSG " + data + " / " + JSON.stringify(data));
                },
                error   : function(data){
                    console.log('Serverio klaida');
                    console.log(data.status + " error " + data + " / " + JSON.stringify(data));
                }
            });
        });

        //Registration
        $("#register_form").submit(function(register_form){
            var submit = $(this).find("#submit").button('loading');
            register_form.preventDefault();
            var form_data = $(this).serialize();
            var form_action = $(this).attr('action');
            var form_method = $(this).attr('method');

            $("#reg_el").removeClass("has-error");
            $("#reg_pasw").removeClass("has-error");
            $("#reg_conf_pasw").removeClass("has-error");

            //Registruoti:
            $.ajax({
                type    : form_method,
                dataType: "json",
                url     : form_action,
                data    : form_data,
                success : function(data){
                    if(data['state'] == 'succses')
                    {
                        $("#register_form").hide();
                        $("#reg_header").hide();
                        $("#registered_field").removeAttr("hidden");
                        $('#myModal').on('hidden.bs.modal', function (e) {
                            window.location.href = "/home";
                        });
                    }
                    console.log(data.status + " succsess" + data + " / " + JSON.stringify(data));
                },
                error   : function(data){
                    console.log('Serverio klaida');
                    console.log(data.status + " error " + data + " / " + JSON.stringify(data));
                    $("#reg_error").html("<strong>Klaida: </strong>" + data['responseJSON']['email'] + "<br>" + data['responseJSON']['password']);
                    $("#reg_error").removeAttr("hidden");

                    if("email" in data['responseJSON'])
                    {
                        $("#reg_el").addClass("has-error");
                    }
                    if("password" in data['responseJSON'])
                    {
                        $("#reg_pasw").addClass("has-error");
                        $("#reg_conf_pasw").addClass("has-error");
                    }
                    submit.button('reset');
                }
            });
            
        });
      });