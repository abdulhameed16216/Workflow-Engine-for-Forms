<script type="text/javascript">

function form_validation_with_data(validation_fileds)
{
  var error=false;
 $(".form-control").removeClass("is-invalid");
  var priority_id="";
  var form_data = new FormData();
  for(var i=0;i<validation_fileds.length;i++)
  {
    var current_variable=validation_fileds[i];
    var id_of=current_variable['id'];
    var name_of=current_variable['name'];
    var required_of=current_variable['required'];
    var field_type_of=current_variable['field_type'];
    var label_name_of=current_variable['label_name'];

    var current_value="";
    if(id_of && id_of!="")
    {
      current_value=$("#"+id_of).val();
    }
  if(field_type_of=="radio")
  {
    id_of=name_of;
    var radioValue = $("input[name='"+name_of+"']:checked").val();
    current_value=radioValue;
  }

  if(required_of)
  {
    if(!current_value || current_value=="")
    {
      if(id_of && id_of!="")
      {
      set_error1(id_of);
      }
      error=true;
      if(priority_id=="")
      {
        priority_id=id_of;
        alertmsg(label_name_of+" is required",id_of,id_of);
      }
    }
  }


  if(field_type_of=='alphabets')
  {
    if(current_value && current_value!="")
    {
      var alpha_temp=name_validation(current_value);
      if(!alpha_temp)
      {
        set_error1(id_of);
        error=true;
        if(priority_id=="")
        {
        priority_id=id_of;
        alertmsg(label_name_of+" must be a alphabets",id_of,id_of);
        }
      }
    }
  }

  if(field_type_of=='email')
  {
    if(current_value && current_value!="")
    {
      var email_temp=email_validadtion(current_value);
      if(!email_temp)
      {
        set_error1(id_of);
        error=true;
        if(priority_id=="")
        {
        priority_id=id_of;
        alertmsg("Type valid "+label_name_of,id_of,id_of);
        }
      }
    }
  }

  if(field_type_of=='mobile')
  {
    if(current_value && current_value!="")
    {
      var mobile_temp=mobile_number_validation(current_value);
      if(!mobile_temp)
      {
        set_error1(id_of);
        error=true;
        if(priority_id=="")
        {
        priority_id=id_of;
        alertmsg("Type valid "+label_name_of,id_of,id_of);
        }
      }
    }
  }

  if(current_value && current_value!="" && field_type_of=='date')
  {
  var date_array = current_value.split('-');
  current_value=date_array[2]+"-"+date_array[1]+"-"+date_array[0];
  }



  form_data.append(id_of, current_value);

  }
  return [form_data,error];
}

function name_validation(name)
{
    var letters = /^([\s\.]?[a-zA-Z]+)+$/;
    if(name.match(letters))
          {
        return true;
          }
        else
          {
          return false;
          }
}

function email_validadtion(email) {
 var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
 if(!regex.test(email)) {
   return false;
 }else{
   return true;
 }
}

function mobile_number_validation(mobile)
{
    var phoneno = /^\d{10}$/;
    if(mobile.match(phoneno))
          {
        return true;
          }
        else
          {
          return false;
          }
}


function successmsg(message,fieldid="")
{
    if(fieldid && fieldid!="")
  {
    $('#'+fieldid).notify(message,"success");
  }
  else
  {
    $.notify(message,"success");
  }
}


function set_error(fieldid)
{
var div_error = $('#'+fieldid).closest('div[class^="input-group"]');
div_error.addClass('has-error');
}

function set_error1(fieldid)
{
var div_error = $('#'+fieldid).addClass('is-invalid');
}

function alertmsg(message,fieldid="",focusid="")
{
  if(fieldid && fieldid!="")
  {
    $('#'+fieldid).notify(message,{position:'top left'});
  }
  else
  {
    $.notify(message);
  }
  if(focusid && focusid!="")
  {
    $(window).scrollTop($('#'+focusid).position().top);
    $('#'+focusid).focus();
  }
}

</script>
