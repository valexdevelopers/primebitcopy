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
                                <h6 class="element-header">All open trades </h6>
                                <div class="element-box">
                                    <h5 class="form-header">Accounts Overview</h5>
                                    <div class="form-desc">All open trades are displayed here including their last login time. all account details are as well displayed here for accounts updating and others</div>
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
                                                    <th>User</th>
                                                    <th>Trade Plan</th>
                                                    <th>Trade Amount</th>
                                                    <th>Estimated Profit </th>
                                                    <th>Trade Profit </th>
                                                    <th>Trade Start</th>
                                                    <th>Trade Ends</th>
                                                    <th>Actions</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                              
                                                @if($trades->count() > 0)
                                                    @foreach($trades as $trade)
                                                    <tr>
                                                        <td>{{ $trade->users->firstname }} {{ $trade->users->lastname }}</td>
                                                        <td>{{ $trade->plan->plan_name }}</td>
                                                        <td>{{ number_format($trade->trade_amount) }}</td>
                                                        <td>{{number_format($trade->trade_amount*$trade->plan->profit_percentage) }} </td>
                                                        <td>{{ $trade->profit  }}</td>
                                                        <td>{{ $trade->start_date  }}</td>
                                                        <td>{{ $trade->end_date  }}</td>
                                                       
                                                       <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    Actions
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item" href="{{ route('admin.profit.create', $id =  $trade->id) }}">Add Profit</a></li>
                                                                    
                                                                    <li><a class="dropdown-item" href="{{ route('admin.closetrades.show', $id =  $trade->id) }}">Close Trade</a></li>
                                                                    
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