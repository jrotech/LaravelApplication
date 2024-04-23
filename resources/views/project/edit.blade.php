<x-app-layout>
    <div class="project_container_single_project">
        <h1>Edit your project</h1>
        <form action="{{ route('project.update', $project) }}" method="POST" class="create_project" id="create_project_form">
            @csrf
            @method('PUT')
            <input type="text" name="title" class="create_project_title" id="title" value="{{$project->title}}">
            <textarea name="description" rows="10" class="create_project_body" id="description">{{$project->description}}</textarea>
            <label>Development stage:</label>
            <select name="phase" class="project_phase" id="phase">
                <option value="design" {{ $project->phase == 'design' ? 'selected' : '' }}>Design</option>
                <option value="development" {{ $project->phase == 'development' ? 'selected' : '' }}>Development</option>
                <option value="testing" {{ $project->phase == 'testing' ? 'selected' : '' }}>Testing</option>
                <option value="deployment" {{ $project->phase == 'deployment' ? 'selected' : '' }}>Deployment</option>
                <option value="complete" {{ $project->phase == 'complete' ? 'selected' : '' }}>Complete</option>
            </select>

            <div class="create_dates">
                <div class="create_date">
                    <label>Start date:</label>
                    <input type="date" name="start_date" class="date" id="start_date" value="{{ $project->start_date }}">
                </div>
                <div class="create_date">
                    <label>End date:</label>
                    <input type="date" name="end_date" class="date" id="end_date" value="{{ $project->end_date }}">
                </div>
            </div>
            <div class="project_create_buttons">
                <a href="{{ route('project.index') }}" class="project_cancel_button">Cancel</a>
                <button class="project_button edit" id="submit_button">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>