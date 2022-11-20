<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    @include('layout.header')
    <meta charset="utf-8">
    <title>Customer Form</title>
  </head>
  <body>

    <section class="vh-100" style="background-color: #eee;">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
              <div class="card-body p-md-5">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Customer Form </p>

                    <form class="mx-1 mx-md-4" onsubmit="return RegisterCustomer()">

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="fname">Your First Name</label>
                          <input type="text" id="fname" class="form-control" />
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="lname">Your Last Name</label>
                          <input type="text" id="lname" class="form-control" />
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="email">Your Email</label>
                          <input type="email" id="email" class="form-control" />
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="dob">Date of Birth</label>
                          <input type="text" id="dob" class="form-control" />
                        </div>
                      </div>


                      <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                      </div>

                    </form>

                  </div>
                  <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                    <img src="images/LOGO-FULL-COLOUR-BLUE.png"
                      class="img-fluid" alt="Sample image">

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



  </body>

    @include('layout.script')
    @include('customer.ajax')

  <script type="text/javascript">
    $( function() {
      $( "#dob").datepicker({ dateFormat: 'dd-mm-yy', maxDate: -1 });
    } );
  </script>

</html>
