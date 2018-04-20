@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-10">
  <div class="card">
      <div class="card-header">Dashboard</div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table">
                  <thead>
                  <tr>
                      <th class="text-center" >#</th>
                      <th class="text-center" >NAME</th>
                      <th class="text-center" >Email</th>
                      <th class="text-center" >Address</th>
                      <th class="text-center" >Zip Code</th>
                      <th class="text-center" >Phone number</th>
                      <th class="text-center"><a href="register"><b>Add User</b></a></th>
                  </tr>
                  </thead>
                  <tbody>
                  @if(isset($users))   
                    @forelse($users as $user)
                          <tr>
                              <td>
                                  <div class="text-center">
                                      <img src="{{ asset('images/testLaravel/' .$user->profile)}}" class="rounded float-left" height="40" width="40">
                                  </div>
                              </td>

                              <td>
                                  <div class="text-center">
                                      {{$user->name}}
                                  </div>
                              </td>
                              <td>
                                  <div class="text-center">
                                      {{$user->email}}
                                  </div>
                              </td>
                              <td>
                                  <div class="text-center">
                                      {{$user->address}}
                                  </div>
                              </td>
                              <td>
                                  <div class="text-center">
                                      {{$user->zipcode}}
                                  </div>
                              </td>
                              <td>
                                  <div class="text-center">
                                      {{$user->phone}}
                                  </div>
                              </td>
                              <td>
                                  <div class="text-center">
                                      <a {{-- href="{{'home/edit/'.$user->id}}" --}} onclick="editFunction({{$user->id}} , '{{$user->name}}')" class=" btn btn-info"><b>Edit</b></a>
                                          
                                      

                                  </div>
                              </td>

                              
                              <td>
                                  <div class="text-center">
                                      <a class=" btn btn-danger" onclick="deleteFunction({{$user->id}} , '{{$user->name}}' )"><b>Delete</b></a>
                                      <script>
                                  function deleteFunction(id , name)
                                  {
                                      var del = confirm("Delete this "+name+"?");
                                      if (del == true)
                                      {
                                          window.location.href = ("{{'/delete'}}"+'/'+id);
                                      }
                                      else
                                      {
                                          window.close;
                                      }
                                  }
                              </script>
                                  </div>
                              </td>
                              
                          </tr>
                      @empty
                          <tr>
                              <td colspan="4"><div class="text-center">There are no results available.</div></td>
                          </tr>
                      @endforelse
                      @else 
                          <tr>
                              <td colspan="4"><div class="text-center">There are no results available.</div></td>
                          </tr>
                      @endif    
                  </tbody>

              </table>
          </div>
      </div>
  </div>
</div>
</div>
</div>
@endsection

{{-- <script type="text/javascript">
    $(document).ready(function () {        
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.closest('form').submit();
            }
        });   
    });
</script> --}}

<script>
function editFunction(id , name)
{
 var del = confirm("Edit "+name+" ?");
 if (del == true)
  {
    window.location.href = ("{{'home/edit/'}}"+id);
  }
 else
  {
    window.close;
  }
}
</script>