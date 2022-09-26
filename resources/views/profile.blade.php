@extends('layout.app')
@section('content')
<div class="wrapper fadeInDown ">


        <div id="formProfile">
          <div class="wrap-login100">
                <div id="formProfileHeader">
                    <h1 class="c">{{ $user->name }}</h1>
                        @switch($user->user_type)
                            @case('1')
                            <h5 class="pw">Administrator</h5>&nbsp;
                                @break
                
                            @case('2')
                            <h5 class="pw">Student</h5>&nbsp;
                                @break

                            @case('3')
                            <h5 class="pw">Writer</h5>&nbsp;
                                @break

                            @case('4')
                            <h5 class="pw">Section Editor</h5>&nbsp;
                                @break
                                
                            @case('5')
                            <h5 class="pw">Copy Editor</h5>&nbsp;
                                @break
                            
                            @case('6')
                            <h5 class="pw">Associate Editor</h5>&nbsp;
                                @break

                            @default
                            <h5 class="pw" > Editor in Chief</h5>&nbsp;
                        @endswitch
                </div>&nbsp;
                

                <h5><table class="table table borderless">
                <thead>
                    <tr> Basic Information
                    
                    </tr>
                </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Full Name</th>
                            <td> {{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email Address</th>
                            <td>{{ $user->email }}</td>
                        
                        </tr>
                        <tr>
                            <th scope="row">Password</th>
                            <td colspan="2"><a class="underlineHover a " href="{{ url('/register') }}" >Change Password</a></td>
                        </tr>
                    </tbody>
                </table></h5>
             
            </div>
        </div>
</div>
@endsection