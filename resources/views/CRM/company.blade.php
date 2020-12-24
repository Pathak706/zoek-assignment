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
                        <tr>
                            <td hidden>1</td>
                            <td>Zoek Hire</td>
                            <td>paul@zoek.uk.com</td>
                            <td>zoek.uk.com</td>
                            <td>Thumbnails</td>
                            <td>
                                <div class='row action-row justify-content-center '>
                                    <div class='col'>
                                        <button type="button" class="btn btn-info editCompany" data-toggle="modal" data-target="#edit_model" title="Edit Company">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <div class='col'>
                                        <button type="button" class="btn btn-danger deleteCompany">
                                            <i class="fa fa-trash" aria-hidden="true" title="Delete Company"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
