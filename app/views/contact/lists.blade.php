@extends('layouts.noheader')

@section('content')
<div class="row">
    <div class="col-lg-12">
        {{ Form::open(array('route' => 'department.store','class' => 'bs-component')) }}
        <div class="form-group">
            {{ Form::text('contact','',array('class' => 'form-control', 'placeholder' => 'Search')) }}
        </div>
        {{ Form::close() }}
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Contact Name</th>
                        <th>Account Name</th>
                        <th style="text-align:center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($contacts) == 0)
                    <tr>
                        <td colspan="3">No record found!</td>
                    </tr>
                    @else
                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{ ContactHelper::fullname($contact) }}</td>
                        <td>{{ $contact->account_name }}</td>
                        <td class="action">
                            {{ HTML::linkRoute('contact.edit','Add', $contact->id, array('class' => 'btn btn-info btn-xs')) }}
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table> 
        </div>
    </div>
</div>


@stop