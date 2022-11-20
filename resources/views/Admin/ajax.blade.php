  @include('layout.function')

<script type="text/javascript">
function login()
{
  var validation_fileds=[
    {id:'email',required:true,field_type:'email',label_name:'User name'},
    {id:'password',required:true,field_type:'password',label_name:'Password'},
  ];

  var form_data_return= form_validation_with_data(validation_fileds);

  var form_data=form_data_return[0];
  var error=form_data_return[1];

  if(!error)
  {
    $.ajax({
              url:"admin/login",
              dataType: "json",
                    cache: false,
                      contentType: false,
                      processData: false,
                      data: form_data,
                      type: 'post',
         success: function (output)
         {
           if(output.length>0)
           {
             var result=output[0]['response'];
             var reason=output[0]['reason'];
             if(result=="success")
             {
              successmsg("Login successfully");
              setTimeout(function(){
               window.location.reload();
              }, 1000);
             }
             else
             {
               alertmsg(reason);
             }
           }
         }
       });
  }
  return false;
}

function logout()
{
  bootbox.confirm({
    title: "Logout",
    message: "Do you want to logout",
    buttons: {
        cancel: {
            label: '<i class="fa fa-times"></i> Cancel'
        },
        confirm: {
            label: '<i class="fa fa-check"></i> Confirm'
        }
    },
    callback: function (result) {
      if(result)
      {
       $.ajax({
                  url:"{{asset('admin/logout')}}",
                  dataType: "json",
                        cache: false,
                          contentType: false,
                          processData: false,
                          type: 'post',
             success: function (output)
             {
               if(output.length>0)
               {
                 var result=output[0]['response'];
                 var reason=output[0]['reason'];
                 if(result=="success")
                 {
                  setTimeout(function(){
                   window.location.reload();
                  }, 1000);
                 }
                 else
                 {
                   alertmsg(reason);
                 }
               }
             }
           });

      }
    }
});
}

function setStatus(status,cus_id)
{
  var message="Reject";
  var fmessage="Rejected";
  if(status==1)
  {
    message="Approve";
    fmessage="Approved";
  }


  var form_data = new FormData();
  form_data.append('status', status);
  form_data.append('cus_id', cus_id);

console.log(cus_id);
  bootbox.confirm({
    title: message+" Status",
    message: "Do you want to "+message,
    buttons: {
        cancel: {
            label: '<i class="fa fa-times"></i> Cancel'
        },
        confirm: {
            label: '<i class="fa fa-check"></i> Confirm'
        }
    },
    callback: function (result) {
      if(result)
      {
       $.ajax({
                  url:"{{asset('admin/customerstatus')}}",
                  dataType: "json",
                        cache: false,
                          contentType: false,
                          processData: false,
                          data: form_data,
                          type: 'post',
             success: function (output)
             {
               if(output.length>0)
               {
                 var result=output[0]['response'];
                 var reason=output[0]['reason'];
                 if(result=="success")
                 {
                   $("#status_"+cus_id).html(fmessage);
                 }
                 else
                 {
                   alertmsg(reason);
                 }
               }
             }
           });

      }
    }
});
}



</script>
