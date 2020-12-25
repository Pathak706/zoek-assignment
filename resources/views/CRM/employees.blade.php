@extends('layouts.layout')
@section('title', 'Employees')
@section('button')
    <div class="navbar-wrapper">
        <div class="navbar-toggle">
            <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <h3 class="title">Employees</h3>
    </div>
    {{-- Add New Employee --}}
    <div class="modal fade bd-example-modal-lg" id="addModal" role="dialog" style="display:none">
        <div class="modal-dialog modal-lg" role="document">
            <form id='add_employee' action="{{ route('employees.store') }}" method="post" class="form-wrap">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">First Name:</label>
                            <div class="col-sm-9">
                                <input type="text" name="fname" required placeholder="Enter First Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Last Name:</label>
                            <div class="col-sm-9">
                                <input type="text" name="lname" required placeholder="Enter Last Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email:</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" placeholder="Enter Email-Id" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone:</label>
                            <div class="col-sm-9">
                                <input type="text" name="phone" placeholder="Enter Phone Number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Company:</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="company" required placeholder="Please select company">
                                    <option value="">Select company</option>
                                    @foreach($compaines as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <div class="row"> -->
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Edit Employee --}}
    <div class="modal fade bd-example-modal-lg" id="editModal" role="dialog" style="display:none">
        <div class="modal-dialog modal-lg" role="document">
            <form id='edit_employee' action="{{ url('/employees') }}" method="post" class="form-wrap">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">First Name:</label>
                            <div class="col-sm-9">
                                <input type="text" name="fname" required placeholder="Enter First Name" class="form-control" id="edit_fname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Last Name:</label>
                            <div class="col-sm-9">
                                <input type="text" name="lname" required placeholder="Enter Last Name" class="form-control" id="edit_lname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email:</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" placeholder="Enter Email-Id" class="form-control" id="edit_email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone:</label>
                            <div class="col-sm-9">
                                <input type="text" name="phone" placeholder="Enter Phone Number" class="form-control" id="edit_phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Company:</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="company" required placeholder="Please select company" id="edit_company">
                                    <option value="">Select company</option>
                                    @foreach($compaines as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <div class="row"> -->
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Delete Employee --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="deleteForm" action="{{url('/employees')}}" method="post">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        Are You Sure ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section class="data-table-wrap">
        <div class="card">
            <div class="card-body all-icons">
                <table class='table table-striped table-bordered master-dataTable'>
                    <thead>
                    <tr>
                        <th hidden>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Company</th>
                        <th class="action">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                    <tr>
                        <td hidden>{{$employee->id}}</td>
                        <td>{{$employee->fname}}</td>
                        <td>{{$employee->lname}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->phone}}</td>
                        <td>{{$employee->company_name->name}}</td>
                        <td>
                            <div class='row action-row justify-content-center '>
                                <div class='col'>
                                    <button type="button" class="btn btn-info editBtn" data-toggle="modal" data-target="#edit_model" title="Edit Employee">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div class='col'>
                                    <button type="button" class="btn btn-danger deleteBtn">
                                        <i class="fa fa-trash" aria-hidden="true" title="Delete Employee"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(".editBtn").on('click', function(event) {
                event.preventDefault();
                $('#editModal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).html();
                }).get();
                $("#edit_employee").attr("action", `/employees/${data[0]}`);
                $("#edit_fname").val(data[1]);
                $("#edit_lname").val(data[2]);
                $("#edit_email").val(data[3]);
                $("#edit_phone").val(data[4]);
                    $("#edit_company option:contains(" + data[5] + ")").attr('selected', 'selected');
                // $('#edit_company option[value=\"' + data[5] + '\"]').prop('selected', 'selected')
            });
            $(".deleteBtn").on('click', function(event) {
                console.log("delete btn");
                event.preventDefault();
                $('#deleteModal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                $("#deleteForm").attr("action", `/employees/${data[0]}`);
            });
        });
    </script>
@endsection
