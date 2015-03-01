@extends('layouts.master')

@section("content")
    <div id="snippets" class="row index">
        <div class="col-md-12">
            <h1>
                Files
                @if(has_disk_space())
                    <a class="btn btn-success btn-xs" href="{{ route('files.create') }}">Create new</a>
                @else
                    <a class="btn btn-danger disabled btn-xs" href="{{ route('files.create') }}">No diskspace...</a>
                @endif
            </h1>

            <hr/>

            <table class="table table-striped table-bordered">
                <colgroup>
                    <col width="5%"/>
                    <col width="20%"/>
                    <col width="25%"/>
                    <col width="25%"/>
                    <col width="25%"/>
                </colgroup>
                <thead>
                <tr>
                    <th>#</th>
                    <th>By</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($files as $file)
                <tr>
                    <td>{{ $file->id }}</td>
                    <td class="text-primary">
                        {{ $file->user->username or "Anon" }}
                    </td>
                    <td><a href="{{ route('files.show', $file->id)  }}">{{ $file->title }}</a></td>
                    <td>
                        @if( $file->userHasAccess() )
                        {!! Form::open(['route' => ['files.destroy', $file->id], 'method' => 'delete', 'class' => 'text-center']) !!}
                            <a class="btn btn-info btn-sm" href="{{ route('files.show', $file->id) }}">
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </a>
                            <button class="btn btn-danger btn-sm" type="submit">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        {!! Form::close() !!}
                        @else
                            <button class="btn btn-default btn-block disabled">
                                <span class="glyphicon glyphicon-lock"></span>
                            </button>
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop