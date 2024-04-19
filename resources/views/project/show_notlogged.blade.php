<x-app-layout>

    <div class="project_container_single_project">

        <div class="show_project">

            <div class="show_header">
                <h1>{{ $project->title }}</h1>
            </div>

            <div class="show_project_content">

                <p class="show_project_body">{{ $project->description }}</p>

                <p class="show_project_phase">Development stage: <br> {{ $project->phase }}</p>
                <div class="show_project_dates">
                    <div class="show_project_date">
                        <p>Start date: {{ $project->start_date }}</p>
                    </div>
                    <div class="show_project_date">
                        <p>End date: {{ $project->end_date }}</p>
                    </div>

                    <br>
                    <div class="show_project_author">
                        <p>Author: {{ $project->user->username }}</p>
                        <p>Email: {{ $project->user->email }}</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="my-6 text-2xl show_button">
        <a href="{{ route('project.all') }}" class="project_button edit">Go Back</a>
    </div>

</x-app-layout>