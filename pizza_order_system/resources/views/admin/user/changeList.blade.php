@extends('admin.layouts.master')

@section('title', 'Products List Page')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-responsive table-responsive-data2">
                        <h3 class="mb-3">Total User - {{ $users->total()}}</h3>

                        <table class="table text-center table-data2">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Role</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="dataList">
                                @foreach ($users as $user)
                                <tr>
                                    <input type="hidden" id="userId" value="{{ $user->id}}">
                                    <td>@if($user->image == null)
                                        @if ($user->gender == 'male')
                                             <img src="{{ asset('images/default_user.jpeg')}}" class="shadow-sm img-thumbnail">
                                        @else
                                            <img src="{{ asset('images/AdobeStock_112826502-300x300.jpeg')}}" class="shadow-sm img-thumbnail">
                                        @endif
                                    @else
                                    <img src="{{ asset('storage/'.$a->image)}}" class="shadow-sm img-thumbnail">
                                    @endif</td>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>{{ $user->gender}}</td>
                                    <td>{{ $user->phone}}</td>
                                    <td>{{ $user->address}}</td>
                                    <td>
                                        <select class="form-control" id="statusChange">
                                            <option value="user" @if ($user->role == 'user') selected @endif>User</option>
                                            <option value="admin" @if ($user->role == 'admin') selected @endif>Admin</option>
                                        </select>
                                    </td>
                                    <td></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="">
                            {{ $users->links()}}
                        </div>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection

@section('scriptSection')
    <script>
        $(document).ready(function(){
            // change role
            $('#statusChange').change(function(){
                $currentStatus = $(this).val();
                $parentNode = $(this).parents("tr");
                $userId = $parentNode.find('#userId').val();

                $data = {
                    'userId' : $userId ,
                    'role' : $currentStatus
                }
                $.ajax({
                    type: 'get',
                    url: '/user/change/role',
                    data: $data,
                    dataType: 'json' ,
                })
                location.reload();

             })

        })
    </script>
@endsection
