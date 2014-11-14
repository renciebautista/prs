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
                        <th>Project Name</th>
                        <th>Address</th>
                        <th colspan="2" style="text-align:center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($contacts) == 0)
                    <tr>
                        <td colspan="4">No record found!</td>
                    </tr>
                    @else
                    @foreach($contacts as $project)
                    <tr>
                        <td>{{ $project->project_name }}</td>
                        <td>{{ AccountHelper::address($project) }}</td>
                        <td class="action">
                            {{ HTML::linkRoute('project.edit','Edit', $project->id, array('class' => 'btn btn-info btn-xs')) }}
                        </td>
                        <td class="action">
                            {{ Form::open(array('method' => 'DELETE', 'route' => array('project.destroy', $project->id))) }}                       
                            {{ Form::submit('Delete', array('class'=> 'btn btn-danger btn-xs','onclick' => "if(!confirm('Are you sure to delete this record?')){return false;};")) }}
                            {{ Form::close() }}
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