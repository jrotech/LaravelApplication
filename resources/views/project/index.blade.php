<x-app-layout>
   <div class="project_container">
      <div class="flex justify-between">
         <a href="{{route('project.create')}}" class="new_project_button">Add Project</a>
         <form action="{{ route('project.search') }}" method="POST" class="mb-4 flex justify-end px-10 h-fit text-gray-800">
            @csrf
            <input type="hidden" name="view" value="project.all">
            <input type="text" name="query" class="form-input mx-10 px-10" placeholder="Search projects...">
            <button type="submit" class="btn btn-primary">Search</button>
         </form>
      </div>

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
               <a href="{{route('project.edit', $project)}}" class="project_button edit">Edit</a>
               <form action="{{route('project.destroy', $project)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="project_delete_button">Delete</button>
               </form>
            </div>
         </div>
         @endforeach
      </div>

      {{$projects->links()}}
   </div>
</x-app-layout>