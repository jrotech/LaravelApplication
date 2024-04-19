<x-app-layout>
   <div class="project_container">
      <div class="projects">
         @foreach ($projects as $project)
         <div class="project">
            <div class="project_body">
               <div class="project_title_description">
                  <h3 class="project_title">{{$project->title}}</h3>
                  <p class="project_description">{{ Str::words($project->description,30)}}</p>
               </div>
               <div class="project_dates">
                  Start date: {{ $project -> start_date}}<br>
               </div>
            </div>
            <div class="project_buttons">
               <a href="{{route('project.show', $project)}}" class="project_button view">View</a>
            </div>
         </div>
         @endforeach
      </div>

      {{$projects->links()}}
   </div>
</x-app-layout>