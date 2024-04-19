<x-app-layout>
    <div class="project_container_single_project">
        <h1>Edit your project</h1>
        <form action="{{ route('project.update', $project) }}" method="POST" class="create_project">
            @csrf
            @method('PUT')
            <input type="text" name="title" class="create_project_title" value="{{$project->title}}">
            <textarea name="description" rows="10" class="create_project_body">{{$project->description}}</textarea>
            <label>Development stage:</label>
            <select name="phase" class="project_phase">
                <option value="design" {{ $project->phase == 'design' ? 'selected' : '' }}>Design</option>
                <option value="development" {{ $project->phase == 'development' ? 'selected' : '' }}>Development</option>
                <option value="testing" {{ $project->phase == 'testing' ? 'selected' : '' }}>Testing</option>
                <option value="deployment" {{ $project->phase == 'deployment' ? 'selected' : '' }}>Deployment</option>
                <option value="complete" {{ $project->phase == 'complete' ? 'selected' : '' }}>Complete</option>
            </select>

            <div class="create_dates">
                <div class="create_date">
                    <label>Start date:</label>
                    <input type="date" name="start_date" class="date" value="{{ $project->start_date }}">
                </div>
                <div class="create_date">
                    <label>End date:</label>
                    <input type="date" name="end_date" class="date" value="{{ $project->end_date }}">
                </div>
            </div>
            <div class="project_create_buttons">
                <a href="{{ route('project.index') }}" class="project_cancel_button">Cancel</a>
                <button class="project_button edit">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>