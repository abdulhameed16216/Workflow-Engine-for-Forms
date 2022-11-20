@include('layout.function')

<script type="text/javascript">

function RegisterCustomer()
{
  var validation_fileds=[
    {id:'fname',required:true,field_type:'alphabets',label_name:'First name'},
    {id:'lname',required:true,field_type:'alphabets',label_name:'Last name'},
    {id:'email',required:true,field_type:'email',label_name:'Email Id'},
    {id:'dob',required:true,field_type:'date',label_name:'Date of Birth'},
  ];

  var form_data_return= form_validation_with_data(validation_fileds);

  var form_data=form_data_return[0];
  var error=form_data_return[1];

  if(!error)
  {
    $.ajax({
              url:"customer/add",
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
             var refid=output[0]['token'];
             if(result=="success")
             {
              successmsg("Customer details submitted successfully");
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


</script>
