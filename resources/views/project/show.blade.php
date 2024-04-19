<x-app-layout>

    <div class="project_container_single_project">
   
        <div class="show_project">
            
            <div class="show_header">
            <h1>{{ $project->title }}</h1>
                <div class="show_buttons">
                    <a href="{{route('project.edit',$project)}}" class="show_project_edit_button">Edit</a>
                    <form action="{{route('project.destroy', $project)}}" method="POST">
                     @csrf
                     @method('DELETE')
                     <button class ="show_project_delete_button">Delete</button>
                    </form>
                </div>
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
             </div>
            
        </div>
    </div>
</x-app-layout>
