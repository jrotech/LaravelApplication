<x-app-layout>
    <div class="project_container_single_project">
        <h1>Add new project</h1>
        <form action="{{ route('project.store') }}" method="POST" class="create_project" id="create_project_form">
            @csrf
            <input type="text" name="title" class="create_project_title" id="title" placeholder="Enter your title here"></textbox>
            <textarea name="description" rows="10" class="create_project_body" id="description" placeholder="Enter your project description here"></textarea>
            <label>Development stage:</label>
            <select name="phase" class="project_phase" id="phase">
                <option value="design">Design</option>
                <option value="development">Development</option>
                <option value="testing">Testing</option>
                <option value="deployment">Deployment</option>
                <option value="complete">Complete</option>
            </select>
            <div class="create_dates">
                <div class="create_date">
                    <label>Start date:</label>
                    <input type="date" name="start_date" class="date" id="start_date">
                </div>
                <div class="create_date">
                    <label>End date:</label>
                    <input type="date" name="end_date" class="date" id="end_date">
                </div>
            </div>
            <div class="project_create_buttons">
                <a href="{{ route('project.index') }}" class="project_cancel_button">Cancel</a>
                <button class="project_cancel_button" id="submit_button">Submit</button>
            </div>
        </form>

    </div>
</x-app-layout>