<li class="nav-item"><a class="nav-link" href="{{ action('AdminController@showApplicationForm') }}">Manage Application Form</a>
<li class="nav-item"><a class="nav-link" href="{{ action('MentorController@showRate') }}">Rate</a>
<li class="nav-item"><a class="nav-link" href="{{ action('MentorController@showApplications') }}">Applications</a>
<li class="nav-item dropdown">
	<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Interviews
	</a>
	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		<a class="dropdown-item" href="{{ action('AdminController@showCreateInterview') }}">Create Interviews</a>
		<a class="dropdown-item" href="{{ action('AdminController@showAssignInterview') }}">Assign Interviews</a>
		<a class="dropdown-item" href="{{ action('AdminController@showManagePrompt') }}">Manage Interview Prompt</a>
		<a class="dropdown-item" href="{{ action('AdminController@exportHashids') }}">Export Applicant Emails and Hashid</a>
	</div>
</li>
<li class="nav-item"><a class="nav-link" href="{{ action('AdminController@showUsers') }}">Manage Users</a></li>
