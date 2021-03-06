@extends('layouts.master')

@section("content")
    <div id="urls" class="row index">
        <div class="col-md-12">
            <h1>
                Urls: <small>by {{ $user->username }}</small>
            </h1>
            @if(has_disk_space())
                <a class="btn btn-success btn-xs" href="{{ route('urls.create') }}">Create new</a>
            @else
                <a class="btn btn-danger disabled btn-xs" href="{{ route('urls.create') }}">No diskspace..</a>
            @endif

            <hr/>

            <table class="table table-striped table-bordered">
                <colgroup>
                    <col width="23%"/>
                    <col width="60%"/>
                    <col width="17%"/>
                </colgroup>
                <thead>
                <tr>
                    <th>Share this \o/</th>
                    <th>Destination</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($urls as $url)
                <tr>
                    <td>
                        <a href="{{ route('urls.show', $url->slug->slug)  }}">
                            {{ $url->url() }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ url($url->destination) }}">
                            {{ $url->destination }}
                        </a>
                    </td>
                    <td>
                        @if( $url->userHasAccess() )
                        {!! Form::open(['route' => ['urls.destroy', $url->slug->slug], 'method' => 'delete', 'class' => 'text-center']) !!}
                            <a class="btn btn-primary btn-sm" href="{{ route('urls.edit', $url->slug->slug) }}">
                                <span class="glyphicon glyphicon-edit"></span>
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
                @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            <strong>No urls, yet!</strong>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
