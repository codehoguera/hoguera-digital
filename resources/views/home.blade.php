@extends('layouts.app')
@section('title', 'Home')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
<style>
        
    .card-body {
        border-radius: 15px;
        margin-left: 20px;
        margin-right: 20px
    }
    .dataTables_wrapper .pagination .paginate_button a  {
        background-color: #0b5ed7;
        border-radius: 50px;
        color: aliceblue;
    }

    thead tr {
        background-color: #0b5ed7;
        height: 50px;
        color: white;
    }

    .button_add_question {
        margin: 3px;
        border-radius: 50px;
        height: 40px;
    }

    .input_search {
        margin: 3px;
        border-radius: 50px;
        height: 40px;
    }

    .users_legth_pagination label {
        margin: 3px;
    }

    #users_length {
        margin: 3px;
    }

</style>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-body">
                @if (session('notification'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <span class="alert-text"><strong>Success! </strong>{{ session('notification') }}</span>
                    </div>
                @endif
            </div>
            <div class="card card-body">
                <table class="table table-striped" style="width:100%" id="users">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email_personal }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ url('/user/'.$user->id.'/edit') }}">Edit</a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $user->id }}">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @include('delete')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>

    <script>

        $(document).ready(function(){
           var tableUsers = $('#users').DataTable({
                responsive: true,
                dom: 'lfrtip',
            }).columns.adjust();

            $('#users_filter').removeClass('dataTables_filter').addClass('row');
            $('#users_filter label').addClass('label_1').attr('id', 'label_1');
            $('input[type="search"]').insertBefore('#label_1');
            $('input[type="search"]').attr('placeholder', 'Search');
            $('input[type="search"]').addClass('input_search');
            $('.label_1').remove();

            const button_add_question =
            $('<button class="button_add_question btn btn-primary form-control" type="button">Añadir registro</button>');
            $('#users_filter').append(button_add_question);

            $('.button_add_question').wrapAll('<div class="col-sm-6" id="col-content-1"></div>');
            $('input[type="search"]').wrapAll('<div class="col-sm-6" id="col-content-2"></div>');

            //div num pagination
            $('#users_length').addClass('row');
            $('#users_length label').wrapAll('<div class="col-md-8 users_legth_pagination"></div>');
            $('#users_length').append('<div class="col-md-4"></div>');
            $('.users_legth_pagination').append('<input class="btn btn-danger btn-sm" type="button" value="vista previa"/>');
        });
    </script>
    <script src="{{ asset('js/index.js') }}"></script>
@endsection
