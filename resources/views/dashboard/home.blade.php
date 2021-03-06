@extends('layouts.app')

@section('content')
<div class="col">
	@if(Session::has('message'))
	    <p class="alert alert-info">{{ Session::get('message') }}</p>
	@endif  
    <div class="card">
        <div class="card-header">Dashboard</div>
        <div class="card-block">
        	<h3>Welcome Back, <b>{{Auth::user()->name}}</b></h3>
        	<hr/>
            @if(env('APP_PHASE') == 1)
                @role(['admin', 'mentor'])
                    <h4>Ratings Leaderboard</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Ratings</th>
                                @role(['admin'])
                                    <th>Average Rating</th>
                                @endrole
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($ratings as $rating)
                            <tr>
                                <td>
                                    <span class="badge badge-pill badge-default">{{ $loop->index + 1}}</span>
                                </td>
                                <td>
                                    {{$rating->name}}
                                </td>
                                <td>
                                  {{$rating->ratingCount}}
                                </td>
                                @role(['admin'])
                                <td>
                                    {{$rating->averageRatingValue}}
                                </td>
                                @endrole
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <hr/>
                    <h4>Interview Assignments</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Start Time</th>
                                <th>Applicants</th>
                                <th>Interview Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data->assignments as $assignment)
                            <tr>
                                <td>
                                    {{$assignment->slot->formattedStartTime}} to {{$assignment->slot->formattedEndTime}}
                                </td>
                                <td>
                                    @foreach($assignment->slot->applicants as $applicant)
                                        <a href="{{action('MentorController@showRate')}}/{{$applicant->id}}">{{$applicant->name}}</a>
                                        @if (!$loop->last)
                                          ,
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{action('MentorController@showInterview')}}{{$assignment->slot->applicationsID}}">Interview &raquo;</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endrole
            @endif
        </div>
    </div>
</div>
@endsection
