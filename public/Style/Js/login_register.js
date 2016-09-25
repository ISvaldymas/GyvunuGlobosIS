      jQuery(document).ready(function($) {
        $("#logged_field").hide();
        $("#error").hide();
        $("#login_form").submit(function(form){
            $("#submit").button('loading');
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
                    console.log(data.status + " succsess");
                },
                error   : function(data){
                    if(data.status == 0)
                    {
                        //prisijungta:
                        $("#login_field").hide();
                        $("#error").hide();
                        $("#logged_field").show();
                        setTimeout(function(){
                            window.location.href = "/home";
                        }, 3000);
                    }else{
                        //nepavyko:
                        $("#submit").button('reset');
                        $("#error").show();
                    }
                }
            })
        })
        //Registration
        $("#register_form").submit(function(register_form){
            var submit = $(this).find("#submit").button('loading');
            register_form.preventDefault();
            var form_data = $(this).serialize();
            var form_action = $(this).attr('action');
            var form_method = $(this).attr('method');

            if($(this).find('#password').val() != $(this).find('#password-confirm').val())
            {
                //Klaida:
                $("#reg_pasw").addClass("has-error");
                $("#reg_conf_pasw").addClass("has-error");
                $("#reg_error").html("<strong>Klaida: </strong> slaptažodžiai nesutampa.");
                $("#reg_error").removeAttr("hidden");
                $("#reg_el").removeClass("has-error");
                submit.button('reset');
            }else{
                //Registruoti:
                $.ajax({
                    type    : form_method,
                    dataType: "json",
                    url     : form_action,
                    data    : form_data,
                    success : function(data){
                        console.log(data.status + " succsess");
                    },
                    error   : function(data){
                        if(data.status == 0)
                        {
                            //Prisijungta:
                            $("#register_form").hide();
                            $("#reg_header").hide();
                            $("#registered_field").removeAttr("hidden");
                            $('#myModal').on('hidden.bs.modal', function (e) {
                                window.location.href = "/home";
                            });

                        }else{
                            //nepavyko:
                            $("#reg_error").html("<strong>Klaida: </strong> el. paštas jau registruotas.");
                            $("#reg_error").removeAttr("hidden");
                            $("#reg_el").addClass("has-error");
                            $("#reg_pasw").removeClass("has-error");
                            $("#reg_conf_pasw").removeClass("has-error");
                            submit.button('reset');
                        }
                    }
                })
            }
        });
      });