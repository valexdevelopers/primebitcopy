<!DOCTYPE html>
<html>
    <head>
        <title>Admin | Act Digit</title>
        @include('includes.admindashboardhead')
    </head>
    <body class="menu-position-side menu-side-left full-screen">
        <div class="all-wrapper solid-bg-all">
            
            @include('includes.admindashboardheader')
            <div class="layout-w">
                @include('includes.adminmenu')
                                           
                <div class="content-w">    
                    <div class="content-i">
                        <div class="content-box">
                            <div class="element-wrapper">
                                <h6 class="element-header">All registered accounts </h6>
                                <div class="element-box">
                                    <h5 class="form-header">Accounts Overview</h5>
                                    <div class="form-desc">All registered accounts are displayed here including their last login time. all account details are as well displayed here for accounts updating and others</div>
                                    <div class="table-responsive">
                                        @if(Session::has('message'))
                                            <div class="alert {{ Session::get('message-color') }} alert-dismissible fade show " role="alert">
                                                <strong>{{ Session::get('message') }}</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                                            </div>
                                        @endif
                                        <table id="myTable" width="100%" class="table table-striped table-lightfont">
                                            <thead>
                                                
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Total Deposit</th>
                                                    <th>Plan</th>
                                                    <th>Profit</th>
                                                    <th>Bonus</th>
                                                    <th>Signal</th>
                                                    <th>No Of Trades</th>
                                                    <th>Actions</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                              
                                                @if($users->count() > 0)
                                                    @foreach($users as $user)
                                                    <tr>
                                                        <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                                                        <td>{{ $user->currency }} {{ $user->balance }}</td>
                                                        <td>{{ $user->trades->sum('profit') }}</td>
                                                        <td>{{ $user->currency }}{{ $user->trades->sum('profit') }} </td>
                                                        <td>{{ $user->currency }}{{ $user->trades->sum('bonus') }}</td>
                                                        <td>{{ $user->signal }}</td>
                                                     
                                                       <td>{{ $user->trades->count() }}</td>
                                                       <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    Actions
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                   
                                                                    @if($user->status !== 'active')
                                                                        <li><a class="dropdown-item" href="{{ route('admin.users.activate', $id =  $user->id) }}">Activate</a></li>
                                                                    @else
                                                                        <li><a class="dropdown-item" href="{{ route('admin.users.edit', $id =  $user->id) }}">Force Upgrade</a></li> 
                                                                    @endif
                                                                    
                                                                    <li><a class="dropdown-item" href="{{ route('admin.users.destroy', $id = $user->id ) }}"   onclick="if (confirm('You are about to delete a user, would you like to proceed?')) commentDelete(1); return false  ">Delete User</a></li>
                                                                </ul>
                                                            </div>

                                                            
  
                                                       </td>
                                                       
                                                    </tr> 
                                                    
                                                    @endforeach
                                              
                                                @endif
                                            
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            {{-- customizers start --}}
                            @include('includes.admincustomizers')
                            {{-- customizers end --}}
                        </div>
                    </div>
                </div>
            </div>
       
            <div class="display-type"></div>
        </div>

        @include('includes.adminscripts')
        
    </body>
</html> 