<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <head>
      @include('layout.header')
      <meta charset="utf-8">
      <title>Admin Dashboard</title>
    </head>
  </head>
  <body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img style="width:5vw" src="{{asset('images/LOGO-FULL-COLOUR-BLUE.png')}}"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{asset('admin/home')}}">Home</a>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="logout()">Logout</a>
              </li>
          </ul>
        </div>
      </div>
    </nav>

<br>
<div class="container">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                  <th>Si</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @php
              $i=1;
              @endphp

              @foreach($customers as $customerlist)

              @php
              $dob=strtotime($customerlist->cus_dob);
              $dob_formatted = date("d-m-Y", $dob);
              @endphp
              <tr>
                <td>{{$i++}}</td>
                <td>{{$customerlist->cus_fname." ".$customerlist->cus_lname}}</td>
                <td>{{$customerlist->cus_email}}</td>
                <td>{{$dob_formatted}}</td>
                <td id="status_{{$customerlist->id}}">
                  @if($customerlist->cus_status==0)
                  In Review
                  @elseif($customerlist->cus_status==1)
                  Approved
                  @elseif($customerlist->cus_status==2)
                  Rejected
                  @endif
                </td>
                <td>
                  <!-- @if($customerlist->status==0) -->
                    <button class="btn btn-success" onclick="setStatus(1,'{{$customerlist->id}}')">Approve</button>
                    <button class="btn btn-danger" onclick="setStatus(2,'{{$customerlist->id}}')">Reject</button>
                  <!-- @endif -->
                </td>
            </tr>
            @endforeach
          </tbody>
      </table>

      </div>
  </body>
      @include('layout.script')
      @include('admin.ajax')
      <script type="text/javascript">
          $(document).ready(function () {
            $('#example').DataTable();
          });
      </script>
</html>
