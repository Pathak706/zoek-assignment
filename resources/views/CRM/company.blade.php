@extends('layouts.layout')
@section('title', 'Company')
@section('button')
    <div class="navbar-wrapper">
        <div class="navbar-toggle">
            <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <h3 class="title">Company</h3>
    </div>
    {{-- Add New Company --}}
    <div class="modal fade bd-example-modal-lg" id="addModal" role="dialog" style="display:none">
        <div class="modal-dialog modal-lg" role="document">
            <form id='add_company' action="{{ route('company.store') }}" method="post" enctype="multipart/form-data" class="form-wrap">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Company</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name:</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" required placeholder="Enter Company's Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email:</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" required placeholder="Enter Company's Email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Website:</label>
                            <div class="col-sm-9">
                                <input type="text" name="website" placeholder="Enter Company's Website Link" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <input name="logo" type="file" class="custom-file-input" placeholder="Company's Logo" id="customFile">
                            <label class="custom-file-label" for="customFile">Client's Logo</label>
                        </div>
                        <img src="#" id="company__logo" alt="Company Logo" />
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
    {{-- Edit Company --}}
    <div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form id='edit_company' action="{{ url('/company') }}" method="post" enctype="multipart/form-data" class="form-wrap">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Company</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name:</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" required placeholder="Enter Company's Name" class="form-control" id="edit_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email:</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" required placeholder="Enter Company's Email" class="form-control" id="edit_email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Website:</label>
                            <div class="col-sm-9">
                                <input type="text" name="website" placeholder="Enter Company's Website Link" class="form-control" id="edit_website">
                            </div>
                        </div>
                        <div class="form-group row">
                            <input name="logo" type="file" class="custom-file-input" placeholder="Company's Logo" id="edit_custom_file">
                            <label class="custom-file-label" for="edit_custom_file">Client's Logo</label>
                        </div>
                        <img src="#" id="edit_company__logo" alt="Company Logo" />
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
    {{-- Delete Company --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Company</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="deleteForm" action="{{url('/company')}}" method="post">
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Logo</th>
                            <th class="action">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                        <tr>
                            <td hidden>{{$company->id}}</td>
                            <td>{{$company->name}}</td>
                            <td>{{$company->email}}</td>
                            <td>{{$company->website ? $company->website : "NA"}}</td>
                            <td>
                                @if($company->logo)
                                    <a href="{{url('/uploads/'.$company->logo)}}" target="_blank">
                                        <img class="company-logo" src="{{ asset('uploads/'.$company->logo) }}" alt="{{$company->logo}}" />
                                    </a>
                                @else
                                    NA
                                @endif
                            </td>
                            <td>
                                <div class='row action-row justify-content-center'>
                                    <div class='col'>
                                        <button type="button" class="btn btn-info editBtn" data-toggle="modal" data-target="#editModal" title="Edit Company">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <div class='col'>
                                        <button type="button" class="btn btn-danger deleteBtn" data-toggle="modal"
                                                data-target="#deleteModal">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
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
                $('#edit_company__logo').attr('src', '');
                $('#editModal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text().trim().length ? $(this).text() : $(this).html();
                }).get();
                $("#edit_company").attr("action", `/company/${data[0]}`);
                $("#edit_name").val(data[1]);
                $("#edit_email").val(data[2]);
                $("#edit_website").val(data[3]);
                $('#edit_company__logo').attr('src', $(data[4]).children().attr('src'));
            });
            $(".deleteBtn").on('click', function(event) {
                console.log("delete btn");
                event.preventDefault();
                $('#deleteModal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                $("#deleteForm").attr("action", `/company/${data[0]}`);
            });
            $("#customFile").on('change', function() {
                if(this.files[0]) {
                    readURL(this);
                    $(this).siblings('label').text(this.files[0].name);
                }
            });
            $("#edit_custom_file").on('change', function() {
                if(this.files[0]) {
                    readURL(this, true);
                    $(this).siblings('label').text(this.files[0].name);
                }
            });
            function readURL(fileUpload, edit = false) {
                var reader = new FileReader();
                //Read the contents of Image File.
                reader.readAsDataURL(fileUpload.files[0]);
                reader.onload = function (e) {

                    //Initiate the JavaScript Image object.
                    var image = new Image();

                    //Set the Base64 string return from FileReader as source.
                    image.src = e.target.result;

                    //Validate the File Height and Width.
                    image.onload = function () {
                        var height = this.height;
                        var width = this.width;
                        // if ((height > 500 && height < 100) || (width > 500 && width < 100)) {
                        if(height < 100 || width < 100) {
                            alert("Height and Width must be greater than 100px and less than 500px.");
                            return false;
                        }
                        if(edit) {
                            $('#edit_company__logo').attr('src', e.target.result);
                        } else {
                            $('#company__logo').attr('src', e.target.result);
                        }
                        return true
                    };
                }
            }
        });
    </script>
@endsection
